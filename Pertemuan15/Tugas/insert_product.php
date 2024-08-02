<?php
require 'connect_and_create_table.php';

try {
    $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
    $stmt = $pdo->prepare($sql);

    $name = "Laptop";
    $price = 15000.00;

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);

    $stmt->execute();
    echo "Data berhasil dimasukkan";

} catch(PDOException $e) {
    echo "Gagal memasukkan data: " . $e->getMessage();
}
?>
