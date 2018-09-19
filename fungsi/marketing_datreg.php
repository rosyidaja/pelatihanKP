<?php
include '../config/koneksi.php';

if (isset($_POST['marketingApr'])) {
  // code...
  extract($_POST['marketingApr']);

  // $sql = "INSERT INTO t_sertifikasi (reg_no, tools, lokasi, status_pay) VALUES ('".$id."', '".$tools."', '".$lokasi."', '".$pembayaran."') WHERE reg_no='$id'";
  $sql = "UPDATE t_sertifikasi SET reg_no='$id', tools='$tools', lokasi='$lokasi', status_pay='$pembayaran', approve='$approval' WHERE reg_no='$id'";
  if (mysqli_query($koneksi, $sql)) {
    // code...
  } else {
    // code...
    echo "Error: " . $sql . "<br>" . $koneksi->error;
  }

  echo 1;

}
?>
