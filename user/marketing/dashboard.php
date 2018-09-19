<?php
    include '../../config/koneksi.php';
    $query =mysqli_query($koneksi, "SELECT ps.peserta_id, ps.peserta_nama, p.jns_pelatihan_kode, p.jns_pelatihan_nama, j.jadwal_id, j.jadwal_sesi FROM m_peserta ps, m_jns_pelatihan p, m_jadwal j WHERE ps.jns_pelatihan_kode=p.jns_pelatihan_kode AND ps.jadwal_id=j.jadwal_id ORDER BY ps.peserta_id ASC ");

?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" name="button">&times</button>
  <strong>Login Sukses!</strong> Selamat datang, <?php echo $_SESSION['username']; ?>
</div>

            <div class="col-sm-12 text-center">
              <h3>SELAMAT DATANG DI HALAMAN MARKETING</h3>
            </div>
