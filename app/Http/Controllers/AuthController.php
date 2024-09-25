<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $title = 'Masuk Sebagai Admin';
        return view('auth.login', compact('title'));
    }
    public function login_proses(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('admin.index')->with('success', 'Berhasil Masuk Sebagai Admin');
        } else {
            return redirect()->route('auth.login')->with('error', 'Data Tidak Ditemukan, Gagal Masuk Sebagai Admin');
        }
        
    }
    public function register(){
        $title = 'Daftar Sebagai Admin';
        return view('auth.register', compact('title'));
    }

    public function register_proses(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        if (Auth::attempt($validated)) {
            return redirect()->route('admin.index')->with('success', 'Berhasil Masuk Sebagai Admin');
        } else {
            return redirect()->route('auth.login')->with('error', 'Gagal Masuk Sebagai Admin');
        }
    }

    public function logout_proses(){
        Auth::logout();
        return redirect()->route('index')->with('success', 'Berhasil Keluar Dari Admin');
    }
}
