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
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Kayıt Ol</h2>
            <form action="login.php" method="POST">
                <input type="text" name="user" placeholder="Kullanıcı Adı" >
                <input type="email" name="eposta" placeholder="E-posta Adresi" >
                <input type="password" name="pass" placeholder="Şifre" >
                <button type="submit" name="kayit">Kayıt Ol</button> 
             </form>
        </div>
    </div>

</body>
</html>

