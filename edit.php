<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb+srv://amarmaruf:amarmaruf135@new.5cbkswv.mongodb.net/?appName=new");
$koleksi_warga = $client->db_desa->warga;

// 1. Ambil data lama untuk ditampilkan di form
$id_teks = $_GET['id'];
$barcode = new MongoDB\BSON\ObjectId($id_teks);
$data_lama = $koleksi_warga->findOne(['_id' => $barcode]);

// 2. Jika tombol update ditekan
if (isset($_POST['update'])) {
    // Siapkan data baru
    $data_baru = [
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat']
    ];

    // MANTRA UPDATE NOSQL: Gunakan '$set' agar data lain (seperti NIK & tanggal) tidak ikut hilang!
    $koleksi_warga->updateOne(
        ['_id' => $barcode],
        ['$set' => $data_baru]
    );

    echo "<script>alert('Data berhasil diupdate!'); window.location='index.php';</script>";
}
?>

<form method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?php echo $data_lama['nama'] ?? ''; ?>"><br>

    <label>Alamat:</label><br>
    <textarea name="alamat"><?php echo $data_lama['alamat'] ?? ''; ?></textarea><br><br>

    <button type="submit" name="update">Update Data</button>
</form>
