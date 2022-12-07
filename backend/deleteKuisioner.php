<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

$jenis_jual = array('basah_id', 'kering_id', 'benih_id', 'farmasi_id');

$tables = array('stok_tersedia', 'produksi_terjual', 'harga_jual', 'total_nilai_produksi');

$sql = "SELECT * FROM kuisioner WHERE kuisioner_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);


$getData = array();
foreach ($result as $row) {
    $getData[] = $row;
}

$sql = "DELETE FROM kuisioner WHERE kuisioner_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);

foreach ($jenis_jual as $jenis) {
    $exploded = explode('_', $jenis);
    $keterangan = $exploded[0] . 'Keterangan';

    $sql = "DELETE FROM jenis_jual " .
    "WHERE kategori_id='" .  $getData[0][$jenis] . "'";
    
    $result = $db->mysqli->query($sql);
}

foreach ($tables as $tabel) {
    foreach ($jenis_jual as $jenis) {
        $exploded = explode('_', $jenis);
        $jenisJual = $exploded[0];

        $kategori = $getData[0][$jenis];

        $sql = "DELETE FROM ". $tabel ." ".
        "WHERE kategori_id='" . $kategori . "'";

        $result = $db->mysqli->query($sql);
    }
}


$obj = new stdClass();
if($result > 0) {
    $obj->status = "success";
} else {
    $obj->status = "fail";
}

echo json_encode($obj);
?>