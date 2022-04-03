<?php
include('koneksi.php');



if(isset($_GET['Kode_Negara'])){

    $Kode_Negara = $_GET['Kode_Negara'];
    
    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_114 WHERE Kode_Negara='$Kode_Negara'") or die(mysqli_error($koneksi));
    
    if(mysqli_num_rows($cek) > 0){

        $delete = mysqli_query($koneksi, "DELETE FROM tbl_114 WHERE Kode_Negara='$Kode_Negara'") or die(mysqli_error($koneksi));
        if($delete){
            echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_datapenduduk";</script>';
        }else{
            echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_datapenduduk";</script>';
        }
    }else{
        echo '<script>alert("Kode Negara Tidak Ditemukan."); document.location="index.php?page=tampil_datapenduduk";</script>';
    }
}else{
    echo '<script>alert("Kode Negara Tidak Ditemukan."); document.location="index.php?page=tampil_datapenduduk";</script>';
}

?>
