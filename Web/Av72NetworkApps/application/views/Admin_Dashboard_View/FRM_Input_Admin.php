<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Administrator Baru</h3>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <div class="col-md-3">
          <label>Nama Lengkap</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <input type="text" id="txtFullName" class="form-control" placeholder="Masukan Nama Lengkap">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-3">
          <label>Nama Pengguna</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <input type="text" id="txtUsername" class="form-control" placeholder="Masukan Nama Pengguna">
          </div>
        </div>
        <div class="col-md-3">
          <label class="text-red fade" id="lblWarningUname">Nama Sudah Digunakan</label>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-3">
          <label>Hak Akses</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <select class="form-control" id="cmbRole">
              <option value="ADMIN">Admin</option>
              <option value="ROOT">Root</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-3">
          <label>Kata Sandi</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <input type="password" id="txtPassword" class="form-control" placeholder="Masukan Kata Sandi" onkeyup="checkLengthPassword(this);">
          </div>
        </div>
        <div class="col-md-3" style="margin:0; padding:0;">
          <label class="text-red fade" id="lblWarningUpass">Kata Sandi Terlalu Pendek</label>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-3">
          <label>Konfirmasi Kata Sandi</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-5" style="margin:0;">
          <div class="form-group">
            <input type="password" id="txtConfirmPassword" class="form-control" placeholder="Ulangi Kata Sandi" onkeyup="comparePassword('txtPassword','txtConfirmPassword');">
          </div>
        </div>
        <div class="col-md-3" style="margin:0; padding:0;">
          <label class="text-red fade" id="lblWarningUconfirm"><i class="fa fa-remove"></i></label>
        </div>
      </div>

      <!-- <div class="col-md-12">
        <div class="col-md-2">
          <label>Foto</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="file" id="photoFile" class="form-control" accept="image/jpeg,image/x-png">
          </div>
        </div>
      </div> -->

      <div class="col-md-9">
        <div class="pull-right">
          <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary" onclick="saveAdministratorData();" data-onclick="saveAdministratorData();">
            <img src="<?= base_url('assets/images/loading_1.svg'); ?>" style="display: none;" width="20px" height="20px;">
            <i class="fa fa-user-plus" style="display: inline-block;"></i> Tambah Baru
          </button>
          <button type="button" class="btn btn-md btn-flat btn-danger" onclick="resetForm();"><i class="fa fa-refresh"></i> Batal</button>
        </div>
      </div>
      <div class="col-md-12">
        <fieldset>
          <legend>Daftar Administrator</legend>
          <div class="col-md-12">
            <table class="table table-responsive table-striped" id="administratorListTable">
              <thead>
                <th width="10%">No.</th>
                <th>Nama Pengguna</th>
                <th>Nama Lengkap</th>
                <th>Hak Akses</th>
                <th>Terakhir Masuk</th>
                <th>Pilihan</th>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </fieldset>
      </div>
    </div>
    <div class="box-footer">

    </div>
  </div>
</div>
