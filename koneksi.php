<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "miralaundry";

    #Melakukan Koneksi
    $db = mysqli_connect($server, $user, $pass, $database);

    #Terjadi Koneksi atau Tidak => True/False
    // if($db){
    //     echo "Berhasil Gan";
    // }else{
    //     echo "Koneksi Gagal Bos";
    // }



?>