<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$alasan= $_POST['alasan'];




$query = "INSERT INTO tb_jadwal(tgl_awal,tgl_akhir,alasan) 
VALUES('$tgl_awal','$tgl_akhir','$alasan')";

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
