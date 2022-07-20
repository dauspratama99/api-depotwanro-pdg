<?php
require_once('koneksi.php');
header('Content-Type: application/json');

$id = $_POST['id'];


$query = "DELETE FROM `tb_driver` WHERE `id`='$id'";
$ad = mysqli_query($con, $query);

if ($ad) {

        if ($ad) {
            $response["kode"] = '1';
            $response["status"] = 'sukses';
            $response["pesan"] = "Hapus berhasil";
        } else {

            $response["kode"] = '0';
            $response["status"] = 'gagal';
            $response["pesan"] = "Hapus gagal Update";
        }
    
} else {
    $response["kode"] = '0';
    $response["status"] = 'gagal';
    $response["pesan"] = "Gagal hapus";
}

echo json_encode($response);
mysqli_close($con);
?>