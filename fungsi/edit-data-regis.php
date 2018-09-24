<?php
session_start();
$mUID = $_SESSION['m-id'];
include '../config/koneksi.php';

if ($mUID == "1") {
  // code...

} else {
  // code...
  //delete edit marketing
  if (isset($_POST['delete'])) {
    // code...
    $pID = $_POST['pID'];
    $delete = "DELETE p, t FROM t_sertifikasi t INNER JOIN m_peserta p ON p.peserta_id = t.id_peserta WHERE t.id_peserta = '$pID'";
    if (mysqli_query($koneksi, $delete)) {
      // code...

    } else {
      // code...
      echo "Error: " . $delete . "<br>" . $koneksi->error;
    }

    echo 1;

  } else if (isset($_POST['editMarketInd'])) {
    // code...
    // Submit edit marketing
    extract($_POST['editMarketInd']);
    $submitEditM = "UPDATE m_peserta SET peserta_nama='$nama', peserta_instansi_nama='$nama', peserta_alamat='$alamat', peserta_email='$email', peserta_telp='$telp' WHERE peserta_id='$id'";
    if (mysqli_query($koneksi, $submitEditM)) {
      // code...
    } else {
      // code...
      echo "Error: " . $submitEditM . "<br>" . $koneksi->error;
    }

    echo 1;

  } 

}
?>
