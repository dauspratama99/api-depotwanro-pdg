<?php
require_once('koneksi.php');
header('Content-Type: application/json');
date_default_timezone_set("Asia/Bangkok"); 

$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '0';
if ($tahun == 0){
    $tahun = date("Y");    
}

$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '0';
if ($bulan == 0){
    $bulan = date("m");    
}

$tglHariIni = isset($_GET['tglHariIni']) ? $_GET['tglHariIni'] : '0';
if ($tglHariIni == 0){
    $tglHariIni = date("Y-m-d");    
}

// $tahun = "2022"; // Untuk Testing
// $bulan = "04"; // Untuk Testing
// $tglHariIni = "2022-04-27"; // Untuk Testing

// echo $tglHariIni;

// echo $tahun;
// echo $bulan;

/** Query untuk mengambil jadwal tutup pada bulan ini */
// $perintah = "SELECT * FROM `tb_jadwal` WHERE 
// (YEAR(tgl_awal) = $tahun AND YEAR(tgl_akhir) = $tahun) AND 
// (MONTH(tgl_awal) = $bulan AND MONTH(tgl_akhir) = $bulan)";

$perintah = 
"SELECT * FROM `tb_jadwal` WHERE 
(
    YEAR(tgl_awal) = $tahun AND MONTH(tgl_awal) = $bulan
)   
    OR
(
    YEAR(tgl_akhir) = $tahun AND MONTH(tgl_akhir) = $bulan
)
";

$eksekusi = mysqli_query($con, $perintah);
$cek = mysqli_affected_rows($con);

$alasan = "Sesuai Jam Operasional";
$statusToko = "";

if ($cek > 0){  // di eksekusi ketika pada bulan itu ada jadwal khusus pada tabel jadwal
    $F = array();

    $flagTanggal = "false";

    while ($ambil = mysqli_fetch_object($eksekusi)) {
        $F[] = $ambil;
        $ambil->tgl_awal;
        $flagTanggal = check_in_range($ambil->tgl_awal, $ambil->tgl_akhir, $tglHariIni);
        if($flagTanggal == 1){
            $alasan = $ambil->alasan. " - Tgl : ".$ambil->tgl_awal. " s/d ". $ambil->tgl_akhir;
            $statusToko = "Tutup";
            // echo "ada";
            break;
        }
        else { // Pada bulan ini ada jadwal tapi tanggal hari ini tidak masuk ke range tanggal jadwal
            $statusToko = cekTokoBukaTutupHariIni($con);
            // echo "tidak";
        }
    }
    // echo $F[0]->tgl_awal;
}
else{   // di jalankan ketika tidak ada jadwal pada bulan itu, dan hanya cek status toko buka/tutup
    $statusToko = cekTokoBukaTutupHariIni($con);
}

// echo $alasan;
// echo "\n".$statusToko;

// if ($cek > 0) {
    $response["status"] = 'sukses';
    $response["pesan"] = "Data tersedia";
    $response["statusToko"] = $statusToko;
    $response["alasan"] = $alasan;
// } else {
//     $response["status"] = 'Gagal';
//     $response["pesan"] = "Data Tak tersedia";
// }
echo json_encode($response);
mysqli_close($con);

function check_in_range($start_date, $end_date, $date_from_user)
{
  // Convert to timestamp
  $start_ts = strtotime($start_date);
  $end_ts = strtotime($end_date);
  $user_ts = strtotime($date_from_user);

  // Check that user date is between start & end
  return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
}

function cekTokoBukaTutupHariIni($con){
    $qCekBukaHarian = "SELECT * FROM tb_bukatutup ";
    $cCekHarian = mysqli_query($con, $qCekBukaHarian);
    $objCekHarian = mysqli_fetch_object($cCekHarian);

    return $objCekHarian->status;
}

?>