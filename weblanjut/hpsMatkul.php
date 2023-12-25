<?php
    require "fungsi.php";

    $idmatkul  = decryptid($_GET['id']);
    
    $q = "DELETE FROM matkul WHERE idmatkul='".$idmatkul."'";

    mysqli_query($koneksi,$q);
   header("location:updateMatkul.php");
?>