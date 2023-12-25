
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

$q = "SELECT * FROM kultawar WHERE idkultawar='".$idkultawar."'";
$rs = mysqli_query($koneksi,$q);
if(mysqli_num_rows($rs) == 0)
{
   
    //membuat query,simpan data
	$sql="insert kultawar values('$idkultawar','$idmatkul','$npp','$klp','$hari','$jamkul','$ruang')";
	mysqli_query($koneksi,$sql);
	header("location:addTawar.php");
}
else
{
	echo "<script>
		alert('NPP yang diinput sudah ada')
		javascript:history.go(-1)
		</script>";
}
?>