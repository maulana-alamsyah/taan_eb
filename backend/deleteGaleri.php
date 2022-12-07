<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$fotoSebelum = "SELECT foto FROM galeri WHERE galeri_id='" . $data->id . "'";
$result = $db->mysqli->query($fotoSebelum);
foreach ($result as $foto) {
    unlink('../upload/'. $foto['foto']);
}



$sql = "DELETE FROM galeri WHERE galeri_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);



$obj = new stdClass();
if($result > 0) {
    $obj->status = "success";
} else {
    $obj->status = "fail";
}

echo json_encode($obj);
?>