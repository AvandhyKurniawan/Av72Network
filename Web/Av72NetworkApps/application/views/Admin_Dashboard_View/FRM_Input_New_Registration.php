<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Pelanggan Baru</h3>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <div class="col-md-2">
          <label>No. Registrasi</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtClientId" class="form-control" placeholder="Auto Generate" readonly>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Nama Lengkap</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtFullName" class="form-control" placeholder="Masukan Nama Lengkap Pelanggan">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Jenis Kelamin</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
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
        <div class="col-md-6">
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
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
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
        <div class="col-md-6">
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
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtEmail" class="form-control" placeholder="Masukan E-mail Pelanggan">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Alamat</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <textarea id="txtAddress" class="form-control" placeholder="Masukan Alamat Pelanggan" rows="5" cols="80"></textarea>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Paket Internet</label>
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
          <label>Tanggal Registrasi</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
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
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" id="txtRegistrationFee" class="form-control number" placeholder="Masukan Biaya Registrasi">
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="col-md-2">
          <label>Sales</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select class="form-control" id="cmbSales">

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
        <div class="col-md-6">
          <div class="form-group">
            <textarea id="txtRegistrationInformation" class="form-control" rows="5" cols="80" placeholder="Masukan Keterangan Jika Status Tunda / Batal"></textarea>
          </div>
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
          <legend>Daftar Pelanggan</legend>
          <div class="col-md-12">
            <table class="table table-responsive table-striped" id="administratorListTable">
              <thead>
                <th width="1%">No.</th>
                <th>Nama Pelanggan</th>
                <th>Nama Paket</th>
                <th>Tanggal Registrasi</th>
                <th>Pajak</th>
                <th>Selesai Masa Percobaan</th>
                <th>Biaya Registrasi</th>
                <th>Status</th>
                <th>Keterangan</th>
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
