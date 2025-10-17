<?php
session_start();

// Data login valid
$username_valid = "abc";
$password_valid = "123";

// Jika form tidak diisi, balik ke halaman login
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: index.html");
    exit();
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek kecocokan username dan password
if ($username === $username_valid && $password === $password_valid) {
    // Simpan data login ke session
    if (!isset($_SESSION["login"])) {
        $_SESSION["login"] = [];
    }

    $_SESSION["login"][] = [
        "username" => $username,
        "login_time" => date("Y-m-d H:i:s")
    ];

    echo "✅ Selamat datang, <b>" . htmlspecialchars($username) . "</b>.<br>";
    echo "Anda sudah login sebanyak <b>" . count($_SESSION["login"]) . "</b> kali.<br><br>";

    echo '<a href="logout.php">Logout</a><br><br>';

    echo '<pre>';
    var_dump($_SESSION["login"]);
    echo '</pre>';
} else {
    echo "❌ Username atau password salah.<br>";
    echo '<a href="index.html">Kembali ke halaman login</a>';
}
?>
