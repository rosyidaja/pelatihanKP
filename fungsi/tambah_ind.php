<?php

include '../config/koneksi.php';

if (isset($_POST['nama'])) {
  // code...
  $nama = $_POST['nama'];
  $pilihan = $_POST['pilihan'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $course = $_POST['course'];
  $schedule = $_POST['schedule'];
  $marketing = $_POST['marketing'];
  ;


  $sql = "INSERT INTO m_peserta (peserta_nama, peserta_email, peserta_alamat, peserta_telp, peserta_jenis,peserta_instansi_nama) VALUES ('".$nama."', '".$email."', '".$alamat."', '$telp', '".$pilihan."', '".$nama."')";

  if (mysqli_query($koneksi, $sql)) {
    // code...
    $last_id = mysqli_insert_id($koneksi);
    $sql_sertifikasi = "INSERT INTO t_sertifikasi (id_jadwal, id_jns_pelatihan, id_peserta) VALUES ($schedule, '".$course."', $last_id)";

    if (mysqli_query($koneksi, $sql_sertifikasi)) {
      // code...
      echo "Sukses";
    } else {
      // code...
      echo "error insert sertifikasi";
    }

  } else {
    // cod ...
    echo "Error : " . $sql . "<br>" . $koneksi->error;
  }

  $koneksi->close();
  header("location:../user/public/form.php?pesan=sukses");
}

?>
