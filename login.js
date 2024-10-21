

    // Validasi jika form kosong
    if (email === "" || password === "") {
        alert("Mohon Isi Form Dahulu");
    } else if (email === registeredUser.email && password === registeredUser.password) {
        // Jika email dan password cocok
        alert("Berhasil Masuk");
        window.location.href = `dashboard.html?name=${registeredUser.name}`; // Arahkan ke halaman dashboard
    } else {
        // Jika email atau password salah
        alert("Email/Password Salah");
    }


// Fungsi untuk button Daftar
document.getElementById("daftar-btn").addEventListener("click", function() {
    window.location.href = "register.html"; // Arahkan ke halaman register
});

// Fungsi untuk button Masuk dengan Google
document.getElementById("google-login-btn").addEventListener("click", function() {
    // Simulasi login dengan Google
    alert("Berhasil Masuk dengan Google");
    window.location.href = `dashboard.html?name=GoogleUser`; // Arahkan ke dashboard dengan nama "GoogleUser"
});
