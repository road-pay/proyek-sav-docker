<?php
$host = "db"; 
$user = "user";
$pass = "userpassword";
$db   = "crud_db";

try {
    // Mencoba koneksi
    $koneksi = mysqli_connect($host, $user, $pass, $db);
} catch (mysqli_sql_exception $e) {
    // Jika error, tampilkan pesan aslinya
    die("Gagal Terkoneksi: " . $e->getMessage());
}

// Cek manual (untuk jaga-jaga)
if (!$koneksi) {
    die("Gagal Terkoneksi: " . mysqli_connect_error());
}
?>