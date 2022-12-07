<?php
include("../config/koneksi.php");

$sql = "SELECT nama_pembudidaya, nik, foto_ktp, foto_kk, foto_lokasi, foto_jenis_teripang, alamat, no_hp, lokasi_budidaya, titik_koordinat, luas_lahan, luas_lahan_terpakai, parameter_fisik, parameter_kimia, jenis_komoditas, metode_budidaya, punya_kartu_kusuka, dapat_bantuan, jenis_bantuan, sumber_bantuan, tahun_bantuan, kendala, solusi, pengeluaran, nama_pembeli, no_hp_pembeli FROM profil_pembudidaya WHERE profil_pembudidaya_id='" . $_GET['id'] . "'";

$result = $db->mysqli->query($sql);


$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$nama_pembudidaya = $data[0]['nama_pembudidaya'];

$column = array('Nama Pembudidaya/Kelompok', 'NIK', 'Foto KTP', 'Foto KK', 'Foto Lokasi', 'Foto Jenis Teripang', 'Alamat', 'No HP', 'Lokasi Budidaya', 'Titik Koordinat', 'Luas Lahan Budidaya', 'Luas Lahan Budidaya Yang Digunakan', 'Fisik', 'Kimia', 'Jenis Komoditas Teripang', 'Metode Budidaya', 'Punya Kartu Kusuka', 'Pernah Dapat Bantuan', 'Jika Ya, Jenis Bantuan', 'Sumber Bantuan', 'Tahun Bantuan', ' Kendala Yang Dihadapi', 'Solusi', 'Pengeluaran Usaha Budidaya Teripang', 'Nama Pembeli', 'No Hp Pembeli');
$index = 0;
$dataProfil = [];
foreach ($data[0] as  $row) {
    $dataProfil[$column[$index]] = $row;
    $index++;
}

$body = '';
$no = 1;
foreach ($dataProfil as $key => $profil) {
    
    if ($no == 13) {
        $body .= '
        <tr>
        <td>' . $no . '.</td>
        <td colspan="2">Parameter Kualitas Perairan</td>
        </tr>
        ';
        $no++;
    }
    if ($key == 'Fisik' || $key == 'Kimia' || $key == 'Sumber Bantuan' || $key == 'Tahun Bantuan') {
        $body .= '
    <tr>
    <td colspan="2" style="text-align: center;">' . $key . '</td>
    <td>:</td>
    <td>' . $profil . '</td>
    </tr>
    ';
    } else if ($key == 'Punya Kartu Kusuka' || $key == 'Pernah Dapat Bantuan') {
        $body .= '
    <tr>
    <td>' . $no . '.</td>
    <td>' . $key . '</td>
    <td>:</td>
    <td>
    <input class="inputan" type="checkbox" ' . (($profil == 'Ya') ? 'checked' : '') . '><label> Ya</label>
    <input class="inputan" type="checkbox" ' . (($profil == 'Tidak') ? 'checked' : '') . '><label> Tidak</label>
    </td>
    </tr>
    ';
        $no++;
    }else if ($key == 'Foto KTP' || $key == 'Foto KK' || $key == 'Foto Lokasi' || $key == 'Foto Jenis Teripang') {
        $path = './../upload/' . $profil;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $body .= '
                <tr>
                <td>' . $no . '.</td>
                <td>' . $key . '</td>
                <td>:</td>
                <td><img src="' . $base64 . '" height="100" width="130"></td>
                </tr>';
                $no++;
    } else {
        $body .= '
    <tr>
    <td>' . $no . '.</td>
    <td>' . $key . '</td>
    <td>:</td>
    <td>' . $profil . '</td>
    </tr>
    ';
        $no++;
    }
}



$html =  '<!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
        </head>
        <style>
        * { margin: 0; padding: 0; }
        h2 {
            margin: 10px auto;
        }
        table, th, td {
            border: 0;
            border-collapse: collapse;
            text-align: left;
        }
        table {
            margin: 15px auto;
        }
        input[type=checkbox] {
            font-size: 15px;
        }
        td {
            padding: 3px 5px;
        }
        div {
            text-align: center;
        }
        </style>
        <body>
            <div>
                <h2>Profil Pembudidaya ' . $nama_pembudidaya . '</h2>
                <table>' . $body;



$filename = 'Profil_' . $nama_pembudidaya . '.pdf';


require 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(array('enable_remote' => true));

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename, array("Attachment" => false));
