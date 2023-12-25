
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$npp=$_POST["npp"];
$namadosen=$_POST["namadosen"];
$homebase=$_POST["homebase"];
$uploadOk=1;

$q = "SELECT * FROM dosen WHERE npp='".$npp."'";
$rs = mysqli_query($koneksi,$q);
if(mysqli_num_rows($rs) == 0)
{
   
    //membuat query,simpan data
	$sql="insert dosen values('$npp','$namadosen','$homebase')";
	mysqli_query($koneksi,$sql);
	header("location:addDosen.php");
}
else
{
	echo "<script>
		alert('NPP yang diinput sudah ada')
		javascript:history.go(-1)
		</script>";
}
?>