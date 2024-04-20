<?php
class Database{
    public static function db(){
        $ini = dirname(__FILE__)."/config.ini";
        $con = parse_ini_file($ini,true);
        if($con===false){
            die("İNİ DOSYASINA ULAŞILAMADI");
        }
        else{
            $hostnm = $con["hostname"];
            $datanm = $con["dataname"];
            $user = $con["username"];
            $pass = $con["password"];
            $dsn = "mysql: host={$hostnm}; dbname={$datanm}";
            try{
                $pdo = new PDO($dsn , $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }
            catch(PDOException $x){
                die("veritabanı bağlantısı sağlanamadı".$x->getMessage());
            }
        }
    }
}
?>