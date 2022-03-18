<?php
require "../config/connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $response = array();
    $namaItem = $_POST['namaItem'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $idUsers = $_POST['idUsers'];

    $image = date("dmYHis") . str_replace(" ", "", basename($_FILES['image']['name']));
    $imagePath = "../upload/" . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

    $insert = "INSERT INTO menu VALUE(NULL, '$namaItem', '$tipe', '$harga', '$image', NOW(), $idUsers)";

    if (mysqli_query($con, $insert)) {
        # code...
        $response['value'] = 1;
        $response['message'] = 'Berhasil Ditambahkan';
        echo json_encode($response);
    } else {
        # code...
        $response['value'] = 0;
        $response['message'] = 'Gagal Ditambahkan';
        echo json_encode($response);
    }
}
