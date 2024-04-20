<?php
ini_set("display_errors","0");
require("login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt ve Giriş Formu</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buton.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Giriş yap</h2>
            <form action="login.php" method="POST">
                <input type="text" name="giris_username" placeholder="Kullanıcı Adı" required>
                <input type="password" name="giris_password" placeholder="Şifre" required>
                <button type="submit" class = "button" name="giris">GİRİŞ YAP</button> 
            </form>
            <a href="kayitsyf.php" class="button" >KAYIT OLMAK İÇİN TIKLA</a>
        </div>
    </div>
</body>
</html>
