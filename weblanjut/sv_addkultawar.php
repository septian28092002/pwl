<?php
//memanggil file pustaka fungsi
require "fungsi.php";

if(isset($_POST['idmatkul'])){
    // $idkultawar=$_POST["idkultawar"];
    $idmatkul=$_POST["idmatkul"];
    if (mysqli_query($koneksi, "SELECT * FROM kultawar where idmatkul = $idmatkul") > 0) {
        die('ID MATKUL SUDAH ADA');
    } else {
        $npp =$_POST["npp"];
        $klp =$_POST["klp"];
        $hari =$_POST["hari"];
        $jamkul =$_POST["jamkul"];
        $ruang =$_POST["ruang"];

        $sql = mysqli_query($koneksi, "INSERT INTO kultawar VALUES ('','$idmatkul','$npp','$klp','$hari','$jamkul','$ruang')");
        if($sql == true){
            header("location:updateTawar.php");
        } else {
            die('System Error 1');
        }
    }
} else {
    die('System Error');
}
?>