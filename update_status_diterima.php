<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}


$id_driver = $_POST['id_driver'];
$id = $_POST['id'];


$query = "UPDATE tb_transaksi SET id_driver ='$id_driver', status_transaksi='Pesanan Diterima' 
WHERE id='$id'";

$ad = mysqli_query($con, $query);
 
if ($ad) {
    $res = new emp();
    $res->message = "Sukses Update";
    $res->status = "sukses";
    die(json_encode($res));
} else {
    $res = new emp();
    $res->message = "Gagal Update";
    $res->status = "gagal";
    die(json_encode($res));
}

mysqli_close($con);
?>
