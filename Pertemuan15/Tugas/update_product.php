<?php
require 'connect_and_create_table.php';

try {
    $sql = "UPDATE products SET price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $id = 1;
    $price = 17500.00;

    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':price', $price);

    $stmt->execute();
    echo "Harga produk berhasil diperbarui";

} catch(PDOException $e) {
    echo "Gagal memperbarui harga: " . $e->getMessage();
}
?>
