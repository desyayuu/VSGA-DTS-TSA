<?php 
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";

    //buat koneksi 
    $conn = mysqli_connect($servername, $username, $password); 

    //cek koneksi 
    if($conn -> connect_error){
        die ("koneksi gagal: ". mysqli_connect_error());
    }
    echo "Koneksi berhasil";
?>