<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat= $_POST['alamat'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);



$query = "INSERT INTO tb_konsumen(nama,no_hp,alamat,username,password) 
VALUES('$nama','$no_hp','$alamat','$username','$password')";

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
