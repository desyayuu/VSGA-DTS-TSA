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

// Insert data
$sql = "INSERT INTO participants (nama, email) VALUES 
        ('Lika', 'lika@gmail.com'),
        ('Rafli', 'rafli@gmail.com')";

if (mysqli_query($conn, $sql)) {
    echo "New Record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
