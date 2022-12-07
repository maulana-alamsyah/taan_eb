<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);
$random = random_int(1000, 9999) . date("is");
$basah_id = 'basah_' . $random;
$kering_id = 'kering_' . $random;
$benih_id = 'benih_' . $random;
$farmasi_id = 'farmasi_' . $random;

$jenis_jual = array($basah_id, $kering_id, $benih_id, $farmasi_id);

$tables = array('stok_tersedia', 'produksi_terjual', 'harga_jual', 'total_nilai_produksi');



$sql = "INSERT INTO kuisioner(nama_petugas, tanggal, lokasi, nama_pembudidaya, triwulan, basah_id, kering_id, benih_id, farmasi_id) VALUES('" .
    $data->nama_petugas . "','" . $data->tanggal . "','" . $data->lokasi . "','" . $data->nama_pembudidaya . "','" . $data->triwulan . "','" . $basah_id . "','" . $kering_id . "','" . $benih_id . "','" . $farmasi_id . "')";
$result = $db->mysqli->query($sql);

foreach ($jenis_jual as $jenis) {
    $exploded = explode('_', $jenis);
    $keterangan = $exploded[0] . 'Keterangan';
    if ($data->$keterangan == 'undefined') {
        $data->$keterangan = '';
    }

    $sql = "INSERT INTO jenis_jual(kategori_id, keterangan) VALUES('" .
        $jenis . "','" .$data->$keterangan . "')";
    
    $result = $db->mysqli->query($sql);
}

foreach ($tables as $tabel) {
    foreach ($jenis_jual as $jenis) {
        $exploded = explode('_', $jenis);
        $jenisJual = $exploded[0];

        if ($jenisJual == 'basah') {
            $kategori = $basah_id;
        }else if($jenisJual == 'kering'){
            $kategori = $kering_id;
        }else if($jenisJual == 'benih'){
            $kategori = $benih_id;
        }else if($jenisJual == 'farmasi'){
            $kategori = $farmasi_id;
        }

        if ($tabel == 'stok_tersedia') {
            $jenisTeripang = array('P', 'G', 'PL', 'K', 'B');
            $dataTeripang = ['', '', '', '', ''];
            $index = 0;
            foreach ($jenisTeripang as $jenisT) {
                $tmp = '';
                $tmp = $jenisJual . 'St' . $jenisT;
                $dataTeripang[$index] = $data->$tmp;
                $index++;
            }

            $satuan = $jenisJual . 'St' . 'Satuan';

            $sql = "INSERT INTO ". $tabel ."(kategori_id, teripang_pasir, gamat, polos, kuasa, bola, satuan) VALUES('" . $kategori . "','" . $dataTeripang[0] . "','" . $dataTeripang[1] . "','" . $dataTeripang[2] . "','" . $dataTeripang[3] . "','" . $dataTeripang[4]. "','" . $data->$satuan . "')";

            $result = $db->mysqli->query($sql);

        }else if ($tabel == 'produksi_terjual') {
            $jenisTeripang = array('P', 'G', 'PL', 'K', 'B');
            $dataTeripang = ['', '', '', '', ''];
            $index = 0;
            foreach ($jenisTeripang as $jenisT) {
                $tmp = '';
                $tmp = $jenisJual . 'Sj' . $jenisT;
                $dataTeripang[$index] = $data->$tmp;
                $index++;
            }

            $satuan = $jenisJual  . 'Sj' . 'Satuan';

            $sql = "INSERT INTO ". $tabel ."(kategori_id, teripang_pasir, gamat, polos, kuasa, bola, satuan) VALUES('" . $kategori . "','" . $dataTeripang[0] . "','" . $dataTeripang[1] . "','" . $dataTeripang[2] . "','" . $dataTeripang[3] . "','" . $dataTeripang[4]. "','" . $data->$satuan . "')";

            $result = $db->mysqli->query($sql);

        }else if ($tabel == 'harga_jual') {
            $jenisTeripang = array('P', 'G', 'PL', 'K', 'B');
            $dataTeripang = ['', '', '', '', ''];
            $index = 0;
            foreach ($jenisTeripang as $jenisT) {
                $tmp = '';
                $tmp = $jenisJual . 'Hj' . $jenisT;
                $dataTeripang[$index] = $data->$tmp;
                $index++;
            }

            $sql = "INSERT INTO ". $tabel ."(kategori_id, teripang_pasir, gamat, polos, kuasa, bola) VALUES('" . $kategori . "','" . $dataTeripang[0] . "','" . $dataTeripang[1] . "','" . $dataTeripang[2] . "','" . $dataTeripang[3] . "','" . $dataTeripang[4]. "')";

            $result = $db->mysqli->query($sql);

        }else if ($tabel == 'total_nilai_produksi') {
            $jenisTeripang = array('P', 'G', 'PL', 'K', 'B');
            $dataTeripang = ['', '', '', '', ''];
            $index = 0;
            foreach ($jenisTeripang as $jenisT) {
                $tmp = '';
                $tmp = $jenisJual . 'Tn' . $jenisT;
                $dataTeripang[$index] = $data->$tmp;
                $index++;
            }

            $sql = "INSERT INTO ". $tabel ."(kategori_id, teripang_pasir, gamat, polos, kuasa, bola) VALUES('" . $kategori . "','" . $dataTeripang[0] . "','" . $dataTeripang[1] . "','" . $dataTeripang[2] . "','" . $dataTeripang[3] . "','" . $dataTeripang[4]. "')";

            $result = $db->mysqli->query($sql);

        }
    }
}


$obj = new stdClass();
if($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>