<?php 
    include '../../config/koneksi.php';
    $query =mysqli_query($koneksi, "SELECT ps.peserta_id, ps.peserta_nama, p.jns_pelatihan_kode, p.jns_pelatihan_nama, j.jadwal_id, j.jadwal_sesi FROM m_peserta ps, m_jns_pelatihan p, m_jadwal j WHERE ps.jns_pelatihan_kode=p.jns_pelatihan_kode AND ps.jadwal_id=j.jadwal_id ORDER BY ps.peserta_id ASC ");

?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" name="button">&times</button>
  <strong>Login Sukses!</strong> Selamat datang, <?php echo $_SESSION['username']; ?>
</div>

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

    <tbody>
    <?php if (mysqli_num_rows($query)>0) {?>
    <?php $no=1;
      while ($data = mysqli_fetch_array($query)){
     ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $data['jns_pelatihan_nama'];?></td>
        <td><?php echo $data['jadwal_id'];?></td>
        <td><?php echo $data['peserta_nama'];?></td>
        <td>30 Orang</td>
        <td>Ebiz</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr>
      <!-- <tr>
        <td>2.</td>
        <td></td>
        <td>Sesi 2(19-09-2018 / 1-01-2019)</td>
        <td>Fandi</td>
        <td>30 Orang</td>
        <td>Ebiz</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr>
      <tr>
        <td>2.</td>
        <td></td>
        <td>Sesi 2(19-09-2018 / 1-01-2019)</td>
        <td>CV. Surabaya Internusa Internetindo Jaya</td>
        <td>30 Orang</td>
        <td>Ebiz</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr>
      <tr>
        <td>2.</td>
        <td>Java SE Fundamental(OCA)</td>
        <td>Sesi 1(21-08-2018 / 1-01-2019)</td>
        <td>Archie</td>
        <td>30 Orang</td>
        <td>Jl.Pesanggrahan</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr>
      <tr>
        <td>3.</td>
        <td>Mikrotik Basic essential</td>
        <td>Sesi 1(21-08-2018 / 1-01-2019)</td>
        <td>Archie</td>
        <td>30 Orang</td>
        <td>PT.Telkom Blitar</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr>

      <tr>
        <td>4.</td>
        <td>Cisco Routing & Switching</td>
        <td>Sesi 1(21-08-2018 / 1-01-2019)</td>
        <td>Archie</td>
        <td>30 Orang</td>
        <td>Ebiz</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr>

      <tr>
        <td>5.</td>
        <td>Java SE Programming</td>
        <td>Sesi 1(21-08-2018 / 1-01-2019)</td>
        <td>Archie</td>
        <td>30 Orang</td>
        <td>Magetan</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr>

      <tr>
        <td>6.</td>
        <td>MySQL Developer</td>
        <td>Sesi 1(21-08-2018 / 1-01-2019)</td>
        <td>Archie</td>
        <td>30 Orang</td>
        <td>Probolinggo</td>
        <td>Achmad Subekti</td>
        <td>Softcopy</td>
      </tr> -->
    </tbody>
    <?php $no++; } ?>
      <?php } ?>

  </table>
                </div>
            </div>