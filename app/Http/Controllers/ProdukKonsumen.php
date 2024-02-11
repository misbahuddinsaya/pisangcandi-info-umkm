<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseServices;

class ProdukKonsumen extends Controller
{
    protected $database;
    public function __construct()
    {
        $this->database = FirebaseServices::connect();
    }

    public function dashboard()
    {
        $reference = $this->database->getReference('tb_umkm');
        $umkm = $reference->getValue();

        $reference = $this->database->getReference('tb_produk');
        $data = $reference->getValue();

        if ($data !== null) {
            $totalProduk = count($data);
            return view('dashboard', ['dataProduk' => $data, 'totalProduk' => $totalProduk, 'dataUmkm' => $umkm]);
        } else {
            // Jika data kosong, kirimkan array kosong ke view
            return view('dashboard', ['dataProduk' => [], 'totalProduk' => 0, 'dataUmkm' => $umkm]);
        }
    }

    // public function index() {
    //     $reference = $this->database->getReference('tb_produk');
    //     $data = $reference->getValue();
    //     $referenceKategori = $this->database->getReference('tb_kategori');
    //     $dataKategori = $referenceKategori->getValue();

    //     if ($data !== null) {
    //         $totalProduk = count($data);
    //         return view('konsumen.produk-konsumen', ['dataProduk' => $data, 'totalProduk' => $totalProduk, 'dataKategori' => $dataKategori]);
    //     } else {
    //         // Jika data kosong, kirimkan array kosong ke view
    //         return view('konsumen.produk-konsumen', ['dataProduk' => [], 'totalProduk' => 0, 'dataKategori' => []]);
    //     }
    // }

    public function index()
    {
        $referenceProduk = $this->database->getReference('tb_produk');
        $dataProduk = $referenceProduk->getValue();

        $referenceKategori = $this->database->getReference('tb_kategori');
        $dataKategori = $referenceKategori->getValue();

        // Mendapatkan nilai dari input form filter (jika ada)
        $selectedKategori = request('kategori');

        // Filter dataProduk berdasarkan kategori yang dipilih
        if ($selectedKategori !== null && $selectedKategori != '0') {
            $dataProduk = array_filter($dataProduk, function ($produk) use ($selectedKategori) {
                return $produk['kategori'] == $selectedKategori;
            });
        }



        return view('konsumen.produk-konsumen', [
            'dataProduk' => $dataProduk,
            'dataKategori' => $dataKategori,
            'selectedKategori' => $selectedKategori, // Untuk menjaga selected option di dropdown
        ]);
    }

    public function filter(Request $request)
    {
        return redirect()->route('produk', ['kategori' => $request->input('kategori')]);
    }

    public function detail($id)
    {
        // Ambil data produk berdasarkan ID atau suatu identifier unik lainnya
        $referenceProduk = $this->database->getReference('tb_produk/' . $id);
        $produk = $referenceProduk->getValue();

        if ($produk !== null) {
            // Ambil data kategori dari tb_kategori
            $referenceKategori = $this->database->getReference('tb_kategori/' . $produk['kategori']);
            $kategori = $referenceKategori->getValue();

            if ($kategori !== null) {
                // Periksa apakah kategori dari tb_produk sama dengan kode dari tb_kategori
                if ($produk['kategori'] == $kategori['kode']) {
                    // Sertakan nama_kategori dalam data yang akan dikirimkan ke view
                    $data = ['produk' => $produk, 'nama_kategori' => $kategori['nama_kategori']];
                    return view('konsumen.detail-produk', $data);
                }
            }
        }
        // Jika produk tidak ditemukan atau kategori tidak cocok, berikan respons 404
        return abort(404);
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Get all products for searching
        $referenceProduk = $this->database->getReference('tb_produk');
        $dataProduk = $referenceProduk->getValue();

        // Filter products based on the search term
        if ($searchTerm) {
            $dataProduk = array_filter($dataProduk, function ($produk) use ($searchTerm) {
                return stripos($produk['nama_produk'], $searchTerm) !== false;
            });
        }

        $totalProduk = count($dataProduk);

        return view('konsumen.produk-konsumen', [
            'dataProduk' => $dataProduk,
            'totalProduk' => $totalProduk,
            'dataKategori' => [], // You may want to include categories as needed
            'selectedKategori' => null, // To reset selected category when searching
            'searchTerm' => $searchTerm, // To retain the search term for display
        ]);
    }
}
