<?php
// db.php - Koneksi ke database

$servername = "localhost";  // Ubah dengan host Anda, jika perlu
$username = "root";         // Ubah dengan username database Anda
$password = "";             // Ubah dengan password database Anda
$dbname = "donasi";    // Ubah dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
