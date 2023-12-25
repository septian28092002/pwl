
<?php
include "fungsi.php"; // masukan konekasi DB
// ambil variable
$npp=$_GET['npp'];
$nama=$_GET['nama'];
$homebase=$_GET['homebase'];

//Proses query simpan
$simpan=mysqli_query($koneksi,"insert into dosen (npp,namadosen,homebase) values ('$npp','$nama','$homebase')");
if($simpan){
    echo "Data berhasil disimpan: <a href='addDsn.php'> + Tambah data. </a>";
}else{
    echo "Gagal simpan data!";
}
?>