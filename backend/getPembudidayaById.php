<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "SELECT * FROM profil_pembudidaya WHERE profil_pembudidaya_id='" . $data->id . "'";
$result = $db->mysqli->query($sql);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

echo json_encode($data);
?>