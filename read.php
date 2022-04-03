
<?php
include('koneksi.php');
?>

<div class="container" style="margin-top: 20px;"> 
    <center><font size="6">Data Populasi Negara</center>
    <hr>
    <a href="index.php?page=tambah_datapenduduk"><button class="btn btn-dark right">Tambah Data</button></a>
    <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Negara</th>
                    <th>Nama Negara</th>
                    <th>Jumlah Populasi</th>
                    <th>Luas Wilayah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_114 ORDER BY Jumlah_Populasi desc") or die(mysqli_error($koneksi));
                    
                    if(mysqli_num_rows($sql)>0){
                    $no=1;
                    while($data = mysqli_fetch_assoc($sql)){
                        echo '
                        <tr>
                            <td>'.$no.'</td> 
                            <td>'.$data['Kode_Negara'].'</td>
                            <td>'.$data['Nama_Negara'].'</td>
                            <td>'.$data['Jumlah_Populasi'].'</td>
                            <td>'.$data['Luas_Wilayah'].'</td>
                            <td>
                                <a href="index.php?page=edit_datapenduduk&Kode_Negara='.$data['Kode_Negara'].'" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="delete.php?Kode_Negara='.$data['Kode_Negara'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin?\')">Hapus</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
                    }else{
                        echo '
                        <tr>
                            <td colspan="6">Tidak ada data!</td>
                        </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>