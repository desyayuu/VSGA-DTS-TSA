<?php
require 'connect_and_create_table.php';

$min_price = isset($_POST['min_price']) ? $_POST['min_price'] : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Products</title>
</head>
<body>
    <form method="POST" action="">
        <label for="min_price">Minimum Price:</label>
        <input type="number" step="0.01" id="min_price" name="min_price" value="<?php echo htmlspecialchars($min_price); ?>">
        <button type="submit">Filter</button>
    </form>

    <?php
    try {
        $sql = "SELECT name, price FROM products WHERE price > :min_price";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':min_price', $min_price, PDO::PARAM_INT);
        $stmt->execute();

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
</body>
</html>
