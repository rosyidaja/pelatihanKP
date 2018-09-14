<?php
include '../../config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM m_peserta ORDER BY peserta_id ASC");
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
          $id = $data["peserta_id"];
          $jenis = $data["peserta_jenis"];
          $instansi = $data["peserta_instansi_nama"];
          $jadwal = $data["jadwal_id"];
        ?>

        <tr>

          <td><?php echo $no; ?></td>
          <td><?php echo $jenis; ?></td>
          <td><?php echo $instansi; ?></td>
          <td>
            <select class="form-control" name="">
              <option value="">Pilih Jadwal</option>
            </select>
          </td>
          <td>
            <input type="text" class="form-control" name="" value="" placeholder="Masukkan Lokasi">
          </td>
          <td>
            <select class="form-control" name="">
              <option value="">Pilih Tools</option>
            </select>
          </td>
          <td>
            <div class="btn-group btn-group-sm">
              <button type="button" class="btn btn-warning" data-target="#view<?php echo $data["peserta_jenis"];?><?php echo $no;?>" data-toggle="modal"><i class="fa fa-eye"></i> View</button>
              <button type="button" class="btn btn-danger" data-target="#edit<?php echo $no;?>" data-toggle="modal"><i class="fa fa-pen"></i> Edit</button>
            </div>
          </td>
          <td>
            <select class="form-control" id="pterm" onclick="payTerm()">
              <option value="0" active>Pilih Pembayaran</option>
              <option value="cod">COD</option>
              <option value="kontrak">Kontrak</option>
              <option value="H - 1">H - 1</option>
            </select>
          </td>
          <td>
            <span class="button-checkbox" id="btnCk" style="visibility: hidden;">
              <button type="button" class="btn btn-sm" data-color="success">  Approve</button>
              <input type="checkbox" style="display: none;" />
            </span>
          </td>

        </tr>

        <?php $no++; } ?>

      </tbody>

    </table>
  <?php } ?>
</div>
