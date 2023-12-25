<?php
require "fungsi.php";
$nim = $_POST['nim'];
$pilih = explode("-", $_POST['pilih']); //1-3, 10-3

//"A-123" explode("-","A-123-111") --> array(0 => "A", 1 => 123, 2 =>111)
//"A.123" explode("-","A-123.111") --> array(0 => "A", 1 => 123, 2 =>111)
$idmatkul = $pilih[0];
$npp = $pilih[1];
$hari = $pilih[2];
$jamkul = $pilih[3];
$sql = "INSERT INTO krs (nim, idMatkul, nppDos, hari, waktu) VALUES ('" . $nim . "','" . $idmatkul . "','" . $npp . "','" . $hari . "','" . $jamkul . "')";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header('Location: inputKRS.php?nim=' . $nim);
