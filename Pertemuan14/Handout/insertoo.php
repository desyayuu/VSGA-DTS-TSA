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
    echo "Koneksi berhasil<br>";

    //insert data
    $sql= "INSERT INTO participants (nama, email) VALUES 
            ('Faisal', 'faisal@gmail.com'),
            ('Tata', 'tata@gmail.com')";

    if($conn->query($sql)===TRUE){
        echo "New Record created successfully";
    }else{
        echo "Error: " .$sql . "<br>". $conn->error;
    }

    $conn->close();
?>