<?php 
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
    $dbname = "dbpro";

    //buat koneksi 
    $conn = mysqli_connect($servername, $username, $password, $dbname); 

    //cek koneksi 
    if($conn -> connect_error){
        die ("koneksi gagal: ".mysqli_connect_error());
    }

    //insert data
    $sql= "INSERT INTO participants (nama, email) VALUES 
            ('Faisal', 'faisal@gmail.com'),
            ('Tata', 'tata@gmail.com')";

    if(mysqli_query($conn, $sql)){
        echo "New Record created successfully";
    }else{
        echo "Error: " .$sql . "<br>". mysqli_error($conn);
    }

    mysqli_close($conn);
?>