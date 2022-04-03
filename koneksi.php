<?php
$koneksi=mysqli_connect("localhost","root","","irham");

if(mysqli_connect_errno()){
    echo "Gagal koneksi ke database: " . mysqli_connect_error();
}

?>