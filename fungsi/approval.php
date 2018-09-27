<?php

session_start();
$mUID = $_SESSION['m-id'];
include '../config/koneksi.php';
if ($mUID == '1'){
  //tombol approve admin
  if (isset($_POST['marketingApr'])) {
  // code...
  extract($_POST['marketingApr']);

  // $sql = "INSERT INTO t_sertifikasi (reg_no, tools, lokasi, status_pay) VALUES ('".$id."', '".$tools."', '".$lokasi."', '".$pembayaran."') WHERE reg_no='$id'";
  $sql1 = "UPDATE t_sertifikasi SET id_jns_pelatihan='$jenisPel', id_jadwal='$jadwal', tools='$tools', lokasi='$lokasi', trainer='$trainer', status_pay='$pembayaran', approve='$approval' WHERE reg_no='$id'";
  if (mysqli_query($koneksi, $sql1)) {
    // code...
  } else {
    // code...
    echo "Error: " . $sql1 . "<br>" . $koneksi->error;
  }

  echo 1;

} else if (isset($_POST['selesai'])) {
  //tombol selesai admin
  // code...
  $dataStat = $_POST['selesai'];
  $dataNum = $_POST['dataNum'];

  $selesai = "UPDATE t_sertifikasi SET approve=$dataStat WHERE reg_no=$dataNum";
  if (mysqli_query($koneksi, $selesai)) {
    // code...
  } else {
    // code...
    echo "Error: " . $selesai . "<br>" . $koneksi->error;
  }

  echo 1;

} elseif (isset($_POST['cancel'])) {
  //tombol cancel admin
  // code...
  $dataStat = $_POST['cancel'];
  $dataNum = $_POST['dataNum'];

  $cancel = "UPDATE t_sertifikasi SET approve=$dataStat WHERE reg_no=$dataNum";
  if (mysqli_query($koneksi, $cancel)) {
    // code...
  } else {
    // code...
    echo "Error: " . $cancel . "<br>" . $koneksi->error;
  }

  echo 1;

}

} else {

if (isset($_POST['marketingApr'])) {
  //tombol approve marketing
  // code...
  extract($_POST['marketingApr']);

  // $sql = "INSERT INTO t_sertifikasi (reg_no, tools, lokasi, status_pay) VALUES ('".$id."', '".$tools."', '".$lokasi."', '".$pembayaran."') WHERE reg_no='$id'";
  $sql = "UPDATE t_sertifikasi SET  id_jns_pelatihan='$jenisPel', id_jadwal='$jadwal', tools='$tools', lokasi='$lokasi', status_pay='$pembayaran', approve='$approval' WHERE reg_no='$id'";
  if (mysqli_query($koneksi, $sql)) {
    // code...
  } else {
    // code...
    echo "Error: " . $sql . "<br>" . $koneksi->error;
  }

  echo 1;

}
}
?>
