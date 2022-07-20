<?php
require_once('koneksi.php');
header('Content-Type: application/json');
class emp
{
}

$id = $_POST['id'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$alamat= $_POST['alamat'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);



$query = "UPDATE tb_admin SET nama ='$nama',no_hp='$no_hp',alamat='$alamat',username='$username',
password='$password' WHERE id = '$id'";

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
