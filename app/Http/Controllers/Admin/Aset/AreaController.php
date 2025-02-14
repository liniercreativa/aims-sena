<?php

namespace App\Http\Controllers\Admin\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use Yajra\DataTables\Facades\DataTables;

class AreaController extends Controller
{
    //
    public function semuaarea()
    {
        $areas = Area::select(['id', 'nama_area', 'kode_area']);

        return DataTables::of($areas)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '
                <a href="' . route('area.edit', $row->id) . '" class="btn btn-warning btn-sm">
                     <i class="ti ti-edit me-sm-1"></i>
                </a>
                <form action="' . route('area.destroy', $row->id) . '" method="POST" class="d-inline" id="delete-form-' . $row->id . '">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteArea(' . $row->id . ')">
                        <i class="ti ti-trash me-sm-1"></i>
                    </button>
                </form>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function index()
    {
        $area = Area::all();
        $title = 'Area';
        return view('admin.aset.area.index', compact('area', 'title'));
    }

    public function add()
    {
        $title = 'Tambah Area';
        return view('admin.aset.area.add', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required',
            'kode_area' => 'required|unique:area'
        ], [
            'nama_area.required' => 'Nama area harus diisi',
            'kode_area.required' => 'Kode area harus diisi',
            'kode_area.unique' => 'Kode area sudah digunakan'
        ]);

        Area::create($request->all());

        return redirect()->route('area.index')
            ->with('success', 'Area berhasil ditambahkan.');
    }

    public function edit(Area $area)
    {
        $title = 'Edit Area';
        return view('admin.aset.area.edit', compact('area', 'title'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'nama_area' => 'required',
            'kode_area' => 'required|unique:area,kode_area,' . $area->id
        ]);

        $area->update($request->all());

        return redirect()->route('area.index')
            ->with('success', 'Area berhasil diperbarui.');
    }

    public function destroy(Area $area)
    {
        try {
            $area->delete();
            return redirect()->route('area.index')
                ->with('success', 'Area berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('area.index')
                ->with('error', 'Gagal menghapus area');
        }
    }
}
