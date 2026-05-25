<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb+srv://amarmaruf:amarmaruf135@new.5cbkswv.mongodb.net/?appName=new");

$koleksi_warga = $client->db_desa->warga;

if (isset($_GET['id'])) {

    // ambil id dari URL
    $id_teks = $_GET['id'];

    // ubah ke ObjectId MongoDB
    $barcode = new MongoDB\BSON\ObjectId($id_teks);

    // hapus data
    $koleksi_warga->deleteOne(['_id' => $barcode]);

    echo "<script>
    alert('Data berhasil dihapus');
    window.location='index.php';
    </script>";
}
?>