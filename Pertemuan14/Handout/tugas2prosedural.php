<?php 
$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "dbpro";

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname); 

// Cek koneksi
if ($conn -> connect_error) {
    die ("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data urut berdasarkan nama
$sql = "SELECT * FROM participants ORDER BY nama ASC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["nama"]. " - " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
