<?php
require_once '../config/koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);


$filename = $_POST['lokasi'] . '_' . random_int(100, 999) . date("is") . '.' . explode('.',$_FILES['foto']['name'])[count(explode('.',$_FILES['foto']['name'])) - 1];


$location = "../upload/galeri/".$filename;

if($_FILES['foto']['tmp_name']){
    if ( move_uploaded_file($_FILES['foto']['tmp_name'], $location) ) { 
        $fotoSebelum = "SELECT foto FROM galeri " .
                    "WHERE galeri_id='" . $_POST['idGaleri'] . "'";
        $result = $db->mysqli->query($fotoSebelum);
        foreach ($result as $foto) {
            unlink('../upload/galeri/'. $foto['foto']);
        }
        $sql = "UPDATE galeri SET foto='" . $filename . "'" .
                    "WHERE galeri_id='" . $_POST['idGaleri'] . "'";
        $result = $db->mysqli->query($sql);
    } else { 
        echo 'Failure'; 
    }
}

$sql = "UPDATE galeri SET " .
"tanggal='" . $_POST['tanggal'] . "', " .
"lokasi='" . $_POST['lokasi'] . "', " .
"keterangan='" . $_POST['keterangan'] . "' " .
"WHERE galeri_id='" . $_POST['idGaleri'] . "'";

$result = $db->mysqli->query($sql);


$obj = new stdClass();
if($result > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>