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

$username = $_POST['username'];
$password = $_POST['password'];

$login_success = false;
$login_count = 0;

if ($username === $username_valid && $password === $password_valid) {
    $login_success = true;

    if (!isset($_SESSION["login"])) {
        $_SESSION["login"] = [];
    }

    $_SESSION["login"][] = [
        "username" => $username,
        "login_time" => date("Y-m-d H:i:s")
    ];

    $login_count = count($_SESSION["login"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #b5c203ff, #000000ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333333ff;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            background: #bbb810ff;
            color: white;
            padding: 10px 15erpx;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background: #2980b9;
        }
        .error {
            color: red;
        }
        .log {
            text-align: left;
            background: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            max-height: 150px;
            overflow-y: auto;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="table">
    <?php if ($login_success): ?>
        <h1>✅ Selamat datang, <b><?= htmlspecialchars($username) ?></b></h1>
        <p>Anda sudah login sebanyak <b><?= $login_count ?></b> kali.</p>
        <a href="logout.php">Logout</a>
        <div class="log">
            <?php foreach ($_SESSION["login"] as $log): ?>
                <div>^_^ <?= $log["login_time"] ?></div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <h1 class="error">Email/pw salah <br>
▒▒▒▒▒▒▒▓
▒▒▒▒▒▒▒▓▓▓
▒▓▓▓▓▓▓░░░▓
▒▓░░░░▓░░░░▓
▓░░░░░░▓░▓░▓
▓░░░░░░▓░░░▓
▓░░▓░░░▓▓▓▓
▒▓░░░░▓▒▒▒▒▓
▒▒▓▓▓▓▒▒▒▒▒▓
▒▒▒▒▒▒▒▒▓▓▓▓
▒▒▒▒▒▓▓▓▒▒▒▒▓
▒▒▒▒▓▒▒▒▒▒▒▒▒▓
▒▒▒▓▒▒▒▒▒▒▒▒▒▓
▒▒▓▒▒▒▒▒▒▒▒▒▒▒▓
▒▓▒▓▒▒▒▒▒▒▒▒▒▓
▒▓▒▓▓▓▓▓▓▓▓▓▓
▒▓▒▒▒▒▒▒▒▓
▒▒▓▒▒▒▒▒▓.</h1>
        <a href="index.html">Kembali ke halaman login</a>
    <?php endif; ?>
</div>
</body>
</html>
