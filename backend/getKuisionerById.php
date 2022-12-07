<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "SELECT * FROM kuisioner WHERE kuisioner_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);


$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$sql = "SELECT 
stok_tersedia.teripang_pasir AS St_P ,
stok_tersedia.gamat AS St_G,
stok_tersedia.polos AS St_PL,
stok_tersedia.kuasa AS St_K,
stok_tersedia.bola AS St_B,
stok_tersedia.satuan As St_Satuan,
produksi_terjual.teripang_pasir AS Sj_P ,
produksi_terjual.gamat AS Sj_G,
produksi_terjual.polos AS Sj_PL,
produksi_terjual.kuasa AS Sj_K,
produksi_terjual.bola AS Sj_B,
produksi_terjual.satuan As Sj_Satuan,
harga_jual.teripang_pasir AS Hj_P ,
harga_jual.gamat AS Hj_G,
harga_jual.polos AS Hj_PL,
harga_jual.kuasa AS Hj_K,
harga_jual.bola AS Hj_B,
total_nilai_produksi.teripang_pasir AS Tn_P ,
total_nilai_produksi.gamat AS Tn_G,
total_nilai_produksi.polos AS Tn_PL,
total_nilai_produksi.kuasa AS Tn_K,
total_nilai_produksi.bola AS Tn_B
FROM kuisioner
   INNER JOIN stok_tersedia
     ON stok_tersedia.kategori_id = kuisioner.basah_id
    INNER JOIN produksi_terjual
     ON produksi_terjual.kategori_id = kuisioner.basah_id
    INNER JOIN harga_jual
     ON harga_jual.kategori_id = kuisioner.basah_id
    INNER JOIN total_nilai_produksi
     ON total_nilai_produksi.kategori_id = kuisioner.basah_id
    INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.basah_id
 WHERE kuisioner.basah_id = '". $data[0]['basah_id'] ."'";

$getBasah = $db->mysqli->query($sql);

foreach ($getBasah as $row) {
    $data['basah'] = $row;
}

$sql = "SELECT 
stok_tersedia.teripang_pasir AS St_P ,
stok_tersedia.gamat AS St_G,
stok_tersedia.polos AS St_PL,
stok_tersedia.kuasa AS St_K,
stok_tersedia.bola AS St_B,
stok_tersedia.satuan As St_Satuan,
produksi_terjual.teripang_pasir AS Sj_P ,
produksi_terjual.gamat AS Sj_G,
produksi_terjual.polos AS Sj_PL,
produksi_terjual.kuasa AS Sj_K,
produksi_terjual.bola AS Sj_B,
produksi_terjual.satuan As Sj_Satuan,
harga_jual.teripang_pasir AS Hj_P ,
harga_jual.gamat AS Hj_G,
harga_jual.polos AS Hj_PL,
harga_jual.kuasa AS Hj_K,
harga_jual.bola AS Hj_B,
total_nilai_produksi.teripang_pasir AS Tn_P ,
total_nilai_produksi.gamat AS Tn_G,
total_nilai_produksi.polos AS Tn_PL,
total_nilai_produksi.kuasa AS Tn_K,
total_nilai_produksi.bola AS Tn_B
FROM kuisioner
   INNER JOIN stok_tersedia
     ON stok_tersedia.kategori_id = kuisioner.kering_id
    INNER JOIN produksi_terjual
     ON produksi_terjual.kategori_id = kuisioner.kering_id
    INNER JOIN harga_jual
     ON harga_jual.kategori_id = kuisioner.kering_id
    INNER JOIN total_nilai_produksi
     ON total_nilai_produksi.kategori_id = kuisioner.kering_id
    INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.kering_id
 WHERE kuisioner.kering_id = '". $data[0]['kering_id'] ."'";

$getKering = $db->mysqli->query($sql);

foreach ($getKering as $row) {
    $data['kering'] = $row;
}

$sql = "SELECT 
stok_tersedia.teripang_pasir AS St_P ,
stok_tersedia.gamat AS St_G,
stok_tersedia.polos AS St_PL,
stok_tersedia.kuasa AS St_K,
stok_tersedia.bola AS St_B,
stok_tersedia.satuan As St_Satuan,
produksi_terjual.teripang_pasir AS Sj_P ,
produksi_terjual.gamat AS Sj_G,
produksi_terjual.polos AS Sj_PL,
produksi_terjual.kuasa AS Sj_K,
produksi_terjual.bola AS Sj_B,
produksi_terjual.satuan As Sj_Satuan,
harga_jual.teripang_pasir AS Hj_P ,
harga_jual.gamat AS Hj_G,
harga_jual.polos AS Hj_PL,
harga_jual.kuasa AS Hj_K,
harga_jual.bola AS Hj_B,
total_nilai_produksi.teripang_pasir AS Tn_P ,
total_nilai_produksi.gamat AS Tn_G,
total_nilai_produksi.polos AS Tn_PL,
total_nilai_produksi.kuasa AS Tn_K,
total_nilai_produksi.bola AS Tn_B
FROM kuisioner
   INNER JOIN stok_tersedia
     ON stok_tersedia.kategori_id = kuisioner.benih_id
    INNER JOIN produksi_terjual
     ON produksi_terjual.kategori_id = kuisioner.benih_id
    INNER JOIN harga_jual
     ON harga_jual.kategori_id = kuisioner.benih_id
    INNER JOIN total_nilai_produksi
     ON total_nilai_produksi.kategori_id = kuisioner.benih_id
    INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.benih_id
 WHERE kuisioner.benih_id = '". $data[0]['benih_id'] ."'";

$getBenih = $db->mysqli->query($sql);

foreach ($getBenih as $row) {
    $data['benih'] = $row;
}

$sql = "SELECT 
stok_tersedia.teripang_pasir AS St_P ,
stok_tersedia.gamat AS St_G,
stok_tersedia.polos AS St_PL,
stok_tersedia.kuasa AS St_K,
stok_tersedia.bola AS St_B,
stok_tersedia.satuan As St_Satuan,
produksi_terjual.teripang_pasir AS Sj_P ,
produksi_terjual.gamat AS Sj_G,
produksi_terjual.polos AS Sj_PL,
produksi_terjual.kuasa AS Sj_K,
produksi_terjual.bola AS Sj_B,
produksi_terjual.satuan As Sj_Satuan,
harga_jual.teripang_pasir AS Hj_P ,
harga_jual.gamat AS Hj_G,
harga_jual.polos AS Hj_PL,
harga_jual.kuasa AS Hj_K,
harga_jual.bola AS Hj_B,
total_nilai_produksi.teripang_pasir AS Tn_P ,
total_nilai_produksi.gamat AS Tn_G,
total_nilai_produksi.polos AS Tn_PL,
total_nilai_produksi.kuasa AS Tn_K,
total_nilai_produksi.bola AS Tn_B
FROM kuisioner
   INNER JOIN stok_tersedia
     ON stok_tersedia.kategori_id = kuisioner.farmasi_id
    INNER JOIN produksi_terjual
     ON produksi_terjual.kategori_id = kuisioner.farmasi_id
    INNER JOIN harga_jual
     ON harga_jual.kategori_id = kuisioner.farmasi_id
    INNER JOIN total_nilai_produksi
     ON total_nilai_produksi.kategori_id = kuisioner.farmasi_id
    INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.farmasi_id
 WHERE kuisioner.farmasi_id = '". $data[0]['farmasi_id'] ."'";

$getFarmasi = $db->mysqli->query($sql);

foreach ($getFarmasi as $row) {
    $data['farmasi'] = $row;
}

$sql = "SELECT 
jenis_jual.keterangan
FROM kuisioner
   INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.basah_id
 WHERE kuisioner.basah_id = '" .  $data[0]['basah_id'] . "'";

$getKetBasah = $db->mysqli->query($sql);

foreach ($getKetBasah as $row) {
    $data['basahKeterangan'] = $row;
}

$sql = "SELECT 
jenis_jual.keterangan
FROM kuisioner
   INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.kering_id
 WHERE kuisioner.kering_id = '" .  $data[0]['kering_id'] . "'";

$getKetKering = $db->mysqli->query($sql);

foreach ($getKetKering as $row) {
    $data['keringKeterangan'] = $row;
}

$sql = "SELECT 
jenis_jual.keterangan
FROM kuisioner
   INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.benih_id
 WHERE kuisioner.benih_id = '" .  $data[0]['benih_id'] . "'";

$getKetBenih = $db->mysqli->query($sql);

foreach ($getKetBenih as $row) {
    $data['benihKeterangan'] = $row;
}

$sql = "SELECT 
jenis_jual.keterangan
FROM kuisioner
   INNER JOIN jenis_jual
     ON jenis_jual.kategori_id = kuisioner.farmasi_id
 WHERE kuisioner.farmasi_id = '" .  $data[0]['farmasi_id'] . "'";

$getKetFarmasi = $db->mysqli->query($sql);

foreach ($getKetFarmasi as $row) {
    $data['farmasiKeterangan'] = $row;
}


echo json_encode($data);
?>