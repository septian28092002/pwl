<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penawaran Mata Kuliah</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
	<!-- Use fontawesome 5-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <div class="utama">
    <h2 class="text-center">Daftar Penawaran Mata Kuliah</h2>
        <a class="btn btn-primary" href="addTawar.php">Tambah Data</a>
    <span class="float-right">
		<form action="" method="post" class="form-inline">
			<button class="btn btn-success" type="submit">Cari</button>
			<input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data KulTawar..." autofocus autocomplete="off">
		</form>
	</span>
    <br><br>
    <?php
    require "fungsi.php";
    require "head.html";

    /* cetak data */
    if (isset($_POST['cari'])){
        $cari=$_POST['cari'];
        $rs=search('kultawar',"idkultawar like '%$cari%' or 
                              idmatkul like '%$cari%' or
                              npp like '%$cari%' or
                              klp like '%$cari%' or
                              hari like '%$cari%' or
                              jamkul like '%$cari%' or
                              ruang like '%$cari%'");
    }else{
        $sql="select * from matkul a JOIN kultawar b ON (a.id = b.idmatkul) JOIN dosen c ON (c.npp=b.npp)";
    }

    $rs=mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
    if(mysqli_num_rows($rs) == 0)
    {
        echo "data masih kosong";
    }
    else
    {
    ?>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No.</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Jadwal Hari</th>
            <th>Jadwal Jam</th>
            <th>Aksi</th>
        </tr>
    <?php
        $i = 1;
        while($result = mysqli_fetch_object($rs))
        {
    ?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $result->namamatkul?></td>
            <td><?php echo $result->namadosen?></td>
            <td><?php echo $result->hari?></td>
            <td><?php echo $result->jamkul?></td>
            <td>
                <a class="btn btn-primary btn-sm" href="editKulTawar.php?id=<?php echo 
                encryptid($result->idkultawar)?>">Edit</a>
                <a class="btn btn-danger btn-sm" href="hpsKulTawar.php?id=<?php echo 
                encryptid($result->idkultawar)?>" onclick="return confirm ('Yakin dihapus?')">Delete</a></td>
        </tr>
    <?php
            $i++;
        }
    }
        ?>
</body>
</html>