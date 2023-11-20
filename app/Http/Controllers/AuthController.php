<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->is_admin) {
                return redirect()->route('admin.kamar.index');
            } elseif ($user->is_operator) {
                return redirect()->route('operator.kamar.index');
            }
        }

        return redirect()->route('login')->with('alert', ['message' => 'Username dan Password Salah', 'status' => 'danger']);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login')->with('alert', ['message' => 'Berhasil logout', 'status' => 'success']);
    }
}
