
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=$_POST["idmatkul"];
$namamatkul=$_POST["namamatkul"];
$sks=$_POST["sks"];
$jns=$_POST["jns"];
$smt=$_POST["smt"];
$uploadOk=1;

$q = "SELECT * FROM matkul WHERE idmatkul='".$idmatkul."'";
$rs = mysqli_query($koneksi,$q);
if(mysqli_num_rows($rs) == 0)
{
   
    //membuat query,simpan data
	$sql="insert matkul values('$idmatkul','$namamatkul','$sks','$jns','$smt')";
	mysqli_query($koneksi,$sql);
	header("location:addMatkul.php");
}
else
{
	echo "<script>
		alert('NPP yang diinput sudah ada')
		javascript:history.go(-1)
		</script>";
}
?>