<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$tgl_pengeluaran = $_POST['tgl_pengeluaran'];
$jml_pengeluaran = $_POST['jml_pengeluaran'];
$ket_pengeluaran= $_POST['ket_pengeluaran'];




$query = "INSERT INTO tb_pengeluaran(tgl_pengeluaran,jml_pengeluaran,ket_pengeluaran) 
VALUES('$tgl_pengeluaran','$jml_pengeluaran','$ket_pengeluaran')";

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
