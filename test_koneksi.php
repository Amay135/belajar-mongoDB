<?php
// 1. Panggil kamu mongodb dari vendor
require 'vendor/autoload.php';
 
// 2. Kunci (GANTI GAANTI GAANTI username dan password DENGAN PUNYA ANDA)
$kunci_gudang = "mongodb+srv://amarmaruf:amarmaruf135@new.5cbkswv.mongodb.net/?appName=new";
 
try {
    // 3. Buka jalan ke gudang
    $client = new MongoDB\Client($kunci_gudang);
 
    // 4. Pilih Ruangan (Database) dan Rak (Collection)
    // Misal gudang=desar_warga dan rak=data_desa dan rak nya datanya warga.
    $koleksi_warga = $client->db_desa->warga;
 
    // 5. Kita siapkan 1 data warga (dalam format Array PHP yang akan jadi JSON)
    $data_percobaan = [
        "nama" => "Asisten Lab Hebat",
        "jabatan" => "Pengajar",
        "status" => "Sukses konek"
    ];
 
    // 6. Masukkan data ke gudang
    $hasil = $koleksi_warga->insertOne($data_percobaan);
 
    echo "<h1>HORE! KONEKSI BERHASIL!</h1>";
    echo "Data berhasil masuk ke gudang dengan ID unik: " . $hasil->getInsertedId();
} catch (Exception $e){
    echo "<h1>YAHHH! PIPA BOCOR!</h1>";
    echo "Error: " . $e->getMessage();
}
?>
