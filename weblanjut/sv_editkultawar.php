<?php
//memanggil file pustaka fungsi
require "fungsi.php";

if(isset($_POST['idmatkul'])){
    $id = $_POST['idmatkul'];
    $npp =$_POST["npp"];
    $klp =$_POST["klp"];
    $hari =$_POST["hari"];
    $ruang =$_POST["ruang"];

$sqlkultawar = mysqli_query($koneksi,"SELECT * FROM kultawar WHERE idmatkul = '$id'");
$dataKultawar = mysqli_num_rows($sqlkultawar);

$sql = mysqli_query($koneksi, "UPDATE kultawar SET ruang = '$ruang', npp = '$npp', klp = '$klp', hari = '$hari' WHERE idmatkul = '$id'");
header("location:updateTawar.php");
} else {
    die('System Error');
}
?>