<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$column = array('foto_ktp', 'foto_kk', 'foto_lokasi', 'foto_jenis_teripang');

foreach ($column as $col) {
            $fotoSebelum = "SELECT ". $col ." FROM profil_pembudidaya " .
                "WHERE profil_pembudidaya_id='" . $data->id . "'";
            $result = $db->mysqli->query($fotoSebelum);
            foreach ($result as $foto) {
                unlink('../upload/'. $foto[$col]);
            }
    }




$sql = "DELETE FROM profil_pembudidaya WHERE profil_pembudidaya_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);



$obj = new stdClass();
if($result > 0) {
    $obj->status = "success";
} else {
    $obj->status = "fail";
}

echo json_encode($obj);
?>