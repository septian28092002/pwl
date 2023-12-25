<!DOCTYPE html>
<html>
	<head>
		<title>Sistem Informasi Akademik::Tambah Data Dosen</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/styleku.css">
		<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
		<script src="bootstrap4/js/bootstrap.js"></script>
	</head>
	<body>
		<?php
			require "head.html";
		?>
		<div class="utama">		
			<br><br><br>		
			<h3>TAMBAH DATA KULIAH TAWAR</h3>
			<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			</div>	
			<form method="POST" action="sv_addkultawar.php" enctype="multipart/form-data">
				<!-- <div class="form-group">
					<label for="idkultawar">idkultawar:</label>
					<input class="form-control" type="text" name="idkultawar" id="idkultawar" required>
				</div> -->
				<div class="form-group">
					<label for="idmatkul">idmatkul:</label>
					<input class="form-control" type="text" name="idmatkul" id="idmatkul">
				</div>
				<div class="form-group">
					<label for="npp">npp:</label>
					<input class="form-control" type="text" name="npp" id="npp">
				</div>
                <div class="form-group">
					<label for="klp">klp:</label>
					<input class="form-control" type="text" name="klp" id="klp">
				</div>
                <div class="form-group">
					<label for="hari">hari:</label>
					<input class="form-control" type="text" name="hari" id="hari">
				</div>
                <div class="form-group">
					<label for="jamkul">jamkul:</label>
					<input class="form-control" type="text" name="jamkul" id="jamkul">
				</div>
                <div class="form-group">
					<label for="ruang">ruang:</label>
					<input class="form-control" type="text" name="ruang" id="ruang">
				</div>
				<div>		
					<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
				</div>
			</form>
		</div>
	</body>
</html>