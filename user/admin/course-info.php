<?php
include '../../config/koneksi.php';

$mID = $_SESSION['m-id'];

// $query = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_instansi_nama, j.jadwal_sesi, u.user_nama, t.id_peserta, t.id_jadwal, t.approve, t.reg_no, t.lokasi, t.tools, t.status_pay, t.trainer FROM m_peserta P INNER JOIN(m_jadwal j INNER JOIN(t_sertifikasi t INNER JOIN m_user u ON t.id_marketing=u.user_id) ON j.jadwal_id=t.id_jadwal) ON p.peserta_id=t.id_peserta WHERE t.approve>'0' GROUP BY p.peserta_instansi_nama ORDER BY p.peserta_id ASC");
// $queryInd = mysqli_query($koneksi, "SELECT p.peserta_nama, p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta ORDER BY p.peserta_id ASC");
// $queryIns = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta ORDER BY p.peserta_id ASC");
// $queryIndEdit = mysqli_query($koneksi, "SELECT p.peserta_nama, p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta ORDER BY p.peserta_id ASC");
// $queryInsEdit = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta ORDER BY p.peserta_id ASC");

$query = mysqli_query($koneksi, "SELECT p.peserta_jenis, pel.jns_pelatihan_nama, t.id_jns_pelatihan, p.peserta_instansi_nama, j.jadwal_sesi, u.user_nama, t.id_peserta, t.id_jadwal, t.approve, t.reg_no, t.lokasi, t.tools, t.status_pay, t.trainer FROM m_peserta P INNER JOIN(m_jadwal j INNER JOIN(m_jns_pelatihan pel INNER JOIN(t_sertifikasi t INNER JOIN m_user u ON t.id_marketing=u.user_id)ON pel.jns_pelatihan_kode=t.id_jns_pelatihan)ON j.jadwal_id=t.id_jadwal) ON p.peserta_id=t.id_peserta WHERE t.approve>'0' GROUP BY p.peserta_instansi_nama ORDER BY p.peserta_id ASC");
$queryInd = mysqli_query($koneksi, "SELECT p.peserta_nama, p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta GROUP BY t.reg_no ORDER BY t.reg_no ASC");
$queryIns = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta GROUP BY t.reg_no ORDER BY t.reg_no ASC");
$queryIndEdit = mysqli_query($koneksi, "SELECT p.peserta_nama, p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta GROUP BY t.reg_no ORDER BY t.reg_no ASC");
$queryInsEdit = mysqli_query($koneksi, "SELECT p.peserta_pic_nama, p.peserta_instansi_nama, pel.jns_pelatihan_nama, t.id_jns_pelatihan, p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, j.jadwal_sesi, t.id_peserta, t.reg_no, t.id_jadwal FROM m_peserta P INNER JOIN(m_jns_pelatihan pel INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON pel.jns_pelatihan_kode=t.id_jns_pelatihan) ON p.peserta_id=t.id_peserta GROUP BY t.reg_no ORDER BY t.reg_no ASC");

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
          <th>Peserta</th>
          <th>Pelatihan</th>
          <th>Jadwal</th>
          <th>Lokasi</th>
          <th>Tools</th>
          <th>Trainer</th>
          <th><i class="fa fa-cog"></i></th>
          <th>Payment Term</th>
          <th>Status</th>
          <th>Konfirmasi</th>
        </tr>
      </thead>

      <tbody>

        <?php $no=1; ?>
        <?php while ($data = mysqli_fetch_array($query)) {
          // code...
          $jadwal_dropdown = '';
          $pelatihan_dropdown = '';
          $pelatihan = $data["jns_pelatihan_nama"];
          $pelatihan_kode = $data["id_jns_pelatihan"];
          $id = $data["id_peserta"];
          $jenis = $data["peserta_jenis"];
          $instansi = $data["peserta_instansi_nama"];
          $jadwal = $data["id_jadwal"];
          $approve = $data["approve"];
          $regno = $data["reg_no"];
          $lokasi = $data["lokasi"];
          $trainer = $data["trainer"];
          $namaMar = $data["user_nama"];

        ?>

        <tr>

          <td class="align-middle"><?php echo $regno; ?></td>
          <td class="align-middle"><?php echo $instansi; ?></td>
          <td class="align-middle">
            <select class="form-control dropPM apr-disabled<?php echo $no;?>" data-num="<?php echo $regno;?>" id="jpel<?php echo $regno; ?>">
              <option value="">Pilih Pelatihan</option>
              <?php
              $drDown1 = mysqli_query($koneksi,"select * from m_jns_pelatihan");
              if (mysqli_num_rows($drDown1) > 0) {
                // code...
                while ($rowJns = mysqli_fetch_assoc($drDown1)) {
                  $arr_sel2 = '';
                  if($rowJns['jns_pelatihan_kode'] == $pelatihan_kode){
                    $arr_sel2 = 'selected';
                  }
                  $pelatihan_dropdown .= '<option '.$arr_sel2.' value="'.$rowJns['jns_pelatihan_kode'].'">'.$rowJns['jns_pelatihan_nama'].'</option>';

                }
                echo $pelatihan_dropdown;
              }
              ?>
            </select>
          </td>
          <td class="align-middle">
            <select class="form-control apr-disabled<?php echo $no;?>" id="jadwal<?php echo $regno; ?>">
              <option value="">Pilih Jadwal</option>
              <?php
              $drDown2 = mysqli_query($koneksi,"select * from m_jadwal");
              if (mysqli_num_rows($drDown2) > 0) {
                // code...
                while ($rowJadwal = mysqli_fetch_assoc($drDown2)) {
                  $arr_sel = '';
                  if($rowJadwal['jadwal_id'] == $jadwal){
                    $arr_sel = 'selected';
                  }
                  $jadwal_dropdown .= '<option '.$arr_sel.' value="'.$rowJadwal['jadwal_id'].'">'.$rowJadwal['jadwal_sesi'].' : '.$rowJadwal['jadwal_mulai'].' - '.$rowJadwal['jadwal_selesai'].'</option>';

                }
                echo $jadwal_dropdown;
              }
              ?>
            </select>
          </td>
          <td class="align-middle">
            <input type="text" class="form-control apr-disabled<?php echo $no;?>" id="lokasi<?php echo $regno; ?>" value="<?php if ($data["lokasi"] == "") { echo ""; } else { echo $lokasi; } ?>" placeholder="Masukkan Lokasi">
            <input type="hidden" id="noregis<?php echo $regno; ?>" value="<?php echo $regno; ?>">
          </td>
          <td class="align-middle">
            <select class="form-control apr-disabled<?php echo $no;?>" id="tools<?php echo $regno; ?>">
              <option value="" <?php if ($data["tools"] == "") { echo "selected"; } ?> >Pilih Tools</option>
              <option value="softcopy" <?php if ($data["tools"] == "softcopy") { echo "selected"; } ?> >Softcopy</option>
              <option value="hardcopy" <?php if ($data["tools"] == "hardcopy") { echo "selected"; } ?> >Hardcopy</option>
            </select>
          </td>
          <td class="align-middle">
            <input type="text" class="form-control apr-disabled<?php echo $no;?>" id="trainer<?php echo $regno; ?>" value="<?php if ($data["trainer"] == "") { echo ""; } else { echo $trainer; } ?>" placeholder="Masukkan Nama Trainer">
            <input type="hidden" id="noregis<?php echo $regno; ?>" value="<?php echo $regno; ?>">
          </td>
          <td class="align-middle">
            <div class="btn-group btn-group-sm">
              <button type="button" class="btn btn-warning" data-target="#view<?php echo $jenis;?><?php echo $regno;?>" data-toggle="modal"><i class="fa fa-eye"></i> View</button>
              <button type="button" class="btn btn-danger apr-disabled<?php echo $no;?>" data-target="#edit<?php echo $jenis;?><?php echo $no;?>" data-toggle="modal"><i class="fa fa-pen"></i> Edit</button>
            </div>
          </td>
          <td class="align-middle">
            <select id="pembayaran<?php echo $regno; ?>" class="form-control pterm apr-disabled<?php echo $no;?>" data-showbtn="btnCk<?php echo $no; ?>">
              <option value="" <?php if ($data["status_pay"] == "") { echo "selected"; } ?> >Pilih Pembayaran</option>
              <option value="cod" <?php if ($data["status_pay"] == "cod") { echo "selected"; } ?> >COD</option>
              <option value="kontrak" <?php if ($data["status_pay"] == "kontrak") { echo "selected"; } ?> >Kontrak</option>
              <option value="H - 1" <?php if ($data["status_pay"] == "H - 1") { echo "selected"; } ?> >H - 1</option>
            </select>
          </td>
          <td>Approved<br>by <?php echo $namaMar; ?></td>
          <td class="align-middle">
            <span class="button-checkbox-admin" id="btnCk<?php echo $no; ?>" data-id="<?php echo $no; ?>" data-mid="<?php echo $mID; ?>" data-apr="<?php echo $approve;?>" data-field="<?php echo $regno; ?>" style="display:none">
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
