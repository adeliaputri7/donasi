<?php
session_start();  // Mulai session untuk menyimpan informasi login
include('db.php'); // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form login
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk cek apakah email sudah terdaftar
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika email ditemukan, ambil data user
        $user = $result->fetch_assoc();

        // Periksa password yang dimasukkan dengan password yang disimpan (yang sudah di-hash)
        if (password_verify($password, $user['password'])) {
            // Password benar, login berhasil
            // Simpan data pengguna di session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            
            // Redirect ke halaman dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Password salah
            echo "<script>alert('Password salah!'); window.location.href='login.html';</script>";
            exit();
        }
    } else {
        // Email tidak ditemukan
        echo "<script>alert('Email tidak ditemukan!'); window.location.href='login.html';</script>";
        exit();
    }
}
