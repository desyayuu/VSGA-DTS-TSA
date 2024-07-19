<?php

    $nama= "Desy"; 
    echo "Tipe Data String: " .$nama . "<br>"; 

    $tingkat = 3; 
    echo "Tipe Data Integer: " .$tingkat ."<br>"; 

    $ipk = 3.54;
    echo "Tipe Data Float: " .$ipk ."<br>";  

    $status_aktif = true;
    echo "Tipe Data Boolean: " . ($status_aktif ? 'true' : 'false') .
    "<br>";

    // Tipe Data Array
    $matakuliah = array("Pemrograman Web", "Basis Data", "Matematika
    Diskrit");
    echo "Tipe Data Array: ";
    print_r($matakuliah); 
    echo "<br>"; 

    $kosong = NULL; 
    echo "Tipe Data Null: ". (is_null($kosong)? 'Null' : 'Bukan Null'); 

