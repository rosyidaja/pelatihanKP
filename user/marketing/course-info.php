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
        <th>Jenis Pelatihan</th>
        <th><i class="fa fa-cog"></i></th>
        <th>Payment Term</th>
        <th>Status</th>
      </tr>
    </thead>

    <tbody>
      <tr>
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
      </tr>
      <tr>
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
      </tr>
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
