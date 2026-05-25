<?php
// Panggil Kamus MongoDB
require 'vendor/autoload.php';
 
// Kunci Pipa Gudang
$kunci_gudang = "mongodb+srv://amarmaruf:amarmaruf135@new.5cbkswv.mongodb.net/?appName=new";
$client = new MongoDB\Client($kunci_gudang);
$koleksi_warga = $client->db_desa->warga;
 
$pesan = ""; // Untuk menampilkan notifikasi sukses
 
// Mengecek apakah tombol simpan ditekan
if (isset($_POST['simpan'])) {
 
    // Membuat array data baru dari input formv
    $data_baru = [
        "nik" => $_POST['nik'],
        "nama" => $_POST['nama'],
        "alamat" => $_POST['alamat'],
        "tanggal_daftar" => date('Y-m-d H:i:s') 
    ];
 
     // Menyimpan data ke koleksi MongoDB
    $koleksi_warga->insertOne($data_baru);

     // Membuat pesan sukses setelah data berhasil disimpan
    $pesan = "Hore! Data Bapak/Ibu " . $_POST['nama'] . " berhasil didaftarkan!";
}
?>
<!DOCTYPE html>
<html>
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Warga Desa</title>
    <!-- <link rel="stylesheet" href="assets/style.css"> -->
</head>
 
<body>
    <h2>Loket Pendataan Warga</h2>
 
    <?php if ($pesan != "") {
        echo "<p style='color: green;'><b>$pesan</b></p>";
    } ?>
 
    <form method="POST" action="">
        <label>NIK:</label><br>
        <input type="text" name="nik" required><br><br>
 
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>
 
        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>
 
        <button type="submit" name="simpan">Simpan Data Warga</button>
    </form>
</body>
 
</html>
 
<table border="1" cellpadding="10">
    <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tanggal Daftar</th>
        <th>Aksi</th>
    </tr>
 
    <?php
    // Mengambil semua data dari koleksi warga
    $semua_warga = $koleksi_warga->find();
 
    foreach ($semua_warga as $warga) {
        echo "<tr>";
 
        echo "<td>" . ($warga['nik'] ?? '-') . "</td>";
        echo "<td>" . ($warga['nama'] ?? 'Tanpa Nama') . "</td>";
        echo "<td>" . ($warga['alamat'] ?? '-') . "</td>";
        echo "<td>" . ($warga['tanggal_daftar'] ?? '-') . "</td>";
 
        // Ambil ID MongoDB dan ubah jadi string
        $id_warga = (string) $warga['_id'];
 
        echo "<td>";
        echo "<a href='edit.php?id=$id_warga'>Edit</a> | ";
        echo "<a href='hapus.php?id=$id_warga' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>";
        echo "</td>";
 
        echo "</tr>";
    }
    ?>
</table>
 
<br>
<a href="logout.php">Keluar (Logout)</a>