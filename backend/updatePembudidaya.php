<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);


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

$nameFile = array('fotoKTP' => $fotoKTP, 'fotoKK' => $fotoKK, 'fotoLokasi' => $fotoLokasi, 'fotoJenis' => $fotoJenis);

$column = array('foto_ktp', 'foto_kk', 'foto_lokasi', 'foto_jenis_teripang');


foreach ($listFile as $key => $value) {
    if ($_FILES[$key]['tmp_name']) {
        $i = '';
        foreach ($column as $i => $col) {
            $word = strtolower(substr($key, 4, 2));
            $hasil = stripos($col, $word);
            if ($hasil) {
                $index = $i;
            }
        }
        if (move_uploaded_file($_FILES[$key]['tmp_name'], $value)) {
            $fotoSebelum = "SELECT " . $column[$index] . " FROM profil_pembudidaya " .
                "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
            $result = $db->mysqli->query($fotoSebelum);
            foreach ($result as $foto) {
                unlink('../upload/' . $foto[$column[$index]]);
            }
            $sql = "UPDATE profil_pembudidaya SET " .
                "  " . $column[$index] . "='" . $nameFile[$key] . "'" .
                "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
            $result = $db->mysqli->query($sql);
        } else {
            echo 'Failure';
        }
    }
}

$namaSebelum = "SELECT nama_pembudidaya FROM profil_pembudidaya " .
    "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
$result = $db->mysqli->query($namaSebelum);

foreach ($result as $sebelum) {
    if ($sebelum['nama_pembudidaya'] !== $_POST['namaPembudidaya']) {
        $getIdKuisioner = "SELECT kuisioner_id FROM kuisioner " .
            "WHERE nama_pembudidaya='" . $sebelum['nama_pembudidaya'] . "'";
        $result1 = $db->mysqli->query($getIdKuisioner);
        foreach ($result1 as $rows) {
            $updateKuisioner = "UPDATE kuisioner SET " .
                "nama_pembudidaya='" . $_POST['namaPembudidaya'] . "'" .
                "WHERE kuisioner_id='" . $rows['kuisioner_id'] . "'";
            $result = $db->mysqli->query($updateKuisioner);
        }
        $sql = "UPDATE profil_pembudidaya SET " .
            "  nama_pembudidaya='" . $_POST['namaPembudidaya'] . "'" .
            "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
        $result = $db->mysqli->query($sql);
    }
}

$bantuanSebelum = "SELECT dapat_bantuan FROM profil_pembudidaya " .
    "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
$result = $db->mysqli->query($bantuanSebelum);

foreach ($result as $sebelum) {
    if ($sebelum['dapat_bantuan'] == 'Ya' && $_POST['dapatBantuan'] == 'Tidak') {
        $sql = "UPDATE profil_pembudidaya SET " .
            "  dapat_bantuan='" . $_POST['dapatBantuan'] . "', " .
            "  sumber_bantuan='', " .
            "  jenis_bantuan='', " .
            "  tahun_bantuan='' " .
            "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
        $result = $db->mysqli->query($sql);
    } else if ($_POST['dapatBantuan'] == 'Ya') {
        $sql = "UPDATE profil_pembudidaya SET " .
            "  dapat_bantuan='" . $_POST['dapatBantuan'] . "', " .
            "  sumber_bantuan='" . $_POST['sumberBantuan'] . "', " .
            "  jenis_bantuan='" . $_POST['jenisBantuan'] . "', " .
            "  tahun_bantuan='" . $_POST['tahunBantuan'] . "' " .
            "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
        $result = $db->mysqli->query($sql);
    } else if ($_POST['dapatBantuan'] == 'Tidak') {
        $sql = "UPDATE profil_pembudidaya SET " .
            "  dapat_bantuan='" . $_POST['dapatBantuan'] . "', " .
            "  sumber_bantuan='', " .
            "  jenis_bantuan='', " .
            "  tahun_bantuan='' " .
            "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";
        $result = $db->mysqli->query($sql);
    }
}

var_dump($_POST);

$sql = "UPDATE profil_pembudidaya SET " .
    "nik='" . $_POST['nik'] . "', " .
    "alamat='" . $_POST['alamat'] . "', " .
    "no_hp='" . $_POST['no_hp'] . "', " .
    "lokasi_budidaya='" . $_POST['lokasi'] . "', " .
    "titik_koordinat='" . $_POST['titikKoordinat'] . "', " .
    "luas_lahan='" . $_POST['luasLahan'] . "', " .
    "luas_lahan_terpakai='" . $_POST['luasLahanTerpakai'] . "', " .
    "parameter_fisik='" . $_POST['parameterPerairanFisik'] . "', " .
    "parameter_kimia='" . $_POST['parameterPerairanKimia'] . "', " .
    "jenis_komoditas='" . $_POST['jenisKomoditas'] . "', " .
    "metode_budidaya='" . $_POST['metodeBudidaya'] . "', " .
    "punya_kartu_kusuka='" . $_POST['punyaKartu'] . "', " .
    "kendala='" . $_POST['kendala'] . "', " .
    "solusi='" . $_POST['solusi'] . "', " .
    "tahun_mulai='" . $_POST['tahunMulai'] . "', " .
    "pengeluaran='" . $_POST['pengeluaranUsaha'] . "', " .
    "nama_pembeli='" . $_POST['namaPembeli'] . "', " .
    "no_hp_pembeli='" . $_POST['noHPPembeli'] . "' " .
    "WHERE profil_pembudidaya_id='" . $_POST['idPembudidaya'] . "'";

$result = $db->mysqli->query($sql);


$obj = new stdClass();
if ($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
