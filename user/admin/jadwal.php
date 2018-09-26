<h1>Jadwal Training</h1>

<?php

include '../../config/koneksi.php';
$datajadwal = mysqli_query($koneksi , "select * from m_jadwal");


echo '<table id="tbjadwal" class="table table-stripped table-hover table-sm text-center">
<thead>
  <tr>
    <th>ID</th>
    <th>Sesi Jadwal</th>
    <th>Sesi Mulai</th>
    <th>Sesi Selesai</th>
    <th><i class="fa fa-cog"></i></th>
  <tr>
</thead>
';

echo "<tbody>";
while ($row = mysqli_fetch_array($datajadwal)) {
  // code...
  $id = $row['jadwal_id'];
  $sesi = $row['jadwal_sesi'];
  $jadwal_mulai = $row['jadwal_mulai'];
  $jadwal_selesai = $row['jadwal_selesai'];

  echo "<tr>";
  echo "<td>$id</td>";
  echo "<td>$sesi</td>";
  echo "<td>$jadwal_mulai</td>";
  echo "<td>$jadwal_selesai</td>";
?>

<td>
  <button type="button" class="btn btn-warning btn-sm" data-target="#edit<?php echo $id;?>" data-toggle="modal"><i class="fa fa-pen"></i></button>
  <button type="button" class="btn btn-danger btn-sm" data-target="#delete<?php echo $id;?>" data-toggle="modal"><i class="fa fa-minus"></i></button>
</td>

<!-- Modal Edit User Start -->

<div class="modal fade" id="edit<?php echo $id;?>">
  <form class="form-horizontal" method="post" action="../../fungsi/jadwal_manage.php">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <!-- modal header start -->
        <div class="modal-header">
          <h4>Edit Jadwal "<?php echo $sesi;?>"</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- modal header end -->
        <!-- modal body start -->
        <div class="modal-body">
          <input type="hidden" name="edit_jadwal_id" value="<?php echo $id?>">
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Sesi</label>
            </div>
            <div class="col-sm-4">
              <input type="text" name="sesi" class="form-control" value="<?php echo $sesi;?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Sesi Mulai</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="mulai" class="form-control" value="<?php echo $jadwal_mulai;?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Sesi Selesai</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="selesai" class="form-control" value="<?php echo $jadwal_selesai?>">
            </div>
          </div>
        </div>
        <!-- modal body end -->
        <!-- modal footer start -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="update-jadwal">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
        <!-- modal footer end -->
      </div>
    </div>
  </form>
</div>

<!-- Modal Edit User End -->

<!-- Modal Delete User Start -->

<div class="modal fade" id="delete<?php echo $id;?>">
  <form action="../../fungsi/jadwal_manage.php" method="post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Delete User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="delete_id" value="<?php echo $id?>">
          <div class="alert alert-danger"> <p> Delete Jadwal "<strong><?php echo $sesi;?>" ? </p> </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="delete">Konfirmasi</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </form>
</div>

<!-- Modal Delete User end -->
<?php
}
echo "</tbody>";
?>

<!-- Modal Add Jadwal Start -->

<div class="modal fade" id="addjadwal">
  <form class="form-horizontal" method="post" action="../../fungsi/jadwal_manage.php">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <!-- modal header start -->
        <div class="modal-header">
          <h4>Tambah Jadwal Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- modal header end -->
        <!-- modal body start -->
        <div class="modal-body">
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Sesi</label>
            </div>
            <div class="col-sm-4">
              <input type="text" name="sesi" class="form-control" placeholder="Masukkan Sesi">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Sesi Mulai</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="mulai" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Sesi Selesai</label>
            </div>
            <div class="col-sm-4">
              <input type="date" name="selesai" class="form-control">
            </div>
          </div>
        </div>
        <!-- modal body end -->
        <!-- modal footer start -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="add-jadwal">Tambah Jadwal</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
        <!-- modal footer end -->
      </div>
    </div>
  </form>
</div>

<!-- Modal Add User End -->

<div>
  <button type="button" class="btn btn-primary btn-sm" data-target="#addjadwal" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Jadwal</button>
  <br>
</div>
