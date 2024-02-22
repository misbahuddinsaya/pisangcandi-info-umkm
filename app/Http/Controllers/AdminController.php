<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseServices;
use Kreait\Firebase\Storage;
use Kreait\Firebase\Factory;
use Google\Cloud\Storage\StorageClient;
use Kreait\Firebase\ServiceAccount;

class AdminController extends Controller
{
    protected $database;
    public function __construct()
    {
        $this->database = FirebaseServices::connect();
    }
    public function index()
    {
        $reference = $this->database->getReference('tb_daftarproduk');
        $data = $reference->getValue();

        $referenceKategori = $this->database->getReference('tb_kategori');
        $dataKategori = $referenceKategori->getValue();

        return view('admin.profile-admin', ['dataUmkm' => $data, 'dataKategori' => $dataKategori,]);
    }


    public function simpanUser(Request $request)
    {
        $reference = $this->database->getReference('tb_userumkm');

        // Get the latest kode_produk from tb_produk
        $datakodeTerahir = $reference->orderByKey()->limitToLast(1)->getValue();

        $lastKode = null;
        if ($datakodeTerahir !== null) {
            $lastEntry = end($datakodeTerahir);
            $lastKode = $lastEntry['kode_user'];
        }
        $newKode = $this->generateNewCodeUser($lastKode);
        // Handle file upload
        // dd($newKode);
        $newData = [
            $newKode => [
                'kode_user' => $newKode,
                'nama' => $request->nama_user,
                'username' => $request->username,
                'password' => $request->password,
                'role' => $request->role,
            ]
        ];

        // Use push method to add a new product with a generated key
        $reference->update($newData);
        alert()->success('Berhasil', 'Data UMKM Berhasil di Tambahkan.');
        return redirect('/profile-admin');
    }

    protected function generateNewCodeUser($lastKode)
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


    public function hapusUmkm($id)
    {

        $referenceProduk = $this->database->getReference('tb_daftarproduk/' . $id);

        // Check if the data exists before attempting to delete
        $existingData = $referenceProduk->getValue();

        if ($existingData !== null) {
            // Delete the data
            $referenceProduk->remove();
            alert()->success('Berhasil', 'Data umkm Berhasil di Hapus.');
            return redirect('/profile-admin'); // Redirect to the product list or other appropriate page
        } else {
            // If the product is not found, return a 404 response or handle it as needed
            return abort(404);
        }
    }

    public function simpanDaftarUmkm(Request $request)
    {
        $reference = $this->database->getReference('tb_daftarproduk');

        // Get the latest kode_produk from tb_produk
        $datakodeTerahir = $reference->orderByKey()->limitToLast(1)->getValue();

        $lastKode = null;
        if ($datakodeTerahir !== null) {
            $lastEntry = end($datakodeTerahir);
            $lastKode = $lastEntry['kode_produk'];
        }
        $newKode = $this->generateNewCodeDaftarUmkm($lastKode);
        // Handle file upload
        $uploadedFile = $request->file('fileproduk1');
        $namaProdukBaru = str_replace(' ', '', $request->namaProduk);
        $extension = $uploadedFile->getClientOriginalExtension();
        $namaFoto = 'UMKM1-' . $namaProdukBaru . '-' . time() . '.' . $extension;

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
        // Dapatkan URL file yang diunggah
        $fileUrl1 = $object->signedUrl(new \DateTime('+10 years'));

        // File Produk 2
        $uploadedFile2 = $request->file('fileproduk2');
        $namaProdukBaru2 = str_replace(' ', '', $request->namaProduk);
        $extension2 = $uploadedFile2->getClientOriginalExtension();
        $namaFoto2 = 'UMKM2-' . $namaProdukBaru2 . '-' . time() . '.' . $extension2;

        // Konfigurasi Firebase
        $factory2 = (new Factory)->withServiceAccount(__DIR__ . '/firebase_credentials.json');
        
        // Simpan file ke Firebase Storage
        $storage2 = $factory2->createStorage();
        $bucket2 = $storage2->getBucket('umkm-9256e.appspot.com');
        $object2 = $bucket2->upload(
            fopen($uploadedFile2->getRealPath(), 'r'),
            [
                'name' => 'Umkm/' . $namaFoto2
            ]
        );
        // Dapatkan URL file yang diunggah
        $fileUrl2 = $object2->signedUrl(new \DateTime('+10 years'));

        // dd($newKode);
        $newData = [
            $newKode => [
                'kode_produk' => $newKode,
                'nama_produk' => $request->namaProduk,
                'deskripsi' => $request->deskripsi,
                'kategori' => $request->kategori_produk,
                'keterangan' => $request->keterangan_produk,
                'foto_produk1' => $fileUrl1,
                'foto_produk2' => $fileUrl2,
                'alamat' => $request->alamat,
                'nama_pemilik' => $request->nama_pemilik,
                'instagram' => $request->instagram,
                'no_whatsapp' => $request->no_whatsapp,
            ]
        ];

        // Use push method to add a new product with a generated key
        $reference->update($newData);
        alert()->success('Berhasil', 'Data Umkm Berhasil di Tambahkan.');
        return redirect('/profile-admin');
    }

    protected function generateNewCodeDaftarUmkm($lastKode)
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
    public function editData($id)
    {
        $referenceProduk = $this->database->getReference('tb_daftarproduk/' . $id);
        $productData = $referenceProduk->getValue();

        return view('admin.profile-admin', ['[dataUmkm]' => $productData]);
    }
}
