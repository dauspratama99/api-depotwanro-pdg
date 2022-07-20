<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}


$harga_galon = $_POST['harga_galon'];

$query = "UPDATE tb_harga SET harga_galon ='$harga_galon'";

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
