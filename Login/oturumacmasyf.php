<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt ve Giriş Formu</title>
    <link rel="stylesheet" href="buton.css">
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container > * {
            display: block;
            margin: 10px auto; /* Yazıları ortalamak için */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="form-container">
    <?php 
        session_start();
        if(isset($_SESSION["kadi"])){
        include_once('function.php');
        $pdo = Database::db();
        $kadi = $_SESSION["kadi"];
        $query = "SELECT * FROM register WHERE kadi = '$kadi'";
        $stmt = $pdo -> prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <h1>HOŞGELDİNİZ</h1>
        <h1><?php echo $result['kadi']; ?></h1>
        <h1><?php echo $result['mail']; ?></h1>
        <!-- <a href="index.php" class = "button"><br>GİRİŞ SAYFASINA GERİ DÖN<br></a> -->
        <a href="oturumkpt.php" class = "button">OTURUMU KAPAT</a>
    <?php }else{ ?>
        <h1>Oturum Süresi dolmuştur...</h1>
        <a href="index.php" class = "button">Giriş Yap</a>
    <?php } ?>
        </div>
    </div>
</body>
</html>