<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Departemen Baru</h3>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <div class="col-md-2">
          <label>Nama Departemen</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtDepartmentName" class="form-control" placeholder="Masukan Nama Departemen">
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="pull-right">
          <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary" onclick="saveDepartmentData();" data-onclick="saveDepartmentData();">
            <img src="<?= base_url('assets/images/loading_1.svg'); ?>" style="display: none;" width="20px" height="20px;">
            <i class="fa fa-plus" style="display: inline-block;"></i> Tambah Baru
          </button>
          <button type="button" class="btn btn-md btn-flat btn-danger" onclick="resetForm();"><i class="fa fa-refresh"></i> Batal</button>
        </div>
      </div>
      <div class="col-md-12">
        <fieldset>
          <legend>Daftar Departemen</legend>
          <div class="col-md-12">
            <table class="table table-responsive table-striped" id="departmentListTable">
              <thead>
                <th width="10%">No.</th>
                <th>Nama Departemen</th>
                <th>Diperbarui Pada</th>
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
