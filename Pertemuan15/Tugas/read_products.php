<?php
require 'connect_and_create_table.php';

try {
    $sql = "SELECT name, price FROM products";
    $stmt = $pdo->query($sql);

    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['price']}</td>
              </tr>";
    }
    echo "</table>";

} catch(PDOException $e) {
    echo "Gagal membaca data: " . $e->getMessage();
}
?>
