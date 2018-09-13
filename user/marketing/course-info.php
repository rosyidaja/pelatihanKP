<?php
include '../../config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM m_peserta ORDER BY peserta_id ASC");
?>
<div class="">
  <h1>Data Registrasi Training</h1>
</div>

<!-- tabel start -->
<div class="tbcourse">
  <?php if (mysqli_num_rows($query)>0) {?>
    <table id="tbcourse" class="table table-striped table-hover table-sm text-center">

    <thead>
      <tr>
        <th>No Regis</th>
        <th>Jenis</th>
        <th>Peserta</th>
        <th>Schedule</th>
        <th>Lokasi</th>
        <th>Tools</th>
        <th><i class="fa fa-cog"></i></th>
        <th>Payment Term</th>
        <th>Konfirmasi</th>
      </tr>
    </thead>

    <tbody>
  <?php $no=1;
    while ($data = mysqli_fetch_array($query)){
   ?>


<tr>
      <td><?php echo $no ?></td>
      <td><?php echo $data["peserta_jenis"];?></td>
      <td><?php echo $data["peserta_instansi_nama"];?></td>
      <td>
        <select class="form-control" name="jadwal">
          <option value="0" active>Pilih Jadwal</option>
          <option value="softcopy">Sesi1 (04 Jul 2018-06 Jul 2018)</option>
          <option value="hardcopy">Sesi2 (05 Aug 2018-10 Aug 2018)</option>
        </select>
      </td>
      <td>
        <input type="text" class="form-control" name="lokasi" value="" placeholder="Masukkan Lokasi" required>
      </td>
      <td>
        <select class="form-control" name="tools">
          <option value="0" active>Pilih Tools</option>
          <option value="softcopy">Softcopy</option>
          <option value="hardcopy">Hardcopy</option>
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

<!-- table end -->



  </div>


</div>
