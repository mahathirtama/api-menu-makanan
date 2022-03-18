<?php
require "../config/connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $response = array();
    $namaItem = $_POST['namaItem'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $id = $_POST['id'];

    $insert = "UPDATE menu SET namaItem = '$namaItem', tipe = '$tipe', harga = '$harga' WHERE id = '$id'";

    if (mysqli_query($con, $insert)) {
        # code...
        $response['value'] = 1;
        $response['message'] = 'Berhasil Di edit';
        echo json_encode($response);
    } else {
        # code...
        $response['value'] = 0;
        $response['message'] = 'Gagal Di edit';
        echo json_encode($response);
    }
}
