<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Paket Internet Baru</h3>
    </div>
    <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">Tab 1</a></li>
            <li><a href="#tab_2-2" data-toggle="tab">Tab 2</a></li>
            <li class="pull-right header"><i class="fa fa-th"></i> Menu Data Pegawai</li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
              <div class="row">
              </div>
            </div><!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2-2">
              <div class="row">
              </div>
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
    
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
            <input type="text" id="txtHarga" class="form-control currency" placeholder="Masukan Harga">
          </div>
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
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Informasi Paket</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <textarea id="txtPackageInformation" class="form-control" placeholder="Masukan Informasi / Promosi Paket" rows="5" cols="80"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="pull-right">
          <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary" onclick="saveInternetPackageData();" data-onclick="saveInternetPackageData();"><i class="fa fa-plus"></i> Tambah Baru</button>
          <button type="button" class="btn btn-md btn-flat btn-danger" onclick="resetForm();"><i class="fa fa-refresh"></i> Batal</button>
        </div>
      </div>
      <div class="col-md-12">
        <fieldset>
          <legend>Daftar Paket Internet Tersedia</legend>
          <div class="col-md-12">
            <table class="table table-responsive table-striped" id="internetPackageListTable">
              <thead>
                <th width="10%">No.</th>
                <th>Nama Paket</th>
                <th>Kecepatan</th>
                <th>Harga</th>
                <th>Tipe</th>
                <th>Informasi</th>
                <th>Diperbarui</th>
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
