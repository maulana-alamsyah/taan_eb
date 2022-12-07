<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

$listFile = array('fotoKTP', 'fotoKK', 'fotoLokasi', 'fotoJenis');

$fotoKTP = 'KTP_' . random_int(100, 999) . date("is") . '.' . explode('.', $_FILES['fotoKTP']['name'])[count(explode('.', $_FILES['fotoKTP']['name'])) - 1];
$fotoKK = 'KK_' . random_int(100, 999) . date("is") . '.' . explode('.', $_FILES['fotoKK']['name'])[count(explode('.', $_FILES['fotoKK']['name'])) - 1];
$fotoLokasi = 'Lokasi_' . random_int(100, 999) . date("is") . '.' . explode('.', $_FILES['fotoLokasi']['name'])[count(explode('.', $_FILES['fotoLokasi']['name'])) - 1];
$fotoJenis = 'Jenis_' . random_int(100, 999) . date("is") . '.' . explode('.', $_FILES['fotoJenis']['name'])[count(explode('.', $_FILES['fotoJenis']['name'])) - 1];


$locationFotoKTP = "../upload/" . $fotoKTP;
$locationFotoKK = "../upload/" . $fotoKK;
$locationFotoLokasi = "../upload/" . $fotoLokasi;
$locationFotoJenis = "../upload/" . $fotoJenis;

$listFile = array('fotoKTP' => $locationFotoKTP, 'fotoKK' => $locationFotoKK, 'fotoLokasi' => $locationFotoLokasi, 'fotoJenis' => $locationFotoJenis);

foreach ($listFile as $key => $value) {
    if (move_uploaded_file($_FILES[$key]['tmp_name'], $value)) {
        echo 'Success';
    } else {
        echo 'Failure';
    }
}

$sql = "INSERT INTO profil_pembudidaya(nama_pembudidaya, nik, foto_ktp, foto_kk, foto_lokasi, foto_jenis_teripang, alamat, no_hp, lokasi_budidaya, titik_koordinat, luas_lahan, luas_lahan_terpakai, parameter_fisik, parameter_kimia, jenis_komoditas, metode_budidaya, punya_kartu_kusuka, dapat_bantuan, jenis_bantuan, sumber_bantuan, tahun_bantuan, kendala, solusi, tahun_mulai, pengeluaran, nama_pembeli, no_hp_pembeli) VALUES('" . $_POST['namaPembudidaya'] . "', '" . $_POST['nik'] . "', '" . $fotoKTP . "', '" . $fotoKK . "', '" . $fotoLokasi . "', '" . $fotoJenis . "', '" . $_POST['alamat'] . "', '" . $_POST['no_hp'] . "', '" . $_POST['lokasi'] . "', '" . $_POST['titikKoordinat'] . "', '" . $_POST['luasLahan'] . "', '" . $_POST['luasLahanTerpakai'] . "', '" . $_POST['parameterPerairanFisik'] . "', '" . $_POST['parameterPerairanKimia'] . "', '" . $_POST['jenisKomoditas'] . "', '" . $_POST['metodeBudidaya'] . "', '" . $_POST['punyaKartu'] . "', '" . $_POST['dapatBantuan'] . "', '" . $_POST['jenisBantuan'] . "', '" . $_POST['sumberBantuan'] . "', '" . $_POST['tahunBantuan'] . "', '" . $_POST['kendala'] . "', '" . $_POST['solusi'] . "', '" . $_POST['tahunMulai'] . "', '" . $_POST['pengeluaranUsaha'] . "', '" . $_POST['namaPembeli'] . "', '" . $_POST['noHPPembeli'] . "')";

$result = $db->mysqli->query($sql);

$obj = new stdClass();
if ($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
