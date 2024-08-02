<?php 
    $host = 'localhost'; 
    $db = 'crud_example'; 
    $user = 'root'; 
    $pass = ''; 

    try{
        $dsn = "mysql:hppst=$host; dbname=$db; charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Koneksi Berhasil <br>";
    }catch(PDOException $e){
        echo "Koneksi Gagal: ".$e->getMessage();
    }


?>