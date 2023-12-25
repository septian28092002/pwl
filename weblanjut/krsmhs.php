<?php
    require "fungsi.php";
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM krs b JOIN kultawar c ON (b.idKrs= c.idMatkul) JOIN matkul d ON (c.idMatkul = d.id)
    WHERE b.nim='".$nim."'";

    //untuk ambil data mahasiswa
    $mhs = search('mhs', "nim= '".$nim."'");
    $rsmhs = mysqli_fetch_object($mhs);

    $rs = mysqli_query($koneksi, $sql) or die(mysqli_error());
    
    $html = '<h3>KRS Mahasiswa</h3>';
    $html .= '<p>NIM: '.$rsmhs->nim;
    $html .= '<p>Nama Mahasiswa: '.$rsmhs->nama;
    $html .= '<table border=1 cellspacing=0 cellpadding=10>
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Jadwal</th>
                <th>Dosen Pengampu</th>
            </tr>';
    $i = 1;
    $totalsks = 0;
    while($data = mysqli_fetch_object($rs))
    {
        $totalsks += $data->sks;
        $html .= '
            <tr>
                <td>'.$i.'</td>
                <td>'.$data->idmatkul.'</td>
                <td>'.$data->namamatkul.'</td>
                <td>'.$data->sks.'</td>
                <td>'.$data->id_kultawar.'</td>
                <td>'.$data->namadosen.'</td>
            </tr>';
        $i++;   
    }
    $html .= '
    <tr>
        <td colspan=3>Total SKS</td>
        <td>'.$totalsks.'</td>
        <td colspan=2></td>
    </tr>';
    $html .= '</table>';

    //php 8 ke atas
    generatepdf(html:$html,filename:'krs_mhs_'.$nim);
    //php 8 ke bawah
    //generatepdf('A4','Portrait',$html,'krs_mhs_'.$nim);
