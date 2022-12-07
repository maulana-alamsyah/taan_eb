<?php
include("../config/koneksi.php");

$result = $db->mysqli->query("SELECT * FROM kuisioner");
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}
echo json_encode($data);
?>