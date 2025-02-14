<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function index()
    {
        return view('admin.auth.login');
    }

    public function logininsert(Request $request)
    {
        try {
            $validation = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6'
            ], [
                'email.required' => 'Email wajib diisi!',
                'email.email' => 'Format email tidak valid!',
                'password.required' => 'Password wajib diisi!',
                'password.min' => 'Password minimal 6 karakter!'
            ]);

            if (Auth::attempt($validation)) {
                $request->session()->regenerate();
                return redirect('/dashboard/aset/add')->with('success', 'Login berhasil!');
            }

            return back()->with('error', 'Email atau password yang Anda masukkan salah!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->with('error', $e->validator->errors()->first());
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan! Silakan coba lagi.');
        }
    }
}
