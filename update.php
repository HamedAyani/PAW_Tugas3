<?php
include('koneksi.php');
?>
<div class="container" style="margin-top: 20px;">
    <h2>Update Data</h2>
    
    <hr>

    <?php
    
    if(isset($_GET['Kode_Negara'])){
        $Kode_Negara = $_GET['Kode_Negara'];
        
        $select = mysqli_query($koneksi, "SELECT * FROM tbl_114 WHERE Kode_Negara='$Kode_Negara'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($select) == 0){
            echo '<div class="alert alert-warning">Data tidak ditemukan.</div>';
            exit();
        }else{
            $data = mysqli_fetch_assoc($select);
        }
    }
    ?>

    <?php
        if(isset($_POST['submit'])){
            // $Kode_Negara = $_POST['Kode_Negara'];
            $Nama_Negara = $_POST['Nama_Negara'];
            $Jumlah_Populasi = $_POST['Jumlah_Populasi'];
            $Luas_Wilayah = $_POST['Luas_Wilayah'];

            $sql = mysqli_query($koneksi, "UPDATE tbl_114 SET Nama_Negara='$Nama_Negara', Jumlah_Populasi='$Jumlah_Populasi', Luas_Wilayah='$Luas_Wilayah' WHERE Kode_Negara='$Kode_Negara'") or die(mysqli_error($koneksi));

            if($sql){
                echo '<script>alert("Berhasil mengubah data."); document.location="index.php?page=tampil_datapenduduk";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

    <form action="update.php?page=edit_datapenduduk&Kode_Negara=<?php echo $Kode_Negara; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Kode Negara</label>
            <div class="col-md-6 col-sm-6">
                <input type="int" name="Kode_Negara" class="form-control" size="4" value="<?php echo $data['Kode_Negara']; ?>" readonly required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Negara</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Nama_Negara" class="form-control" value="<?php echo $data['Nama_Negara']; ?>" required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Populasi</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Jumlah_Populasi" class="form-control" value="<?php echo $data['Jumlah_Populasi']; ?>" required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Luas Wilayah</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="Luas_Wilayah" class="form-control" value="<?php echo $data['Luas_Wilayah']; ?>">
            </div>
        </div>

        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="simpan">
                <a href="index.php?page=tampil_datapenduduk" class="btn btn-warning">kembali</a>
            </div>
        </div>
    </form>
</div>