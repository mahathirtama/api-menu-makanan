<?php
require "../config/connect.php";

$response = array();

$sql = mysqli_query($con, "SELECT a.*,b.nama FROM menu a LEFT JOIN auth b ON a.idUsers = b.id");

while ($a = mysqli_fetch_array($sql)) {
    # code...
    $b['id'] = $a['id'];
    $b['namaItem'] = $a['namaItem'];
    $b['tipe'] = $a['tipe'];
    $b['harga'] = $a['harga'];
    $b['image'] = $a['image'];
    $b['createdDate'] = $a['createdDate'];
    $b['idUsers'] = $a['idUsers'];
    $b['namaUsers'] = $a['nama'];

    array_push($response, $b);
}

echo json_encode($response);
