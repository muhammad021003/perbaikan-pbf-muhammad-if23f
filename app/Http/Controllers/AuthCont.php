<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthCont extends Controller
{
    public function signin_view()
    {
        return view('signin');
    }

    public function signup_view()
    {
        return view('signup');
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $email = User::where('email', $request->email)->first();
        // if(empty($email)){
        //     return redirect('/signin');
        // }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function signup(Request $request)
    {
        $request->validate([
            'first' => 'required|string|max:100',
            'last' => 'nullable|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $request->first . ' ' . $request->last,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        if ($user) {
            Auth::login($user);
            return redirect('/');
        } else {
            return redirect('/error');
        }
    }

    public function error()
    {
        return 'Error';
    }

    public function logout(Request $request)
    {
        // Hapus session user yang login
        Auth::logout();

        // Reset session supaya tidak bisa dipakai lagi
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman login atau home
        return redirect('/signin')->with('success', 'Anda telah logout.');
    }
}
