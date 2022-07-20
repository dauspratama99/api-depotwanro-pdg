<?php
header('Content-Type: application/json');
require_once('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $response = [];

            
        $cari_user = "SELECT * FROM tb_admin WHERE username='$username'";

        $eksekusi = mysqli_query($con, $cari_user);
        $query = mysqli_fetch_object($eksekusi);
        $pas = $query->password;
      
        if (password_verify($password, $pas)) {
     
                // unset($cari_user['password']);
                $response["status"] = 1;
                 $response["message"] = "Data tersedia";
                $response["data"] = $query;
        } 
        else {
            $response["status"] = 0;
            $response["message"] = "Data Tidak Tersedia";
        }
} else {
    $response = [];
    $response["status"] = 0;
    $response["message"] = "Jaringan Bermasalah";
}
mysqli_close($con);
echo json_encode($response);