<?php
require "../config/connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $response = array();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek = "SELECT * FROM auth WHERE username='$username' AND password='$password'";
    $result = mysqli_fetch_array(mysqli_query($con, $cek));

    if (isset($result)) {
        # code...
        $response['value'] = 1;
        $response['message'] = 'Berhasil Login';
        $response['nama'] = $result['nama'];
        $response['email'] = $result['email'];
        $response['tglLahir'] = $result['tglLahir'];
        $response['id'] = $result['id'];
        echo json_encode($response);
    } else {
        # code...
        $response['value'] = 0;
        $response['message'] = 'Gagal Login';
        echo json_encode($response);
    }
}
