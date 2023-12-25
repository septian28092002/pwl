<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik::Edit Data KulTawar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>

</head>
<body>
	<?php
    require "fungsi.php";
	require "head.html";
	$idkultawar=decryptid($_GET['id']);
	$sql="select * from kultawar where idkultawar='$idkultawar'";
	$qry=mysqli_query($koneksi,$sql);
	$row=mysqli_fetch_object($qry);
	?>
	<div class="utama">		
		<br><br><br>		
		<h3>EDIT DATA KulTawar</h3>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  		<a href="#" class="close" data-dismiss="alert" aria-label="close"></a>
		</div>	
		<form method="post" action="sv_editTawar.php" enctype="multipart/form-data">
            <div class="form-group">
				<label for="idkultawar">Id Kuliah Tawar:</label>
				<input class="form-control" type="text" name="idkultawar" id="idkultawar" 
                value="<?php echo $row->idkultawar?>"
                disable>
			<div class="form-group">
				<label for="idmatkul">Id Matkul:</label>
				<input class="form-control" type="text" name="idmatkul" id="idmatkul" 
                value="<?php echo $row->idmatkul?>">
			</div>
			<div class="form-group">
				<label for="npp">NPP:</label>
				<input class="form-control" type="text" name="npp" id="npp"
                value="<?php echo $row->npp?>">
                </div>
			<div class="form-group">
				<label for="klp">Kelompok:</label>
				<input class="form-control" type="text" name="klp" id="klp"
                value="<?php echo $row->klp?>">
                </div>
			<div class="form-group">
				<label for="hari">Hari:</label>
				<input class="form-control" type="text" name="hari" id="hari"
                value="<?php echo $row->hari?>">
                </div>
            <div class="form-group">
				<label for="jamkul">Jam Kuliah:</label>
				<input class="form-control" type="text" name="jamkul" id="jamkul"
                value="<?php echo $row->jamkul?>">
                </div>
            <div class="form-group">
				<label for="ruang">Ruang:</label>
				<input class="form-control" type="text" name="ruang" id="ruang"
                value="<?php echo $row->ruang?>">
                </div>
			<br>
			<div>		
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
	<!--
	<script>
		$(document).ready(function(){
			$('#butsave').on('click',function(){			
				$('#butsave').attr('disabled', 'disabled');
				var npp 	= $('#npp').val();
				var namadosen	= $('#namadosen').val();
				var homebase 	= $('#homebase').val();
				
				$.ajax({
					type	: "POST",
					url		: "sv_addDosen.php",
					data	: {
								npp:npp,
								namadosen:namadosen,
								homebase:homebase
							  },
					contentType	:"undefined",					
					success : function(dataResult){						
						alert('success');
						$("#butsave").removeAttr("disabled");
						$('#fupForm').find('input:text').val('');
						$("#success").show();
						$('#success').html(dataResult);	
					}	   
				});
			});
		});
	</script>
	-->	
</body>
</html>