<?php
require "../config/connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    # code...
    $response = array();
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tglLahir = $_POST['tglLahir'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek = "SELECT * FROM auth WHERE username='$username'";
    $result = mysqli_fetch_array(mysqli_query($con, $cek));

    if (isset($result)) {
        # code...
        $response['value'] = 2;
        $response['message'] = 'Username Telah Digunakan';
        echo json_encode($response);
    } else {
        # code...
        $insert = "INSERT INTO auth (id, nama, email, tglLahir, username, password, createdDate)
     VALUES (NULL, '$nama', '$email', '$tglLahir', '$username', '$password', NOW())";

        if (mysqli_query($con, $insert)) {
            # code...
            $response['value'] = 1;
            $response['message'] = 'Berhasil Daftar';
            echo json_encode($response);
        } else {
            # code...
            $response['value'] = 0;
            $response['message'] = 'Gagal Daftar';
            echo json_encode($response);
        }
    }
}
