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

        // Ambil data pengguna dari database
        $referenceUser = $this->database->getReference('tb_userumkm');
        $dataUser = $referenceUser->getValue();

        // Periksa apakah ada data pengguna
        if ($dataUser === null || empty($dataUser)) {
            return redirect('/login')->with('error', 'Tidak ada data pengguna.');
        }

        // Mencari data pengguna berdasarkan username dan password
        $matchedUser = null;
        foreach ($dataUser as $userData) {
            if ($userData['username'] === $username && $userData['password'] === $password) {
                $matchedUser = $userData;
                break;
            }
        }

        // Jika data pengguna cocok
        if ($matchedUser !== null) {
            // Simpan informasi pengguna ke dalam session
            Session::put('user', $matchedUser);

            // Ambil role pengguna
            $userRole = $matchedUser['role'] ?? null;
            // Simpan role pengguna ke dalam session
            Session::put('user_role', $userRole);

            // Ambil kode_user untuk mencari data di tb_umkm
            $kodeUser = $matchedUser['kode_user'] ?? null;

            // Ambil data dari tb_umkm dengan mencocokkan kode_user
            $dataUmkm = null;
            foreach ($this->database->getReference('tb_umkm')->getValue() as $umkmData) {
                if (isset($umkmData['kode_user']) && $umkmData['kode_user'] === $kodeUser) {
                    $dataUmkm = $umkmData;
                    break;
                }
            }

            // Jika data UMKM ditemukan, simpan ke dalam session
            if ($dataUmkm !== null) {
                Session::put('umkm_data', $dataUmkm);
            }

            // Redirect ke halaman utama setelah login berhasil
            return redirect('/')->with('success', 'Login berhasil');
        } else {
            // Jika data pengguna tidak cocok, kembalikan ke halaman login dengan pesan error
            return redirect('/login')->with('error', 'Username atau password salah');
        }
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
