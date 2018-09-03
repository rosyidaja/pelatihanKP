<?php

include '../config/koneksi.php';

if (isset($_POST['nama'])) {
  // code...
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $course = $_POST['course'];
  $schedule = $_POST['schedule'];
  $marketing = $_POST['marketing'];

  echo "<span class='success'>Dengan <b>METODE POST</b></span><br/>";
  echo "user  	: ".$nama."
  <br/>email  	: ".$email."
  <br/>alamat 	: ".$alamat."
  <br/>telp	 	: ".$telp."
  <br/>course 	: ".$course."
  <br/>schedule	: ".$schedule."
  <br/>marketting: ".$marketing.""
  ;

  $sql = "INSERT INTO m_peserta (peserta_nama, peserta_email, peserta_alamat, peserta_telp) VALUES ('".$nama."', '".$email."', '".$alamat."', $telp)";

  if (mysqli_query($koneksi, $sql)) {
    // code...
    $last_id = mysqli_insert_id($koneksi);
    $sql_sertifikasi = "INSERT INTO t_sertifikasi (jadwal_id, peserta_id) VALUES ($schedule, $last_id)";

    if (mysqli_query($koneksi, $sql_sertifikasi)) {
      // code...
      echo "Sukses";
    } else {
      // code...
      echo "error insert sertifikasi";
    }

  } else {
    // code...
    echo "Error : " . $sql . "<br>" . $koneksi->error;
  }

  $koneksi->close();
  header("location:../user/public/form.php?pesan=sukses");
}

?>
