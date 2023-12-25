<?php
    require "fungsi.php";

    $idkultawar  = decryptid($_GET['id']);
    
    $q = "DELETE FROM kultawar WHERE idkultawar='".$idkultawar."'";

    mysqli_query($koneksi,$q);
   header("location:updateTawar.php");
?>