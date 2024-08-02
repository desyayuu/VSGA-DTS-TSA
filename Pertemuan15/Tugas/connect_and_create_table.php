<?php 
$host = 'localhost'; 
$db = 'my_database'; 
$user = 'root'; 
$pass = ''; 

try {
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi Berhasil <br>";

    // Buat tabel products
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        price FLOAT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
    echo "Tabel products berhasil dibuat <br>";

} catch(PDOException $e) {
    echo "Koneksi Gagal: " . $e->getMessage();
}
?>
