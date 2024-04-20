<?php
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
    <div class="container" style="flex-direction:column;">
        <?php
            session_destroy();
            // if(session_status() === PHP_SESSION_ACTIVE){
            //     echo "Oturum açık"; // Oturum açık durumdaysa
            // } else {
            //     echo "Oturum kapalı"; // Oturum kapalı durumdaysa
            // }
        ?>
        <h1>OTURUM BAŞARIYLA KAPANMIŞTIR </h1>
        <a href="index.php" class = "button">GİRİŞ SAYFASINA GİT</a>
    </div>
</body>
</html>
