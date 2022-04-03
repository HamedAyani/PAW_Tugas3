<?php
include('koneksi.php');
?>

<center><font size="6">Tambah Data</center>
<hr>
<?php
if(isset($_POST['submit'])){
    $Kode_Negara = $_POST['Kode_Negara'];
    $Nama_Negara = $_POST['Nama_Negara'];
    $Jumlah_Populasi = $_POST['Jumlah_Populasi'];
    $Luas_Wilayah = $_POST['Luas_Wilayah'];

    $cek = mysqli_query($koneksi, "SELECT * FROM tbl_114 WHERE Kode_Negara='$Kode_Negara'") or die(mysqli_error($koneksi));
    
    
    if(mysqli_num_rows($cek)==0){
        $sql = mysqli_query($koneksi, "INSERT INTO tbl_114(Kode_Negara, Nama_Negara, Jumlah_Populasi, Luas_Wilayah) values('$Kode_Negara', '$Nama_Negara', '$Jumlah_Populasi', '$Luas_Wilayah')") or die(mysqli_error($koneksi));

        if($sql){
            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_datapenduduk";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
        }
    }else{
        echo '<div class="alert alert-warning">Gagal melakukan proses tambah data, Kode Negara Sudah Terdaftar.</div>';
    }
}
?>

<form action="index.php?page=tambah_datapenduduk" method="post">
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Negara</label>
        <div class="col-md-6 col-sm-6 ">
            <input type="int" name="Kode_Negara" class="form-control" size="4" required>
        </div>
    </div>
    
    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Negara</label>
        <input type="text" name="Nama_Negara" class="form-control" required>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Populasi</label>
        <input type="text" name="Jumlah_Populasi" class="form-control" required>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Luas Wilayah</label>
        <input type="text" name="Luas_Wilayah" class="form-control" required>
    </div>
    <div class="item form-group">
        <div class="col-md-6 col-sm-6 offset-md-3">
            <input type="submit" name="submit" class="btn btn-primary" value="simpan">
        </div>
    </div>
</form>