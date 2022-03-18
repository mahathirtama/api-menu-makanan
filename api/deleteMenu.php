<?php
require "../config/connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $response = array();
    $id = $_POST['id'];

    $insert = "DELETE FROM menu WHERE id = '$id'";

    if (mysqli_query($con, $insert)) {
        # code...
        $response['value'] = 1;
        $response['message'] = 'Berhasil Di Hapus';
        echo json_encode($response);
    } else {
        # code...
        $response['value'] = 0;
        $response['message'] = 'Gagal Di Hapus';
        echo json_encode($response);
    }
}
