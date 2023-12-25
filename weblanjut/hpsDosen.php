<?php
    require "fungsi.php";

    $npp  = decryptid($_GET['id']);
    
    $q = "DELETE FROM dosen WHERE npp='".$npp."'";

    mysqli_query($koneksi,$q);
   header("location:updateDosen.php");
?>