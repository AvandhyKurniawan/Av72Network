<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Paket Internet Baru</h3>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <div class="col-md-2">
          <label>Nama Paket Internet</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtInternetPackage" class="form-control" placeholder="Masukan Nama Paket Internet">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Kecepatan</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtSpeed" class="form-control" placeholder="Masukan Kecepatan">
          </div>
        </div>
        <div class="col-md-3">
          <label class="text-red fade" id="lblWarningUname">Nama Sudah Digunakan</label>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Harga</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtHarga" class="form-control" placeholder="Masukan Harga">
          </div>
        </div>
        <div class="col-md-3">
          <label class="text-red fade" id="lblWarningUpass">Kata Sandi Terlalu Pendek</label>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Tipe Paket Internet</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select class="form-control" id="cmbType"></select>
          </div>
        </div>
        <div class="col-md-3">
          <label class="text-red fade" id="lblWarningUconfirm">Kata Sandi Tidak Sama</label>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Informasi Paket</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <textarea id="txtPackageInformation" class="form-control" placeholder="Masukan Informasi / Promosi Paket" rows="5" cols="80"></textarea>
          </div>
        </div>
        <div class="col-md-3">
          <label class="text-red fade" id="lblWarningUconfirm">Kata Sandi Tidak Sama</label>
        </div>
      </div>

      <div class="col-md-9">
        <div class="pull-right">
          <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button>
          <button type="button" class="btn btn-md btn-flat btn-danger"><i class="fa fa-refresh"></i> Batal</button>
        </div>
      </div>
      <div class="col-md-12">
        <fieldset>
          <legend>Daftar Paket Internet Tersedia</legend>
          <div class="col-md-12">
            <table class="table table-responsive table-striped" id="administratorListTable">
              <thead>
                <th width="10%">No.</th>
                <th>Nama Paket</th>
                <th>Kecepatan</th>
                <th>Harga</th>
                <th>Tipe</th>
                <th>Informasi</th>
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
