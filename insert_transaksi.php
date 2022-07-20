<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}
$date = date('Y-m-d');
$id_konsumen = $_POST['id_konsumen'];
$jumlah_galon= $_POST['jumlah_galon'];
$tipe_bayar = $_POST['tipe_bayar'];
$lat_konsumen = $_POST['lat_konsumen'];
$lng_konsumen = $_POST['lng_konsumen'];




$query = "INSERT INTO tb_transaksi(id_konsumen,tgl_transaksi,jumlah_galon,status_transaksi,tipe_bayar,lat_konsumen,lng_konsumen) 
VALUES('$id_konsumen','$date','$jumlah_galon','Pesanan Masuk','$tipe_bayar','$lat_konsumen','$lng_konsumen')";

$ad = mysqli_query($con, $query);
 
if ($ad) {
    $res = new emp();
    $res->message = "Sukses Input";
    $res->status = "sukses";
    die(json_encode($res));
} else {
    $res = new emp();
    $res->message = "Gagal Input";
    $res->status = "gagal";
    die(json_encode($res));
}

mysqli_close($con);
?>
