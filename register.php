<?php
require 'vendor/autoload.php';

// Pastikan URI koneksi sesuai dengan pengaturan MongoDB Atlas Anda
$kunci_gudang = "mongodb+srv://amarmaruf:amarmaruf135@new.5cbkswv.mongodb.net/?appName=new";
$client = new MongoDB\Client($kunci_gudang);
$koleksi_petugas = $client->db_desa->petugas;

$pesan = "";

if (isset($_POST['daftar'])) {
    $user_input = $_POST['username'];
    $pass_input = $_POST['password'];

    // 1. Mencegah nama kembar
    $cek_kembar = $koleksi_petugas->findOne(['username' => $user_input]);

    if ($cek_kembar) {
        $pesan = "<p style='color:red;'>Nama pengguna telah terdaftar! Pilih nama lain.</p>";
    } else {
        // 2. MENGACAK KATA SANDI (Sangat Penting!)
        $sandi_rahasia = password_hash($pass_input, PASSWORD_DEFAULT);

        // 3. Menyimpan ke database (Simpan variabel $sandi_rahasia)
        $koleksi_petugas->insertOne([
            'username' => $user_input,
            'password' => $sandi_rahasia,
            'role'     => 'admin'
        ]);

        $pesan = "<p style='color:green;'>Pendaftaran Sukses! Silakan Login.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Petugas</title>
    <style>
        body { background-color: #FDFBF7; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .kotak { background: white; padding: 40px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); width: 300px; }
        input { padding: 10px; margin-bottom: 15px; width: 100%; box-sizing: border-box; }
        button { background-color: #8C735D; color: white; padding: 10px; width: 100%; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="kotak">
        <h2>Daftar Petugas Baru</h2>
        <?php echo $pesan; ?>
        <form method="POST" action="">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="daftar">Daftar</button>
        </form>
        <p style="text-align:center; font-size: 14px;"><a href="login.php">Sudah punya akun? Login</a></p>
    </div>
</body>
</html>