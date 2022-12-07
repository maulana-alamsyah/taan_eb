<?php
include("../config/koneksi.php");

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);
// $sql = "SELECT * FROM kuisioner WHERE kuisioner_id='" . $data->id . "'";
$sql = "SELECT * FROM kuisioner WHERE kuisioner_id='33'";

$result = $db->mysqli->query($sql);


$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$tahun = substr($data[0]['tanggal'], 0, 4);
$nama_pembudidaya = $data[0]['nama_pembudidaya'];

$sql = "SELECT 
*
FROM kuisioner
WHERE (SUBSTR(tanggal,1,4) = '".$tahun."') AND nama_pembudidaya = '".$nama_pembudidaya."' ORDER BY triwulan ASC";

$result = $db->mysqli->query($sql);


$all_triwulan = array();
foreach ($result as $row) {
    $all_triwulan[] = $row;
}

$dataTeripang = array();
$dataKeterangan = array();

$i = 1;
foreach ($all_triwulan as $triwulan) {
    $sql = "SELECT 
    jenis_jual.keterangan
    FROM kuisioner
    INNER JOIN jenis_jual
        ON jenis_jual.kategori_id = kuisioner.basah_id
    WHERE kuisioner.basah_id = '" .  $triwulan['basah_id'] . "'";

    $getBasahKeterangan = $db->mysqli->query($sql);

    foreach ($getBasahKeterangan as $row) {
        $dataKeterangan[$triwulan['triwulan']]['basahKeterangan'] = $row;
    }

    $sql = "SELECT 
    jenis_jual.keterangan
    FROM kuisioner
    INNER JOIN jenis_jual
        ON jenis_jual.kategori_id = kuisioner.kering_id
    WHERE kuisioner.kering_id = '" .  $triwulan['kering_id'] . "'";

    $getKeringKeterangan = $db->mysqli->query($sql);

    foreach ($getKeringKeterangan as $row) {
        $dataKeterangan[$triwulan['triwulan']]['keringKeterangan'] = $row;
    }

    $sql = "SELECT 
    jenis_jual.keterangan
    FROM kuisioner
    INNER JOIN jenis_jual
        ON jenis_jual.kategori_id = kuisioner.benih_id
    WHERE kuisioner.benih_id = '" .  $triwulan['benih_id'] . "'";

    $getBenihKeterangan = $db->mysqli->query($sql);

    foreach ($getBenihKeterangan as $row) {
        $dataKeterangan[$triwulan['triwulan']]['benihKeterangan'] = $row;
    }

    $sql = "SELECT 
    jenis_jual.keterangan
    FROM kuisioner
    INNER JOIN jenis_jual
        ON jenis_jual.kategori_id = kuisioner.farmasi_id
    WHERE kuisioner.farmasi_id = '" .  $triwulan['farmasi_id'] . "'";

    $getFarmasiKeterangan = $db->mysqli->query($sql);

    foreach ($getFarmasiKeterangan as $row) {
        $dataKeterangan[$triwulan['triwulan']]['farmasiKeterangan'] = $row;
    }

    $sql = "SELECT 
        stok_tersedia.teripang_pasir AS St_P ,
        stok_tersedia.gamat AS St_G,
        stok_tersedia.polos AS St_PL,
        stok_tersedia.kuasa AS St_K,
        stok_tersedia.bola AS St_B,
        produksi_terjual.teripang_pasir AS Sj_P ,
        produksi_terjual.gamat AS Sj_G,
        produksi_terjual.polos AS Sj_PL,
        produksi_terjual.kuasa AS Sj_K,
        produksi_terjual.bola AS Sj_B,
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
        WHERE kuisioner.basah_id = '". $triwulan['basah_id'] ."'";

    $getBasah = $db->mysqli->query($sql);

    foreach ($getBasah as $row) {
        $dataTeripang[$triwulan['triwulan']]['basah'] = $row;
    }

    $sql = "SELECT 
        stok_tersedia.teripang_pasir AS St_P ,
        stok_tersedia.gamat AS St_G,
        stok_tersedia.polos AS St_PL,
        stok_tersedia.kuasa AS St_K,
        stok_tersedia.bola AS St_B,
        produksi_terjual.teripang_pasir AS Sj_P ,
        produksi_terjual.gamat AS Sj_G,
        produksi_terjual.polos AS Sj_PL,
        produksi_terjual.kuasa AS Sj_K,
        produksi_terjual.bola AS Sj_B,
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
        WHERE kuisioner.kering_id = '". $triwulan['kering_id'] ."'";

    $getKering = $db->mysqli->query($sql);

    foreach ($getKering as $row) {
        $dataTeripang[$triwulan['triwulan']]['kering'] = $row;
    }    

    $sql = "SELECT 
        stok_tersedia.teripang_pasir AS St_P ,
        stok_tersedia.gamat AS St_G,
        stok_tersedia.polos AS St_PL,
        stok_tersedia.kuasa AS St_K,
        stok_tersedia.bola AS St_B,
        produksi_terjual.teripang_pasir AS Sj_P ,
        produksi_terjual.gamat AS Sj_G,
        produksi_terjual.polos AS Sj_PL,
        produksi_terjual.kuasa AS Sj_K,
        produksi_terjual.bola AS Sj_B,
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
        WHERE kuisioner.benih_id = '". $triwulan['benih_id'] ."'";

    $getBenih = $db->mysqli->query($sql);

    foreach ($getBenih as $row) {
        $dataTeripang[$triwulan['triwulan']]['benih'] = $row;
    }

    $sql = "SELECT 
        stok_tersedia.teripang_pasir AS St_P ,
        stok_tersedia.gamat AS St_G,
        stok_tersedia.polos AS St_PL,
        stok_tersedia.kuasa AS St_K,
        stok_tersedia.bola AS St_B,
        produksi_terjual.teripang_pasir AS Sj_P ,
        produksi_terjual.gamat AS Sj_G,
        produksi_terjual.polos AS Sj_PL,
        produksi_terjual.kuasa AS Sj_K,
        produksi_terjual.bola AS Sj_B,
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
        WHERE kuisioner.farmasi_id = '". $triwulan['farmasi_id'] ."'";

    $getFarmasi = $db->mysqli->query($sql);

    foreach ($getFarmasi as $row) {
        $dataTeripang[$triwulan['triwulan']]['farmasi'] = $row;
    }
    
    $i++;
}
$body = '';
$no = 1;
foreach ($dataKeterangan as $key => $value) {
    $jenisTeripang = "";
    foreach ($dataTeripang as $teripang) {
        $i = 0;
        foreach ($teripang as $jenis_jual => $jenis) {
            if ($i>0) {
                $jenisTeripang .= '<tr><td>'.$jenis_jual.'</td>';
            }else{
                $jenisTeripang .= '<td>'.$jenis_jual.'</td>';
            }
            foreach ($jenis as $j) {
                $nilai = ($j == 0) ? '' : $j;
                $jenisTeripang .= '<td>'.$nilai.'</td>';
            }
            $keterangan = ($dataKeterangan[$key][$jenis_jual.'Keterangan']['keterangan'] == '-') ? '' : $dataKeterangan[$key][$jenis_jual.'Keterangan']['keterangan'];
            $jenisTeripang .= '<td>'.$keterangan.'</td></tr>';
            $i++;
        }
    }

    $body .= '<tr>'.
            '<td rowspan="4">'.$no.'</td>' .
            '<td rowspan="4">'.$key.'</td>' .
            $jenisTeripang.
            '</tr>';
    $no++;
}
?>
<!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
        </head>
        <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        table {
            margin: 0 auto;
        }
        th {
            padding: 0 5px;
        }
        div {
            text-align: center;
        }
        </style>
        <body>
            <?php
            header("Content-type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=mahasiswa" . date('Y-m-d') . ".xls");
            ?>
            <div>
                <table>
                		<tr>
                			<th rowspan="2">No</th>
                			<th rowspan="2">Triwulan</th>
                			<th rowspan="2">Jenis Teripang</th>
                			<th colspan="5">Stok Tersedia</th>
                			<th colspan="5">Produksi Jual</th>
                			<th colspan="5">Harga Jual Jual</th>
                			<th colspan="5">Total Nilai Produksi</th>
                			<th rowspan="2">Keterangan</th>
                		</tr>
                        <tr>
                            <th>P</th>
                            <th>G</th>
                            <th>PL</th>
                            <th>K</th>
                            <th>B</th>
                            <th>P</th>
                            <th>G</th>
                            <th>PL</th>
                            <th>K</th>
                            <th>B</th>
                            <th>P</th>
                            <th>G</th>
                            <th>PL</th>
                            <th>K</th>
                            <th>B</th>
                            <th>P</th>
                            <th>G</th>
                            <th>PL</th>
                            <th>K</th>
                            <th>B</th>
                        </tr>
                <?= $body ?>