<?php
require "fungsi.php";
$msg_type = "nothing";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah checkbox diisi
    if (isset($_POST['delete'])) {
        // Loop melalui data yang dipilih
        foreach ($_POST['delete'] as $id) {
            $checkdb_nim   = mysqli_query($koneksi, "SELECT * FROM krs WHERE idKrs = '$id'");
            if (mysqli_num_rows($checkdb_nim) == 0) {
                $msg_type = "error";
                $msg_content = "Pilih setidaknya satu data untuk dihapus.";
            } else {
                $delete_user = mysqli_query($koneksi, "DELETE FROM krs WHERE idKrs = '$id'");
                if ($delete_user == TRUE) {
                    $msg_type = "success";
                    $msg_content = "KRS berhasil dihapus.";
                }
            }
            // Lakukan query DELETE untuk menghapus data
            // $sql = "DELETE FROM krs WHERE idKrs = " . $koneksi->real_escape_string($id);
            // $koneksi->query($sql);
        }
        $msg_type = "success";
        $msg_content = "KRS berhasil dihapus.";
    } else if ($_POST['delete'] == NULL) {
        $msg_type = "error";
        $msg_content = "Pilih setidaknya satu data untuk dihapus.";
    }
}
// if (isset($_POST['delete'])) {
// $post_id       = $koneksi->real_escape_string($_POST['id']);
// $checkdb_nim   = mysqli_query($koneksi, "SELECT * FROM krs WHERE idKrs = '$post_id'");
// if (mysqli_num_rows($checkdb_nim) == 0) {
//     $msg_type = "error";
//     $msg_content = "Data tidak ditemukan.";
// } else {
//     $delete_user = mysqli_query($koneksi, "DELETE FROM krs WHERE idKrs = '$post_id'");
//     if ($delete_user == TRUE) {
//         $msg_type = "success";
//         $msg_content = "KRS berhasil dihapus.";
//     }
// }
// }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Daftar Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <!-- Use fontawesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script>
        /*function cetak(hal) {
		  var xhttp;
		  var dtcetak;	
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  dtcetak= this.responseText;
			}
		  };
		  xhttp.open("GET", "ajaxUpdateMhs.php?hal="+hal, true);
		  xhttp.send();
		}*/
    </script>
</head>

<body>
    <?php

    //memanggil file berisi fungsi2 yang sering dipakai

    require "head.html";
    $progdi = substr($_GET['nim'], 0, 3);
    $rs = search('matkul', "substr(idmatkul,1,3)='" . $progdi . "'");
    ?>
    <div class="utama">
        <h3>Input KRS <?php echo $_GET["nim"] ?></h3>
        <form action="sv_krs.php" method="post">
            <input type="hidden" name="nim" value="<?php echo $_GET['nim'] ?>">
            <div class="form-group">
                <label for="matakul">Mata Kuliah</label>
                <select name="matakul" id="matkul">
                    <option selected disable>- Pilih Mata Kuliah -</option>
                    <?php
                    while ($data = mysqli_fetch_object($rs)) {
                    ?>
                        <option value="<?php echo $data->id ?>"><?php echo $data->namamatkul ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div id="tabelmatkul"></div>
        </form>
        <?php
        if ($msg_type == "success") {
        ?><br />
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php echo $msg_content; ?>
            </div>
        <?php
        } else if ($msg_type == "error") {
        ?><br />
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php echo $msg_content; ?>
            </div>
        <?php
        }
        ?>
        <br />
        <form class="form-horizontal" role="form" method="POST">
            <div class="">
                <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i> Hapus Yang Dipilih</button>
            </div>
            <br />
            <table class=" table table-hover table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Jam Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $i = 1;
                $totalSks = 0;
                $nim = $_GET["nim"];
                // SELECT `idKrs`, `thAkd`, `nim`, `idMatkul`, `nilai`, `nppDos`, `hari`, `waktu` FROM `krs` WHERE 1
                $query = mysqli_query($koneksi, "select * from krs where nim='$nim'");
                $cek = mysqli_num_rows($query);
                // $rs = search('krs', 'nim=' . $_GET["nim"]);
                // $cek = mysqli_num_rows($rs);
                if ($cek > 0) {
                    while ($data = mysqli_fetch_object($query)) {
                        $matkul = mysqli_query($koneksi, "select * from matkul where idMatkul='$data->idMatkul'");
                        $datamatkul = mysqli_fetch_object($matkul);
                        $dosen = mysqli_query($koneksi, "select * from dosen where npp='$data->nppDos'");
                        $datadosen = mysqli_fetch_object($dosen);
                        $totalSks += $datamatkul->sks;
                ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $datamatkul->idmatkul ?></td>
                            <td><?php echo $datamatkul->namamatkul ?></td>
                            <td><?php echo $datadosen->namadosen ?></td>
                            <td><?php echo $data->hari, " ", $data->waktu ?></td>
                            <td><?php echo $datamatkul->sks ?></td>
                            <td><input type="radio" name="delete[]" value="<?php echo $data->idKrs; ?>"></td>
                        </tr>

                    <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan='7'>
                            <center>DATA TIDAK DITEMUKAN</center>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>

            Total SKS: <?php echo $totalSks; ?>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#matkul").change(function() {
                var mk = $(this).val()
                $.post('ajaxKrs.php', {
                    mk: mk
                }, function(data) {
                    $("#tabelmatkul").html(data)
                })
            })
        })
    </script>

</body>

</html>