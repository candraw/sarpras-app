<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }

    public function logout()
    {
        //dd('oke');
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu Berhasil Login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nama'  => 'required',
            'email' => 'required|email|unique:users,email',
            'password'  => 'required|min:6'
        ]);

        $data['name']       = $request->nama;
        $data['email']       = $request->email;
        $data['password']       = Hash::make($request->password);

        User::create($data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if(Auth::attempt($login)){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }
}
