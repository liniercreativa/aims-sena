<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;




class UserController extends Controller
{
    public function getAll()
    {
        $user = User::select(['id', 'name', 'email', 'role', 'nip']);

        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '
                <a href="' . route('user.edit', $row->id) . '" class="btn btn-sm btn-primary">
                    <i class="ti ti-edit"></i>
                </a>
                <button onclick="deleteUser(' . $row->id . ')" class="btn btn-sm btn-danger">
                    <i class="ti ti-trash"></i>
                </button>
            ';
                return $actionBtn;
            })
            ->addColumn('role_badge', function ($row) {
                $badgeClass = $row->role == 'admin' ? 'bg-danger' : 'bg-success';
                return '<span class="badge ' . $badgeClass . '">' . $row->role . '</span>';
            })
            ->rawColumns(['action', 'role_badge'])
            ->make(true);
    }
    public function index()
    {
        $user = User::all();
        $title = 'User';
        return view('admin.user.index', compact('user', 'title'));
    }

    public function add()
    {
        $title = 'Tambah User';
        return view('admin.user.add', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'nip' => 'required|unique:users'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'role.required' => 'Role wajib diisi',
            'nip.required' => 'NIP wajib diisi',
            'nip.unique' => 'NIP sudah terdaftar'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nip' => $request->nip
        ]);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $title = 'Edit User';
        return view('admin.user.edit', compact('user', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required',
            'nip' => 'required|unique:users,nip,' . $id
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'role.required' => 'Role wajib diisi',
            'nip.required' => 'NIP wajib diisi',
            'nip.unique' => 'NIP sudah terdaftar'
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'nip' => $request->nip
        ]);

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6'
            ]);
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('user.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully.');
    }
}
