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

        $referenceUser = $this->database->getReference('tb_user');
        $dataUser = $referenceUser->getValue();

        if ($dataUser === null || empty($dataUser)) {
            return redirect('/login')->with('error', 'Tidak ada data pengguna.');
        }

        // Mencari data pengguna berdasarkan username
        $matchedUser = null;
        foreach ($dataUser as $key => $userData) {
            if ($userData['username'] === $username && $userData['password'] === $password) {
                $matchedUser = $userData;
                break;
            }
        }

        if ($matchedUser !== null) {
            // Data pengguna sesuai, simpan informasi pengguna ke dalam sesi
            Session::put('user', $matchedUser);

            // Jika level pengguna ada, simpan juga level ke dalam sesi
            $userLevel = $matchedUser['role'] ?? null;
            Session::put('user_level', $userLevel);

            // Ambil kode_user untuk mencari data di tb_umkm
            $kodeUser = $matchedUser['kode_user'] ?? null;

            // dd($kodeUser);
            // Ambil data dari tb_umkm dengan mencocokkan kode_user
            $dataUmkm = null;
            foreach ($this->database->getReference('tb_umkm')->getValue() as $umkmData) {
                if ($umkmData['kode_user'] === $kodeUser) {
                    $dataUmkm = $umkmData;
                    break;
                }
            }

            if ($dataUmkm !== null) {
                // Data tb_umkm ditemukan, simpan ke dalam sesi atau lakukan sesuai kebutuhan
                Session::put('umkm_data', $dataUmkm);
            }

            // Redirect ke dashboard atau lakukan hal lain setelah login berhasil
            return redirect('/')->with('success', 'Login berhasil');
        } else {
            // Data pengguna tidak sesuai
            return redirect('/login')->with('error', 'Username atau password salah');
        }
    }

    public function logout() {
        // Hapus data pengguna dari sesi
        Session::forget('user');
        Session::forget('user_level');

        // Redirect ke halaman login atau halaman lain yang sesuai
        return redirect('/')->with('success', 'Logout berhasil');
    }
}
