<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$id = $_POST['id'];
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$alasan= $_POST['alasan'];



$query = "UPDATE tb_jadwal SET tgl_awal ='$tgl_awal',tgl_akhir='$tgl_akhir',alasan='$alasan'
 WHERE id = '$id'";

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
