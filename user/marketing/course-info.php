<?php
include '../../config/koneksi.php';

$mID = $_SESSION['m-id'];

$query = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_instansi_nama, j.jadwal_sesi, t.reg_no, t.id_peserta, t.id_jadwal, t.approve FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta WHERE t.id_marketing='$mID' GROUP BY p.peserta_instansi_nama ORDER BY p.peserta_id ASC");
$queryInd = mysqli_query($koneksi, "SELECT p.peserta_nama, p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta WHERE t.id_marketing='$mID' ORDER BY p.peserta_id ASC");
$queryIns = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta WHERE t.id_marketing='$mID' ORDER BY p.peserta_id ASC");
$queryIndEdit = mysqli_query($koneksi, "SELECT p.peserta_nama, p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta WHERE t.id_marketing='$mID' ORDER BY p.peserta_id ASC");
$queryInsEdit = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta WHERE t.id_marketing='$mID' ORDER BY p.peserta_id ASC");

$drDown2 = mysqli_query($koneksi,"select * from m_jadwal");
$jadwal_dropdown = '';
if (mysqli_num_rows($drDown2) > 0) {
  // code...
  while ($rowJadwal = mysqli_fetch_assoc($drDown2)) {
    // code...
    $jadwal_dropdown .= '<option value="'.$rowJadwal['jadwal_id'].'">'.$rowJadwal['jadwal_sesi'].' : '.$rowJadwal['jadwal_mulai'].' - '.$rowJadwal['jadwal_selesai'].'</option>';
  }
}
?>

<div class="header">
  <h1>Data Registrasi Training</h1>
</div>

<div class="tbcourse">
  <?php if (mysqli_num_rows($query)>0) { ?>
    <table id="tbmarket" class="table table-striped table-hover table-sm text-center">

      <thead>
        <tr>
          <th>NO. Regis</th>
          <th>Jenis</th>
          <th>Peserta</th>
          <th>Jadwal</th>
          <th>Lokasi</th>
          <th>Tools</th>
          <th><i class="fa fa-cog"></i></th>
          <th>Payment Term</th>
          <th>Konfirmasi</th>
        </tr>
      </thead>

      <tbody>

        <?php $no=1; ?>
        <?php while ($data = mysqli_fetch_array($query)) {
          // code...
          $id = $data["id_peserta"];
          $jenis = $data["peserta_jenis"];
          $instansi = $data["peserta_instansi_nama"];
          $jadwal = $data["id_jadwal"];
          $approve = $data["approve"];
          $regno = $data["reg_no"];
        ?>

        <tr>

          <td class="align-middle"><?php echo $regno; ?></td>
          <td class="align-middle"><?php echo $jenis; ?></td>
          <td class="align-middle"><?php echo $instansi; ?></td>
          <td class="align-middle">
            <select class="form-control apr-disabled<?php echo $no;?>" id="jadwal<?php echo $regno; ?>">
              <option value="">Pilih Jadwal</option>
              <?php
                echo $jadwal_dropdown;
              ?>
            </select>
          </td>
          <td class="align-middle">
            <input type="text" class="form-control apr-disabled<?php echo $no;?>" id="lokasi<?php echo $regno; ?>" placeholder="Masukkan Lokasi">
            <input type="hidden" id="noregis<?php echo $regno; ?>" value="<?php echo $regno; ?>">
          </td>
          <td class="align-middle">
            <select class="form-control apr-disabled<?php echo $no;?>" id="tools<?php echo $regno; ?>">
              <option value="">Pilih Tools</option>
              <option value="softcopy">Softcopy</option>
              <option value="hardcopy">Hardcopy</option>
            </select>
          </td>
          <td class="align-middle">
            <div class="btn-group btn-group-sm">
              <button type="button" class="btn btn-warning" data-target="#view<?php echo $jenis;?><?php echo $regno;?>" data-toggle="modal"><i class="fa fa-eye"></i> View</button>
              <button type="button" class="btn btn-danger apr-disabled<?php echo $no;?>" data-target="#edit<?php echo $jenis;?><?php echo $no;?>" data-toggle="modal"><i class="fa fa-pen"></i> Edit</button>
            </div>
          </td>
          <td class="align-middle">
            <select id="pembayaran<?php echo $regno; ?>" class="form-control pterm apr-disabled<?php echo $no;?>" data-showbtn="btnCk<?php echo $no; ?>">
              <option selected>Pilih Pembayaran</option>
              <option value="cod">COD</option>
              <option value="kontrak">Kontrak</option>
              <option value="H - 1">H - 1</option>
            </select>
          </td>
          <td class="align-middle">
            <span class="button-checkbox-marketing" id="btnCk<?php echo $no; ?>" data-id="<?php echo $no; ?>" data-apr="<?php echo $approve;?>" data-mid="<?php echo $mID; ?>" data-field="<?php echo $regno; ?>" style="display:none">
              <button type="button" class="btn btn-sm" data-color="success">  Setujui</button>
              <input type="checkbox" style="display: none;" />
            </span>
          </td>

        </tr>

        <?php $no++; } ?>

      </tbody>

    </table>
  <?php } ?>
</div>

<?php include('modal/regis-view-instansi.php'); ?>

<?php include('modal/regis-view-individu.php'); ?>

<?php include('modal/regis-edit-instansi.php'); ?>

<?php include('modal/regis-edit-individu.php'); ?>
