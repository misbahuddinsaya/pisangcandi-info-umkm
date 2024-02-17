<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseServices;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected $database;
    public function __construct()
    {
        $this->database = FirebaseServices::connect();
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $referenceUser = $this->database->getReference('tb_userumkm');
        $dataUser = $referenceUser->getValue();

        foreach ($dataUser as $userData) {
            if ($userData['username'] === $username && $userData['password'] === $password) {
                // Simpan informasi pengguna ke dalam session
                session(['user' => $userData]);

                // Redirect sesuai dengan peran pengguna
                if ($userData['role'] === 'admin') {
                    return redirect('/')->with('success', 'Login berhasil');
                } elseif ($userData['role'] === 'pelaku-umkm') {
                    return redirect('/')->with('success', 'Login berhasil');
                }
            }
        }
        return redirect('/login')->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        // Hapus data pengguna dari sesi
        Session::forget('user');
        Session::forget('user_level');

        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect('/')->with('success', 'Logout berhasil');
    }
}
