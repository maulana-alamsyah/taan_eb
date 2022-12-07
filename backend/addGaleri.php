<?php
require_once '../config/koneksi.php';

$raw = file_get_contents('php://input');
$data = json_decode($raw);

$filename = $_POST['lokasi'] . '_' . random_int(100, 999) . date("is") . '.' . explode('.',$_FILES['foto']['name'])[count(explode('.',$_FILES['foto']['name'])) - 1];


$location = "../upload/galeri/".$filename;


if ( move_uploaded_file($_FILES['foto']['tmp_name'], $location) ) { 
    $sql = "INSERT INTO galeri (foto, tanggal, lokasi, keterangan) VALUES('" . $filename. "', '". $_POST['tanggal']."', '". $_POST['lokasi']."', '". $_POST['keterangan']."')"; 
    $result = $db->mysqli->query($sql);

    $obj = new stdClass();
    if($result > 0) {
        $obj->result = "success";
    } else {
        $obj->result = "failed";
    }
    echo json_encode($obj);
} else { 
    echo 'Failure'; 
}
?>