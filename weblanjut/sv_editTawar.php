<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idkultawar=$_POST["idkultawar"];
$idmatkul=$_POST["idmatkul"];
$npp=$_POST["npp"];
$klp=$_POST["klp"];
$hari=$_POST["hari"];
$jamkul=$_POST["jamkul"];
$ruang=$_POST["ruang"];
$uploadOk=1;

//membuat query
$sql="update kultawar set idkultawar='$idkultawar',
                     idmatkul='$idmatkul',
					 npp='$npp',
                     klp='$klp',
                     hari='$hari',
                     jamkul='$jamkul',
                     ruang='$ruang'
					 where idkultawar='$idkultawar'";
mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
header("location:updateTawar.php");
?>