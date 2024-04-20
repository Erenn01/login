<?php
require("function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt ve Giriş Formu</title>
    <link rel="stylesheet" href="buton.css">
</head>
<body>
    <?php

if(isset($_POST["kayit"])){
    $kullaniciadi = isset($_POST["user"]) ? $_POST["user"] : null;
    $email = isset($_POST["eposta"]) ? $_POST["eposta"] : null;
    $password = isset($_POST["pass"]) ? $_POST["pass"] : null;
       
    if(!$kullaniciadi || !$email || !$password){
        echo   "lütfen boş alanları doldurunuz ";
    }
    else{
        try{
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                $pdo = Database::db();
                $query = "SELECT mail FROM `register` WHERE mail = :eposta or kadi = :kadi";
                $stmt = $pdo ->prepare($query);
                $stmt->bindParam(":eposta", $email);
                $stmt->bindParam(":kadi", $kullaniciadi);
                $stmt->execute();
                $result = $stmt->rowCount();
                    if($result==0){
                        $pdo = Database::db();
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $query = "INSERT INTO `register`(kadi, mail, sifre) VALUES (?,?,?)";
                        $stmt = $pdo->prepare($query);
                        $stmt ->execute([$kullaniciadi,$email,$hashed_password]);
                        $res = $stmt->rowCount();
                        
                            if($res > 0){
                                echo "kayıt başarılı şekilde oluşturuldu!";
                                header("location: index.php");
                                exit;
                            }
                            else{
                                echo "kayıt oluşturma başarısız oldu !";
                            }
                    }
                    else{
                        echo "BU KAYIT ZATEN SİSTEMDE EKLİ";
                        echo '<a href="index.php" class="button" > GİRİŞ YAPMAK İÇİN TIKLAYINIZ!</a>';
                    }
            }else{
                echo "kayıt başarısız kodları incele!";
            }
        }
        catch(PDOException $e){
            die("kayıt sırasında bir hata oluştu ".$e->getMessage());
        }
    }
}
session_start();
if(isset($_POST["giris"])){
    if(isset($_POST["giris_username"]) && isset($_POST["giris_password"])){
        try{
            $user = $_POST["giris_username"];
            $pass = $_POST["giris_password"];
            $pdo = Database::db();
            $sql = "SELECT sifre FROM `register` WHERE kadi = :user";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":user",$user);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                if(password_verify($pass,$result['sifre'])){
                    $_SESSION["kadi"] = $user;
                    echo "başarılı şekilde giriş yapıldı";
                    header("location: oturumacmasyf.php");
                    exit;
                }
                else{
                    echo "Şifre hatalı";
                }
            }
            else{
                echo "Böyle bir kullanıcı yok ! ";
                echo '<a href="index.php" class="button" > TEKRAR DENEYİNİZ! </a>';
            }
        }
        catch(PDOException $x){
            die("bağlantı hatası ".$x->getMessage());
        }
    }
}
    ?>
</body>
</html>

