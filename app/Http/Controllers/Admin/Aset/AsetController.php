<?php

namespace App\Http\Controllers\Admin\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Cluster;
use App\Models\Aset;
use Yajra\DataTables\Facades\DataTables;


class AsetController extends Controller
{
    //
    public function getAll()
    {
        $aset = Aset::with(['area', 'cluster'])->select('aset.*');

        return DataTables::of($aset)
            ->addIndexColumn()
            ->addColumn('jenis_aset_badge', function ($aset) {
                $badges = [
                    'pipeline' => 'bg-primary',
                    'vessel' => 'bg-success',
                    'tangki timbun' => 'bg-warning'
                ];

                return '<span class="badge ' . $badges[$aset->jenis_aset] . '">' . ucfirst($aset->jenis_aset) . '</span>';
            })
            ->addColumn('status_badge', function ($aset) {
                $badge = $aset->status === 'aktif' ? 'bg-success' : 'bg-danger';
                return '<span class="badge ' . $badge . '">' . ucfirst($aset->status) . '</span>';
            })
            ->addColumn('umur', function ($aset) {
                $tahun_sekarang = date('Y');
                $umur = $tahun_sekarang - $aset->tahun_dibuat;
                return $umur;
            })
            ->addColumn('action', function ($aset) {
                return '
                <div class="d-inline-block">
                    <button onclick="showDetail(' . $aset->id . ')" class="btn btn-sm btn-icon btn-info">
                        <i class="ti ti-eye"></i>
                    </button>
                    <a href="' . route('aset.edit', $aset->id) . '" class="btn btn-sm btn-icon btn-warning">
                        <i class="ti ti-edit"></i>
                    </a>
                    <button class="btn btn-sm btn-icon btn-danger" onclick="deleteAset(' . $aset->id . ')">
                        <i class="ti ti-trash"></i>
                    </button>
                </div>';
            })
            ->rawColumns(['jenis_aset_badge', 'status_badge', 'action'])
            ->make(true);
    }

    public function show(Aset $aset)
    {
        $aset->load(['area', 'cluster']);

        // Tambahkan badge
        $badges = [
            'pipeline' => 'bg-primary',
            'vessel' => 'bg-success',
            'tangki timbun' => 'bg-warning'
        ];

        $aset->jenis_aset_badge = '<span class="badge ' . $badges[$aset->jenis_aset] . '">' . ucfirst($aset->jenis_aset) . '</span>';
        $aset->status_badge = '<span class="badge ' . ($aset->status === 'aktif' ? 'bg-success' : 'bg-danger') . '">' . ucfirst($aset->status) . '</span>';

        return response()->json($aset);
    }



    public function index()
    {
        $title = 'Aset';
        return view('admin.aset.index', compact('title'));
    }
    function add()
    {
        $title = 'Tambah Aset';
        $areas = Area::all();
        $clusters = Cluster::all();
        return view('admin.aset.add', compact('title', 'areas', 'clusters'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'exists' => ':attribute tidak valid',
            'in' => ':attribute harus dipilih dari pilihan yang tersedia',
            'string' => ':attribute harus berupa teks',
            'required_if' => ':attribute wajib diisi ketika jenis aset adalah :value',
            'required_unless' => ':attribute wajib diisi kecuali jenis aset adalah :value'
        ];

        $attributes = [
            'area_id' => 'Area',
            'cluster_id' => 'Cluster',
            'lokasi' => 'Lokasi',
            'jenis_aset' => 'Jenis Aset',
            'tahun_dibuat' => 'Tahun Dibuat',
            'status' => 'Status',
            'distrik' => 'Distrik',
            'dimensi' => 'Dimensi',
            'lokasi_bentang' => 'Lokasi Bentang',
            'jenis_peralatan' => 'Jenis Peralatan',
            'tag_number' => 'Tag Number',
            'serial_number' => 'Serial Number'
        ];

        $validated = $request->validate([
            'area_id' => 'required|exists:area,id',
            'cluster_id' => 'required|exists:cluster,id',
            'lokasi' => 'nullable|string',
            'jenis_aset' => 'required|in:pipeline,vessel,tangki timbun',
            'tahun_dibuat' => 'nullable|string',
            'status' => 'required|in:aktif,tidak aktif',
            'distrik' => 'required_if:jenis_aset,pipeline|nullable|string',
            'dimensi' => 'required_if:jenis_aset,pipeline|nullable|string',
            'lokasi_bentang' => 'required_if:jenis_aset,pipeline|nullable|string',
            'jenis_peralatan' => 'required_unless:jenis_aset,pipeline|nullable|string',
            'tag_number' => 'required_unless:jenis_aset,pipeline|nullable|string',
            'serial_number' => 'required_unless:jenis_aset,pipeline|nullable|string',
        ], $messages, $attributes);

        Aset::create($validated);

        return redirect()->route('aset.index')->with('success', 'Aset berhasil ditambahkan');
    }



    public function edit(Aset $aset)
    {
        return view('admin.aset.edit', [
            'title' => 'Edit Aset',
            'aset' => $aset,
            'areas' => Area::all(),
            'clusters' => Cluster::all()
        ]);
    }
    public function update(Request $request, Aset $aset)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'exists' => ':attribute tidak valid',
            'in' => ':attribute harus dipilih dari pilihan yang tersedia',
            'string' => ':attribute harus berupa teks',
            'numeric' => ':attribute harus berupa angka',
            'min' => ':attribute minimal tahun 1991',
            'max' => ':attribute maksimal tahun sekarang',
            'required_if' => ':attribute wajib diisi ketika jenis aset adalah :value',
            'required_unless' => ':attribute wajib diisi kecuali jenis aset adalah :value'
        ];

        $attributes = [
            'area_id' => 'Area',
            'cluster_id' => 'Cluster',
            'lokasi' => 'Lokasi',
            'jenis_aset' => 'Jenis Aset',
            'tahun_dibuat' => 'Tahun Dibuat',
            'status' => 'Status',
            'distrik' => 'Distrik',
            'dimensi' => 'Dimensi',
            'lokasi_bentang' => 'Lokasi Bentang',
            'jenis_peralatan' => 'Jenis Peralatan',
            'tag_number' => 'Tag Number',
            'serial_number' => 'Serial Number'
        ];

        $validated = $request->validate([
            'area_id' => 'required|exists:area,id',
            'cluster_id' => 'required|exists:cluster,id',
            'lokasi' => 'nullable|string',
            'jenis_aset' => 'required|in:pipeline,vessel,tangki timbun',
            'tahun_dibuat' => 'required|numeric|min:1991|max:' . date('Y'),
            'status' => 'required|in:aktif,tidak aktif',

            // Pipeline fields
            'distrik' => 'required_if:jenis_aset,pipeline|nullable|string',
            'dimensi' => 'required_if:jenis_aset,pipeline|nullable|string',
            'lokasi_bentang' => 'required_if:jenis_aset,pipeline|nullable|string',

            // Other fields
            'jenis_peralatan' => 'required_unless:jenis_aset,pipeline|nullable|string',
            'tag_number' => 'required_unless:jenis_aset,pipeline|nullable|string',
            'serial_number' => 'required_unless:jenis_aset,pipeline|nullable|string',
        ], $messages, $attributes);

        // Jika jenis aset berubah, hapus data sebelumnya
        if ($aset->jenis_aset !== $request->jenis_aset) {
            if ($request->jenis_aset === 'pipeline') {
                // Jika berubah menjadi pipeline, hapus data peralatan
                $validated['jenis_peralatan'] = null;
                $validated['tag_number'] = null;
                $validated['serial_number'] = null;
            } else {
                // Jika berubah menjadi vessel atau tangki timbun, hapus data pipeline
                $validated['distrik'] = null;
                $validated['dimensi'] = null;
                $validated['lokasi_bentang'] = null;
            }
        }

        $aset->update($validated);

        return redirect()->route('aset.index')->with('success', 'Aset berhasil diperbarui');
    }

    public function destroy(Aset $aset)
    {

        try {
            $aset->delete();
            return redirect()->route('aset.index')
                ->with('success', 'Area berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('aset.index')
                ->with('error', 'Gagal menghapus area');
        }
    }
}
