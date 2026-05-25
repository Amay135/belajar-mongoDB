<?php
session_start(); 
require 'vendor/autoload.php';

// Koneksi MongoDB (pakai punyamu)
$kunci_gudang = "mongodb+srv://amarmaruf:amarmaruf135@new.5cbkswv.mongodb.net/?appName=new";
$client = new MongoDB\Client($kunci_gudang);
$koleksi_petugas = $client->db_desa->petugas;

$cek_admin = $koleksi_petugas->findOne(['username' => 'admin']);

if (!$cek_admin) {
    $koleksi_petugas->insertOne([
        'username' => 'admin',
        // WAJIB pakai hash!
        'password' => password_hash('rahasia123', PASSWORD_DEFAULT)
    ]);
}

$pesan_error = "";

if (isset($_POST['login_biasa'])) {
    $user_input = $_POST['username'];
    $pass_input = $_POST['password'];

    // Cari user
    $petugas = $koleksi_petugas->findOne(['username' => $user_input]);

    // Verifikasi password
    if ($petugas && password_verify($pass_input, $petugas['password'])) {
        $_SESSION['punya_gelang'] = true;
        $_SESSION['nama_petugas'] = $petugas['username'];

        header("Location: index.php");
        exit;
    } else {
        $pesan_error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Petugas</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            height: 100vh;
            background: #f4f6f9;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .kotak {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 300px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-size: 13px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #4CAF50;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: #4CAF50;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #43a047;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="kotak">
        <h2>Login</h2>

        <?php if ($pesan_error != "") {
            echo "<p class='error'>$pesan_error</p>";
        } ?>

        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" name="login_biasa">Masuk</button>
        </form>

        <p style="text-align:center; font-size: 12px; margin-top:15px;">
            <a href="register.php">Belum punya akun? Daftar</a>
        </p>
    </div>
</body>
</html>