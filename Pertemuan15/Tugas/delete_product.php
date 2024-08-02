<?php
require 'connect_and_create_table.php';

try {
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $id = 2;

    $stmt->bindParam(':id', $id);

    $stmt->execute();
    echo "Produk berhasil dihapus";

} catch(PDOException $e) {
    echo "Gagal menghapus produk: " . $e->getMessage();
}
?>
