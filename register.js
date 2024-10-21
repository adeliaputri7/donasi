document.getElementById("daftar-btn").addEventListener("click", function() {
    // Ambil nilai dari setiap input
    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var password = document.getElementById("password").value.trim();
    var confirmPassword = document.getElementById("confirm-password").value.trim();

    // Validasi apakah semua field terisi
    if (name === "" || email === "" || phone === "" || password === "" || confirmPassword === "") {
        // Jika ada field yang kosong, munculkan alert
        alert("Mohon Isi Semua Form");
    } else if (password !== confirmPassword) {
        // Jika password dan konfirmasi password tidak sama
        alert("Password dan Konfirmasi Password Tidak Cocok!");
    } else {
        // Jika semua field terisi dan password cocok
        alert("Pendaftaran Berhasil");
        // Arahkan ke halaman login
        window.location.href = "login.html"; // Ganti "login.html" dengan halaman tujuan
    }
});

