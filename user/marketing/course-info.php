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
        <th>No Regis</th>
        <th>Jenis Peserta</th>
        <th>Nama Peserta</th>
        <th>Email Peserta</th>
        <th>no.telp</th>
        <th>alamat</th>
        <th>Instansi</th>
        <th>Schedule</th>
        <th>Lokasi</th>
        <th>Tools</th>
        <th><i class="fa fa-cog"></i></th>
        <th>Payment Term</th>
        <th>Status</th>
      </tr>
    </thead>

    <tbody>
    <?php if (mysqli_num_rows($query)>0) {?>
    <?php $no=1;
      while ($data = mysqli_fetch_array($query)){
     ?>
      <tr>
        <td><?php echo $no ?></td>
        <td><?php echo $data['peserta_jenis'];?></td>
        <td><?php echo $data["peserta_nama"];?></td>
        <td><?php echo $data["peserta_email"];?></td>
        <td><?php echo $data["peserta_telp"];?></td>
        <td><?php echo $data["peserta_alamat"];?></td>
        <td>Pt. Showbiz</td>
        <td>Sesi 1(23 Aug 18 - 23 Sep 18)</td>
        <td>Ebiz</td>
        <td>Softcopy</td>
        <td>
          <button type="button" class="edit btn btn-danger btn-sm" data-toggle="modal" data-target="#mEdit"><i class="fa fa-pen"></i> Edit</button>
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
      <?php } ?>
<!--       <tr>
        <td>123</td>
        <td>Instansi</td>
        <td>PT. Minyak Telon</td>
        <td>
          <button type="button" class="edit btn btn-danger btn-sm" data-toggle="modal" data-target="#mEdit"><i class="fa fa-pen"></i> Edit</button>
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
      </tr> -->
    </tbody>

  </table>
<!-- table end -->

<!-- modal start -->
  <div class="modal fade" id="mEdit">
    <div class="modal-dialog">
      <div class="modal-content">


        <div class="modal-header">
          <h4 class="modal-tittle">Registrasi No. 0123</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="edit_user_id" value="<?php echo $id?>">
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Jenis Peserta</label>
            </div>
            <div class="col-sm-6">
              <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
            </div>
          </div>
        <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Nama Peserta</label>
            </div>
            <div class="col-sm-6">
              <input type="text" name="password" class="form-control" value="<?php echo $password;?>">
            </div>
          </div>
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Email Peserta</label>
            </div>
            <div class="col-sm-6">
              <input type="text" readonly class="form-control" value="<?php echo $level?>">
            </div>
          </div>
        <div class="form-row">
          <div class="col-sm-3">
            <label class="control-label">No.Telepon</label>
          </div>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" value="<?php echo $level?>">
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-3">
            <label class="control-label">Alamat</label>
          </div>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" value="<?php echo $level?>">
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-3">
            <label class="control-label">Instansi</label>
          </div>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" value="<?php echo $level?>">
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-3">
            <label class="control-label">Lokasi</label>
          </div>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" value="<?php echo $level?>">
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-3">
            <label class="control-label">Toolss</label>
          </div>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control" value="<?php echo $level?>">
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit Data</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>

      </div>
    </div>
  </div>
  <!-- modal end -->
      </div>
    </div>
  </form>
</div>

<!-- Modal Edit User End -->


</div>
