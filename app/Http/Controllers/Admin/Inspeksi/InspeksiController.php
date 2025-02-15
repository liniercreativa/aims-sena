<?php

namespace App\Http\Controllers\Admin\Inspeksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inspeksi;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Maintenance;



class InspeksiController extends Controller
{
    //
    public function getAll(Request $request)
    {
        $inspeksi = Inspeksi::with(['user', 'aset']);

        return DataTables::of($inspeksi)
            ->addIndexColumn()
            ->addColumn('jenis_aset', function ($row) {
                return strtoupper($row->aset->jenis_aset);
            })
            ->addColumn('tahun_dibuat', function ($row) {
                return strtoupper($row->aset->tahun_dibuat);
            })
            ->addColumn('nama_inspektor', function ($row) {
                return $row->user->name;
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('inspeksi.detail', $row->id) . '" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> </a>';
                return $actionBtn;
            })
            ->rawColumns(['action', 'resiko', 'status'])
            ->make(true);
    }
    public function index()
    {
        $title = 'Inspeksi';
        return view('admin.inspeksi.index', compact('title'));
    }

    public function detail($id)
    {
        $title = 'Detail Inspeksi';
        $inspeksi = Inspeksi::with(['user', 'aset'])->where('id', $id)->first();
        if (!$inspeksi) {
            abort(404);
        }
        $users = User::all();
        $maintenance = Maintenance::where('inspeksi_id', $id)
            ->where('status', '!=', 'dibatalkan')
            ->first();

        if ($maintenance) {
            $existmaintenance = "ada";
        } else {
            $existmaintenance = "tidak ada";
        }

        return view('admin.inspeksi.detail', compact('title', 'inspeksi', 'users', 'existmaintenance', 'maintenance'));
    }

    public function form($id = null)
    {
        $title = 'Form Inspeksi';
        $inspeksi = Inspeksi::with(['user', 'aset'])->where('id', $id)->first();
        if (!$inspeksi) {
            abort(404);
        }
        $users = User::all();
        $maintenance = Maintenance::where('inspeksi_id', $id)
            ->where('status', '!=', 'dibatalkan')
            ->first();

        if ($maintenance) {
            $existmaintenance = "ada";
        } else {
            $existmaintenance = "tidak ada";
        }


        return view('admin.inspeksi.form', compact('title', 'inspeksi', 'users', 'existmaintenance', 'maintenance'));
    }


    public function update(Request $request, Inspeksi $inspeksi)
    {
        // Validasi input
        $request->validate([
            'tanggal_inspeksi' => 'required|date',
            'resiko' => 'required|in:insignificant,minor,moderate,significant,catastrophic',
            'rekomendasi' => 'nullable|string',
        ]);

        // Update data
        $inspeksi->update([
            'tanggal_inspeksi' => $request->tanggal_inspeksi,
            'resiko' => $request->resiko,
            'rekomendasi' => $request->rekomendasi,
            'status' => 'selesai',
        ]);

        return redirect()->route('inspeksi.form', $inspeksi->id)
            ->with('success', 'Berasil melakukan inspeksi');
    }

    public function fotoinspeksi($id = null)
    {
        $title = 'Form Inspeksi';
        $inspeksi = Inspeksi::with(['user', 'aset'])->where('id', $id)->first();
        if (!$inspeksi) {
            abort(404);
        }
        return view('admin.inspeksi.fotoinspeksi', compact('title', 'inspeksi'));
    }

    public function perbaikan($id = null)
    {
        $title = 'Form Inspeksi';
        $inspeksi = Inspeksi::with(['user', 'aset'])->where('id', $id)->first();
        if (!$inspeksi) {
            abort(404);
        }
        return view('admin.inspeksi.perbaikan', compact('title', 'inspeksi'));
    }

    public function storePerbaikan(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'inspeksi_id' => 'required|exists:inspeksi,id',
            'user_id' => 'required|exists:users,id',
            'tanggal_jadwal_perbaikan' => 'required|date|after_or_equal:today',
        ]);

        try {
            // Cek apakah sudah ada maintenance untuk inspeksi ini
            $existingMaintenance = Maintenance::where('inspeksi_id', $request->inspeksi_id)
                ->where('status', '!=', 'dibatalkan')
                ->exists();

            if ($existingMaintenance) {
                return response()->json([
                    'success' => false,
                    'message' => 'Inspeksi ini sudah memiliki jadwal perbaikan'
                ], 422);
            }

            // Buat maintenance baru
            $maintenance = Maintenance::create([
                'inspeksi_id' => $request->inspeksi_id,
                'user_id' => $request->user_id,
                'tanggal_jadwal_perbaikan' => $request->tanggal_jadwal_perbaikan,
                'status' => 'dijadwalkan'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Jadwal perbaikan berhasil dibuat',
                'data' => $maintenance
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()
            ], 500);
        }
    }


    //Mainetenance
    public function selesai(Maintenance $maintenance)
    {
        try {
            $maintenance->update([
                'status' => 'selesai',
                'tanggal_selesai' => now()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status perbaikan berhasil diperbarui'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui status: ' . $e->getMessage()
            ], 500);
        }
    }
}
