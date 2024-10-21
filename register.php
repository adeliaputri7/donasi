<?php
// Termasuk file db.php untuk koneksi database
include('db.php');

// Cek jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menangkap data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Validasi password
    if ($password !== $confirmPassword) {
        echo "<script>alert('Password dan Konfirmasi Password tidak cocok!');</script>";
        exit;
    }

     // Cek apakah email sudah digunakan
     $sql_check_email = "SELECT id FROM users WHERE email = ?";
     $stmt_check_email = $conn->prepare($sql_check_email);
     $stmt_check_email->bind_param("s", $email);
     $stmt_check_email->execute();
     $stmt_check_email->store_result();
 
     if ($stmt_check_email->num_rows > 0) {
         // Email sudah terdaftar
         echo "<script>alert('Email sudah terdaftar! Silakan gunakan email lain.');</script>";
         $stmt_check_email->close();
         $conn->close();
         exit;
     }

    // Enkripsi password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Siapkan query untuk memasukkan data ke database
    $sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";

    // Persiapkan statement SQL
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $hashedPassword);

    // Eksekusi query
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman login
        header("Location: login.html");  // Redirect ke login.php setelah registrasi berhasil
        exit();
    } else {
        // Jika gagal, tampilkan error
        echo "<script>alert('Terjadi kesalahan saat registrasi: " . $stmt->error . "'); window.location.href='register.php';</script>";
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
