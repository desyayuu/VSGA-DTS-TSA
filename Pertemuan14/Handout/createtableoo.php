<?php 
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
    $dbname = "dboo";

    //buat koneksi 
    $conn = new mysqli ($servername, $username, $password, $dbname); 

    //cek koneksi 
    if($conn -> connect_error){
        die ("koneksi gagal: ". $conn-> connect_error);
    }

    //buat table
    $sql= "CREATE TABLE participants(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            nama VARCHAR(50) NOT NULL, 
            email VARCHAR (50), 
            tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

    if($conn->query($sql)===TRUE){
        echo "Table participants created successfully";
    }else{
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
?>