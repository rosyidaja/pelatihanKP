<?php
include '../../config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM m_peserta ORDER BY peserta_id DESC");
?>

<div class="">
  <h1>Data Registrasi Training</h1>
</div>

<!-- tabel start -->
<div class="tbcourse">
  <table id="tbcourse" class="table table-striped table-hover table-sm text-center">

    <thead>
      <tr>
        <th>No</th>
        <th>Jenis Peserta</th>
        <th>Nama Peserta</th>
        <th>email</th>
        <th>no. telp</th>
        <th>alamat</th>
        <th><i class="fa fa-cog"></i></th>
        <th>Status</th>
      </tr>
    </thead>

    <tbody>
    <?php if (mysqli_num_rows($query)>0) {?>
    <?php
      $no = 1;
      while ($data = mysqli_fetch_array($query)){
    ?>
      <tr>
        <td><?php echo $no?></td>
        <td><?php echo $data["peserta_jenis"];?></td>
        <td><?php echo $data["peserta_nama"];?></td>
        <td><?php echo $data["peserta_email"];?></td>
        <td><?php echo $data["peserta_telp"];?></td>
        <td><?php echo $data["peserta_alamat"]; ?></td>
        <td>
          <button type="button" class="edit btn btn-danger btn-sm" data-toggle="modal" data-target="#mEdit"><i class="fa fa-pen"></i> Edit</button>
        </td>
        <td>
          <span class="button-checkbox">
            <button type="button" class="btn btn-sm" data-color="success">  Approve</button>
            <input type="checkbox" style="display: none;" />
          </span>
        </td>
      </tr>
      <?php $no++; } ?>
      <?php } ?>
      <!-- <tr>
        <td>123</td>
        <td>Instansi</td>
        <td>PT. Minyak Telon</td>
        <td>
          <button type="button" class="edit btn btn-danger btn-sm" data-toggle="modal" data-target="#mEdit"><i class="fa fa-pen"></i> Edit</button>
        </td>
        <td>
          <span class="button-checkbox">
            <button type="button" class="btn btn-sm" data-color="success">  Approve</button>
            <input type="checkbox" style="display: none;" />
          </span>
        </td>
      </tr> -->
    </tbody>

  </table>
<!-- table end -->

<!-- modal start -->
  <div class="modal fade" id="mEdit">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-tittle">Registrasi No. </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          DATA FORM REGIS
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit Data</button>
        </div>

      </div>
    </div>
  </div>
  <!-- modal end -->
</div>
