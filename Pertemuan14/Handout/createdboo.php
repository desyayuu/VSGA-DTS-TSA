<?php 
    include "koneksi1.php"; 

    //buat db
    $sql = "CREATE DaTABASE dboo"; 
    if($conn->query($sql)===TRUE){
        echo "Database created successfully";
    }else{
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();

?>