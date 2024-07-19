<?php
    $nama = "Desy"; 
    $usia = 21; 
    $ipk = 3.73; 
    $status_aktif = true; 


    echo "Nama: " .$nama. "<br>"; 
    echo "Usia: " .$usia. "<br>"; 
    echo "IPK: " .$ipk. "<br>"; 
    echo "Status Aktif: " . ($status_aktif ? 'Aktif' : 'Tidak Aktf'). "<br>"; 

    define("NAMA_KAMPUS", "Politeknik Negeri Malang"); 
    const NAMA_MATAKULIAH = "Desain dan Pemrograman Web";

    echo "NAMA KAMPUS: ". NAMA_KAMPUS. "<br>"; 
    echo "NAMA MATA KULIAH: ". NAMA_MATAKULIAH. "<br>";
?>