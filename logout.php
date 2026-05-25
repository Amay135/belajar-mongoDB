<?php
session_start();
session_destroy(); // Menghapus seluruh sesi
header("Location: login.php");
exit;
?>