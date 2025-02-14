<?php

namespace App\Http\Controllers\Admin\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cluster;
use Yajra\DataTables\Facades\DataTables;


class ClusterController extends Controller
{
    //
    public function getAll()
    {
        $cluster = Cluster::select(['id', 'nama_cluster', 'kode_cluster']);

        return DataTables::of($cluster)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '
                <a href="' . route('cluster.edit', $row->id) . '" class="btn btn-sm btn-warning">
                    <i class="ti ti-edit"></i>
                </a>
                <button onclick="deleteCluster(' . $row->id . ')" class="btn btn-sm btn-danger">
                    <i class="ti ti-trash"></i>
                </button>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function index()
    {
        $title = 'Cluster';
        return view('admin.aset.cluster.index', compact('title'));
    }

    public function add()
    {
        $title = 'Tambah Cluster';
        return view('admin.aset.cluster.add', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cluster' => 'required|string|max:255',
            'kode_cluster' => 'required|string|max:50|unique:cluster'
        ], [
            'nama_cluster.required' => 'Nama cluster wajib diisi',
            'nama_cluster.string' => 'Nama cluster harus berupa teks',
            'nama_cluster.max' => 'Nama cluster maksimal 255 karakter',
            'kode_cluster.required' => 'Kode cluster wajib diisi',
            'kode_cluster.string' => 'Kode cluster harus berupa teks',
            'kode_cluster.max' => 'Kode cluster maksimal 50 karakter',
            'kode_cluster.unique' => 'Kode cluster sudah digunakan'
        ]);

        Cluster::create($request->all());

        return redirect()->route('cluster.index')
            ->with('success', 'Cluster berhasil ditambahkan.');
    }

    public function edit(Cluster $cluster)
    {
        $title = 'Detail Cluster';
        return view('admin.aset.cluster.edit', compact('cluster', 'title'));
    }

    public function update(Request $request, Cluster $cluster)
    {
        $request->validate([
            'nama_cluster' => 'required|string|max:255',
            'kode_cluster' => 'required|string|max:50|unique:cluster,kode_cluster,' . $cluster->id
        ], [
            'nama_cluster.required' => 'Nama cluster wajib diisi',
            'nama_cluster.string' => 'Nama cluster harus berupa teks',
            'nama_cluster.max' => 'Nama cluster maksimal 255 karakter',
            'kode_cluster.required' => 'Kode cluster wajib diisi',
            'kode_cluster.string' => 'Kode cluster harus berupa teks',
            'kode_cluster.max' => 'Kode cluster maksimal 50 karakter',
            'kode_cluster.unique' => 'Kode cluster sudah digunakan'
        ]);

        $cluster->update($request->all());

        return redirect()->route('cluster.index')
            ->with('success', 'Cluster berhasil diperbarui.');
    }

    public function destroy(Cluster $cluster)
    {
        $cluster->delete();

        return redirect()->route('cluster.index')
            ->with('success', 'Cluster berhasil dihapus.');
    }
}
