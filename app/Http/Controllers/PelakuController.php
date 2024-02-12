<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseServices;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Storage;
use Kreait\Firebase\Factory;
use Google\Cloud\Storage\StorageClient;
use Kreait\Firebase\ServiceAccount;

class PelakuController extends Controller
{
    protected $database;
    public function __construct()
    {
        $this->database = FirebaseServices::connect();
    }

    public function index()
    {
        // Ambil kode user dari sesi login
        $kodeUser = Session::get('umkm_data')['kode_user'] ?? null;

        // Cek apakah kode user ada sebelum melanjutkan
        if ($kodeUser === null) {
            return redirect('/')->with('error', 'Kode user tidak ditemukan.');
        }

        // Ambil data umkm berdasarkan kode user dari tb_umkm
        $umkmRef = $this->database->getReference('tb_umkm')->orderByChild('kode_user')->equalTo($kodeUser);
        $umkmSnapshot = $umkmRef->getValue();

        // Cek apakah snapshot memiliki nilai atau tidak
        if (!empty($umkmSnapshot)) {
            // Ambil kode umkm dari hasil pencarian
            $kodeUmkm = key($umkmSnapshot);

            // Ambil data produk berdasarkan kode_umkm dari tb_produk
            $referenceProduk = $this->database->getReference('tb_produk');
            $dataProduk = $referenceProduk->orderByChild('kode_umkm')->equalTo($kodeUmkm)->getValue();

            $referenceKategori = $this->database->getReference('tb_kategori');
            $dataKategori = $referenceKategori->getValue();

            // Mendapatkan nilai dari input form filter (jika ada)
            $selectedKategori = request('kategori');

            // Filter dataUmkm berdasarkan kategori yang dipilih
            if ($selectedKategori !== null && $selectedKategori != '0') {
                $dataProduk = array_filter($dataProduk, function ($produk) use ($selectedKategori) {
                    return $produk['kategori'] == $selectedKategori;
                });
            }

            $totalProduk = count($dataProduk);

            return view('pelaku-umkm.profile-umkm', [
                'dataProduk' => $dataProduk,
                'totalProduk' => $totalProduk,
                'dataKategori' => $dataKategori,
                'selectedKategori' => $selectedKategori,
            ]);
        } else {
            return redirect('/')->with('error', 'Data UMKM tidak ditemukan.');
        }
    }




    public function simpan(Request $request)
    {
        $reference = $this->database->getReference('tb_produk');

        // Get the latest kode_produk from tb_produk
        $datakodeTerahir = $reference->orderByKey()->limitToLast(1)->getValue();

        $lastKode = null;
        if ($datakodeTerahir !== null) {
            $lastEntry = end($datakodeTerahir);
            $lastKode = $lastEntry['kode_produk'];
        }
        $newKode = $this->generateNewCode($lastKode);
        // Handle file upload
        $uploadedFile = $request->file('file');
        $namaProdukBaru = str_replace(' ', '', $request->namaProduk);
        $extension = $uploadedFile->getClientOriginalExtension();
        $namaFoto = 'PRODUK-' . $namaProdukBaru . '-' . time() . '.' . $extension;

        // Konfigurasi Firebase
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/firebase_credentials.json');

        // Simpan file ke Firebase Storage
        $storage = $factory->createStorage();
        $bucket = $storage->getBucket('umkm-9256e.appspot.com');
        $object = $bucket->upload(
            fopen($uploadedFile->getRealPath(), 'r'),
            [
                'name' => 'Umkm/' . $namaFoto
            ]
        );

        // Ambil data umkm dari sesi login
        $umkmData = Session::get('umkm_data');

        // Pastikan kode_umkm ada dalam data umkm
        $kodeUmkm = $umkmData['kode_user'] ?? null;

        // Dapatkan URL file yang diunggah
        $fileUrl = $object->signedUrl(new \DateTime('+10 years'));
        // dd($newKode);
        $newData = [
            $newKode => [
                'kode_produk' => $newKode,
                'nama_produk' => $request->namaProduk,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori_produk,
                'harga' => $request->harga_produk,
                'keterangan' => $request->keterangan_produk,
                'foto_produk' => $fileUrl,
                'kode_umkm' => $kodeUmkm,
            ]
        ];

        // Use push method to add a new product with a generated key
        $reference->update($newData);
        alert()->success('Berhasil', 'Data Produk Berhasil di Tambahkan.');
        return redirect('/profile-umkm');
    }

    protected function generateNewCode($lastKode)
    {
        // Jika tidak ada kode sebelumnya, mulai dengan K001
        if (!$lastKode) {
            return 'P001';
        }

        // Ambil nomor dari kode terakhir, tambahkan 1, dan format ulang ke dalam K00X
        $number = (int) substr($lastKode, 1); // Ambil angka dari kode terakhir
        $newNumber = $number + 1; // Tambahkan 1 ke nomor terakhir
        $paddedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT); // Format ulang angka ke dalam tiga digit
        $newKode = 'P' . $paddedNumber;

        return $newKode;
    }
    public function showData()
    {
        $reference = $this->database->getReference('tb_produk');
        $data = $reference->getValue();

        if ($data !== null) {
            return view('pelaku-umkm.profile-umkm', ['dataProduk' => $data]);
        } else {
            // Jika data kosong, kirimkan array kosong ke view
            return view('pelaku-umkm.profile-umkm', ['dataProduk' => [], 'totalProduk' => 0]);
        }
    }
    public function deleteData($id)
    {
        $referenceProduk = $this->database->getReference('tb_produk/' . $id);

        // Check if the data exists before attempting to delete
        $existingData = $referenceProduk->getValue();

        if ($existingData !== null) {
            // Delete the data
            $referenceProduk->remove();
            alert()->success('Berhasil', 'Data Produk Berhasil di Hapus.');
            return redirect('/profile-umkm'); // Redirect to the product list or other appropriate page
        } else {
            // If the product is not found, return a 404 response or handle it as needed
            return abort(404);
        }
    }
    public function editData($id)
    {
        $referenceProduk = $this->database->getReference('tb_produk/' . $id);
        $productData = $referenceProduk->getValue();

        return view('pelaku-umkm.profile-umkm', ['[dataProduk]' => $productData]);
    }
    public function detailUmkm($id)
    {

        $referenceUmkm = $this->database->getReference('tb_umkm/' . $id);
        $umkmData = $referenceUmkm->getValue();

        if (!$umkmData) {
            // Handle jika umkm tidak ditemukan
            return redirect('/')->with('error', 'UMKM tidak ditemukan');
        }

        // Mendapatkan kodeUMKM dari data umkm
        $kodeUMKM = $umkmData['kode_umkm'];

        // Mendapatkan data produk terkait dengan umkm berdasarkan kodeUMKM
        $referenceProduk = $this->database->getReference('tb_produk')->orderByChild('kode_umkm')->equalTo($kodeUMKM);
        $produkData = $referenceProduk->getValue();

        return view('pelaku-umkm.detail-umkm', [
            'detailUmkm' => $umkmData,
            'produkUmkm' => $produkData,
        ]);
    }
    public function simpanUmkm(Request $request)
    {
        $reference = $this->database->getReference('tb_umkm');

        // Get the latest kode_produk from tb_produk
        $datakodeTerahir = $reference->orderByKey()->limitToLast(1)->getValue();

        $lastKode = null;
        if ($datakodeTerahir !== null) {
            $lastEntry = end($datakodeTerahir);
            $lastKode = $lastEntry['kode_umkm'];
        }
        $newKode = $this->generateNewCodeUmkm($lastKode);
        // Handle file upload
        $uploadedFile = $request->file('file');
        $namaProdukBaru = str_replace(' ', '', $request->namaProduk);
        $extension = $uploadedFile->getClientOriginalExtension();
        $namaFoto = 'UMKM-' . $namaProdukBaru . '-' . time() . '.' . $extension;

        // Konfigurasi Firebase
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/firebase_credentials.json');

        // Simpan file ke Firebase Storage
        $storage = $factory->createStorage();
        $bucket = $storage->getBucket('umkm-9256e.appspot.com');
        $object = $bucket->upload(
            fopen($uploadedFile->getRealPath(), 'r'),
            [
                'name' => 'Umkm/' . $namaFoto
            ]
        );

        $umkmData = Session::get('umkm_data');
        $kodeUser = $umkmData['kode_user'] ?? null;

        $fileUrl = $object->signedUrl(new \DateTime('+10 years'));
        $newData = [
            $newKode => [
                'kode_umkm' => $newKode,
                'nama_umkm' => $request->namaUmkm,
                'jumlah_produk' => $request->jumlah_produk,
                'alamat' => $request->alamat,
                'nomer_tlp' => $request->no_tlp,
                'profile_umkm' => $fileUrl,
                'kode_user' => $kodeUser,
            ]
        ];

        // Use push method to add a new product with a generated key
        $reference->update($newData);
        alert()->success('Berhasil', 'Data UMKM Berhasil di Tambahkan.');
        return redirect('/');
    }
    protected function generateNewCodeUmkm($lastKode)
    {
        // Jika tidak ada kode sebelumnya, mulai dengan K001
        if (!$lastKode) {
            return 'U001';
        }

        // Ambil nomor dari kode terakhir, tambahkan 1, dan format ulang ke dalam K00X
        $number = (int) substr($lastKode, 1); // Ambil angka dari kode terakhir
        $newNumber = $number + 1; // Tambahkan 1 ke nomor terakhir
        $paddedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT); // Format ulang angka ke dalam tiga digit
        $newKode = 'U' . $paddedNumber;

        return $newKode;
    }
    public function daftarUmkm()
    {
        return view('pelaku-umkm.daftar-umkm');
    }
}
