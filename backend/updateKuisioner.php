<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);


$jenis_jual = array('basah_id', 'kering_id', 'benih_id', 'farmasi_id');

$tables = array('stok_tersedia', 'produksi_terjual', 'harga_jual', 'total_nilai_produksi');

$sql = "UPDATE kuisioner SET " .
       "  nama_petugas='" . $data->nama_petugas . "'," .
       "  tanggal='" . $data->tanggal . "'," .
       "  lokasi='" . $data->lokasi . "'," .
       "  nama_pembudidaya='" . $data->nama_pembudidaya . "'," .
       "  triwulan='" . $data->triwulan . "' " .
       "WHERE kuisioner_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);

$sql = "SELECT * FROM kuisioner WHERE kuisioner_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);


$getData = array();
foreach ($result as $row) {
    $getData[] = $row;
}


foreach ($jenis_jual as $jenis) {
    $exploded = explode('_', $jenis);
    $keterangan = $exploded[0] . 'Keterangan';
    if ($data->$keterangan == 'undefined') {
        $data->$keterangan = '';
    }

    $sql = "UPDATE jenis_jual SET " .
    " keterangan='".$data->$keterangan."' " .
    "WHERE kategori_id='" .  $getData[0][$jenis] . "'";
    
    $result = $db->mysqli->query($sql);
}

foreach ($tables as $tabel) {
    foreach ($jenis_jual as $jenis) {
        $exploded = explode('_', $jenis);
        $jenisJual = $exploded[0];

        $kategori = $getData[0][$jenis];

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

            $sql = "UPDATE ". $tabel ." SET ".
            "teripang_pasir='".$dataTeripang[0]."', ".
            "gamat='".$dataTeripang[1]."', ". 
            "polos='".$dataTeripang[2]."', ".
            "kuasa='".$dataTeripang[3]."', ". 
            "bola='".$dataTeripang[4]."', ". 
            "satuan='".$data->$satuan."' ". 
            "WHERE kategori_id='" . $kategori . "'";

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

            $satuan = $jenisJual . 'Sj' . 'Satuan';

            $sql = "UPDATE ". $tabel ." SET ".
            "teripang_pasir='".$dataTeripang[0]."', ".
            "gamat='".$dataTeripang[1]."', ". 
            "polos='".$dataTeripang[2]."', ".
            "kuasa='".$dataTeripang[3]."', ". 
            "bola='".$dataTeripang[4]."', ". 
            "satuan='".$data->$satuan."' ". 
            "WHERE kategori_id='" . $kategori . "'";

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

            $sql = "UPDATE ". $tabel ." SET ".
            "teripang_pasir='".$dataTeripang[0]."', ".
            "gamat='".$dataTeripang[1]."', ". 
            "polos='".$dataTeripang[2]."', ".
            "kuasa='".$dataTeripang[3]."', ". 
            "bola='".$dataTeripang[4]."' ". 
            "WHERE kategori_id='" . $kategori . "'";

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

            $sql = "UPDATE ". $tabel ." SET ".
            "teripang_pasir='".$dataTeripang[0]."', ".
            "gamat='".$dataTeripang[1]."', ". 
            "polos='".$dataTeripang[2]."', ".
            "kuasa='".$dataTeripang[3]."', ". 
            "bola='".$dataTeripang[4]."' ". 
            "WHERE kategori_id='" . $kategori . "'";

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