<?php
require_once('koneksi.php');
header('Content-Type: application/json');


$perintah = "SELECT tb_transaksi.*, tb_konsumen.nama, tb_konsumen.alamat FROM tb_transaksi
LEFT JOIN tb_konsumen ON tb_transaksi.id_konsumen = tb_konsumen.id 
WHERE tb_transaksi.status_transaksi='Pesanan Masuk'  ";

$eksekusi = mysqli_query($con, $perintah);
$cek = mysqli_affected_rows($con);

if ($cek > 0) {
    $response["status"] = 'sukses';
    $response["pesan"] = "Data tersedia";
    $response["res"] = array();
    $F = array();
    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $F[] = $ambil;
    }
    $response["res"] = $F;
} else {
   $response["status"] = 'Gagal';
    $response["pesan"] = "Data Tak tersedia";

}
echo json_encode($response);
mysqli_close($con);
?>