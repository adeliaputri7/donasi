<?php
session_start();  // Mulai session untuk mengakses data pengguna yang login

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak login, arahkan ke halaman login
    header("Location: login.html");
    exit();
}

// Ambil nama pengguna dari session
$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang, <?php echo htmlspecialchars($user_name); ?>!</h1>
    <p>Ini adalah halaman dashboard Anda.</p>

    <!-- Bisa menambahkan konten lain di sini -->

    <a href="logout.php">Logout</a>
</body>
</html>
