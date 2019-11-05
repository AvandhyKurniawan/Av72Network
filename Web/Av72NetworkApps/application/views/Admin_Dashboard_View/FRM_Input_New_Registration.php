<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Pelanggan Baru</h3>
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
          <label>No. Registrasi</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtClientId" class="form-control" placeholder="Auto Generate" readonly>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>No. Id Dari Isp</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtIspParentId" class="form-control" placeholder="Masukan Id Dari Isp Induk">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>No. KTP / NPWP</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtNumberId" class="form-control" placeholder="Masukan No.Ktp / NPWP Pelanggan">
          </div>
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="col-md-2">
          <label>Nama Lengkap</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtFullName" class="form-control" placeholder="Masukan Nama Lengkap Pelanggan">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Jenis Kelamin</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <select class="form-control" id="cmbGender">
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Tgl. Lahir</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <div class="input-group date">
              <input type="text" id="txtBirthday" class="form-control" placeholder="Pilih Tanggal Lahir" readonly>
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>No. Telp. / Ponsel</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtTelp" class="form-control" placeholder="Masukan No. Telepon / Ponsel Pelanggan">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>No. Telp. / Ponsel Lain</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtTelpLain" class="form-control" placeholder="Masukan No. Telepon / Ponsel Pelanggan Lain">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>E-mail</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtEmail" class="form-control" placeholder="Masukan E-mail Pelanggan">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Alamat</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <textarea id="txtAddress" class="form-control" placeholder="Masukan Alamat Pelanggan" rows="5" cols="80"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Paket Internet</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select class="form-control" id="cmbInternetPackage">

            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Harga Paket Internet</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control currency" id="txtPrice" placeholder="Harga Paket Internet" readonly>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Tanggal Registrasi</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <div class="input-group date">
              <input type="text" id="txtRegistrationDate" class="form-control" placeholder="Pilih Tanggal Registrasi" readonly>
              <div class="input-group-addon">
                <span class="fa fa-calendar"></span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Biaya Registrasi</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtRegistrationFee" class="form-control currency" placeholder="Masukan Biaya Registrasi">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Kepemilikan Perangkat</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <select class="form-control" id="cmbDeviceStatus">
              <option value="">== Pilih Status Kepemilikan Perangkat ==</option>
              <option value="SEWA">Sewa</option>
              <option value="BELI">Beli</option>
            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Harga Perangkat</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" id="txtDevicePrice" class="form-control currency" placeholder="Masukan Harga Perangkat">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Sales</label>
          <label class="text-red">*</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select class="form-control" id="cmbEmployee">

            </select>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Keterangan</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <textarea id="txtRegistrationInformation" class="form-control" rows="5" cols="80" placeholder="Masukan Keterangan Jika Status Tunda / Batal"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="pull-right">
          <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary" onclick="saveClientRegistrationData();" data-onclick="saveClientRegistrationData();"><i class="fa fa-plus"></i> Tambah Baru</button>
          <button type="button" class="btn btn-md btn-flat btn-danger" onclick="resetForm();"><i class="fa fa-refresh"></i> Batal</button>
        </div>
      </div>
      <div class="col-md-12">
        <fieldset>
          <legend>Daftar Pelanggan</legend>
          <div class="col-md-12">
            <table class="table table-responsive table-striped" id="customerListTable">
              <thead>
                <th width="1%">No.</th>
                <th>No. Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Kelamin</th>
                <th>Nama Paket</th>
                <th>Tanggal Registrasi</th>
                <th>No. Telpon</th>
                <th>Status</th>
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

  <div class="modal fade" id="modalDetailData" role="dialog" tabindex="-1" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" data-dismiss="modal" data-target="#modalDetailData">&times</button>
          <h4 class="modal-title">Detail Data</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div id="modalContentContainer"></div>
          </div>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
</div>
