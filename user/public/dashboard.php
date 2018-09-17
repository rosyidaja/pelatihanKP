<?php 
    include '../../config/koneksi.php';
    $query= mysqli_query($koneksi, "SELECT jp.jns_pelatihan_nama, j.jadwal_sesi, j.jadwal_mulai, j.jadwal_selesai, p.peserta_nama,p.peserta_instansi_nama , t.lokasi, t.trainer, t.tools FROM m_jns_pelatihan jp INNER JOIN(m_jadwal j INNER JOIN (t_sertifikasi t INNER JOIN m_peserta p ON t.id_peserta=p.peserta_id)ON j.jadwal_id=t.id_jadwal)ON jp.jns_pelatihan_kode=t.id_jns_pelatihan GROUP BY p.peserta_instansi_nama ORDER BY jp.jns_pelatihan_nama ASC")
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="description" content="Form Registrasi Pendaftaran Training">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/fa_all.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/register.css">

    <!-- jQuery -->
    <script src="../../assets/js/jquery-3.3.1.min.js"></script>

    <!-- Java script -->
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <script src="../../assets/js/register.js"></script>

	</head>
	<body>
        <div class="container-fluid">
            <div class="col-sm-12">
            <div class="header-public">
            <nav class="navbar navbar-d navbar-expand-sm bg-light" >
                <a class="navbar-brand" href="#">
                    <img class="img-fluid" style="float: left;" src="../../assets/image/logo.png" alt="Ebiz Infotama">
                </a>
                <!-- Brand/logo -->
                <div class="dashboard-header">
                    <h3>REKAPITULASI JUMLAH PESERTA PELATIHAN PERIODE 2018-2019</h3>
                </div>
            </nav>
            </div>
    
    <div class="tbdashboard">
    <table class="table table-striped table-hover table-sm text-center">

    <thead>
      <tr>
        <th>No</th>
        <th>Course</th>
        <th>Schedule</th>
        <th>Nama Peserta</th>
        <th>Jml. Peserta</th>
        <th>Lokasi</th>
        <th>Trainer</th>
        <th>Tools</th>
      </tr>
    </thead>

<?php if (mysqli_num_rows($query)>0) { ?>
    <tbody>
        <?php $no=1; ?>
        <?php while ($data = mysqli_fetch_array($query)) {
          // code...
          $jenis = $data["jns_pelatihan_nama"];
          $jadwal = $data["jadwal_sesi"];
          $jadwal1 = $data["jadwal_mulai"];
          $jadwal2 = $data["jadwal_selesai"];
          $nama = $data["peserta_instansi_nama"];
          $lokasi = $data["lokasi"];
          $trainer = $data["trainer"];
          $tools = $data["tools"];     
        ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $jenis; ?></td>
        <td><?php echo $jadwal," (", $jadwal1 , "-" , $jadwal2, ")"; ?></td>
        <td><?php echo $nama;?></td>
        <td>30 Orang</td>
        <td><?php echo $lokasi; ?></td>
        <td><?php echo $trainer; ?></td>
        <td><?php echo $tools; ?></td>
      </tr>
      <?php $no++; } ?>
    </tbody>
<?php } ?>
  </table>
                </div>
            </div>
        </div>
    </body>
</html>