<?php

include '../config/koneksi.php';
//var_dump($_POST['formValues']);
//var_dump($_POST['task']);
if (isset($_POST['formValues'])) {
  extract($_POST['formValues']);
  $detail = $_POST['task'];
  //var_dump($detail);
  foreach($detail as $r => $row){
    $sql = "INSERT INTO m_peserta (peserta_nama, peserta_email, peserta_alamat, peserta_telp, peserta_jenis,peserta_instansi_nama)
    VALUES ('".$row['nama_peserta']."', '".$email_instansi."', '".$alamat_instansi."', '$nomer_instansi', '".$form_jenis."', '".$nama_instansi."')";
    if (mysqli_query($koneksi, $sql)) {
      // code...
      $last_id = mysqli_insert_id($koneksi);
      $jadwal = $row['jadwal'];
      $sql_sertifikasi = "INSERT INTO t_sertifikasi (id_jadwal, id_jns_pelatihan, id_peserta) VALUES ('".$row['jadwal']."','".$row['jenis']."', $last_id)";
      if (mysqli_query($koneksi, $sql_sertifikasi)) {
        // code..==
      } else {
        // code...
        // echo "error insert sertifikasi";
      }

    } else {
      // code...
      echo "Error : " . $sql . "<br>" . $koneksi->error;
    }
  }

  echo 1;

}

?>
