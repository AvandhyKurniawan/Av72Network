<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Pegawai Baru</h3>
    </div>
    <div class="box-body">
      <div class="col-md-10">
        <div class="col-md-12">
          <div class="col-md-3">
            <label>ID. Pegawai</label>
            <label class="text-red">*</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <input type="text" id="txtEmployeeId" class="form-control" placeholder="Auto Generate" readonly>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>No. KTP</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <input type="text" id="txtNumberId" class="form-control" placeholder="Masukan Nomor KTP">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>Nama Lengkap</label>
            <label class="text-red">*</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <input type="text" id="txtFullName" class="form-control" placeholder="Masukan Nama Lengkap">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>Jenis Kelamin</label>
            <label class="text-red">*</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <select class="form-control" id="cmbGender">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>Tgl. Lahir</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
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
          <div class="col-md-3">
            <label>No. Telp. / Ponsel</label>
            <label class="text-red">*</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <input type="text" id="txtPhone" class="form-control" placeholder="Masukan No. Telepon / Ponsel">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>No. Telp. / Ponsel Lainnya</label>
            <!-- <label class="text-red">*</label> -->
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <input type="text" id="txtOtherPhone" class="form-control" placeholder="Masukan No. Telepon / Ponsel Lainnya">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>E-mail</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <input type="text" id="txtEmail" class="form-control" placeholder="Masukan E-mail">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>Alamat</label>
            <label class="text-red">*</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <textarea id="txtAddress" class="form-control" placeholder="Masukan Alamat"></textarea>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>Foto</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <input type="file" id="filePhoto" class="form-control" accept="image/jpeg,image/x-png">
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>Tanggal Masuk</label>
            <label class="text-red">*</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <div class="input-group date">
                <input type="text" id="txtJoinDate" class="form-control" placeholder="Pilih Tanggal Masuk" readonly>
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="col-md-3">
            <label>Departemen</label>
            <label class="text-red">*</label>
          </div>
          <div class="col-md-1">
            <label>:</label>
          </div>
          <div class="col-md-8">
            <div class="form-group">
              <select class="form-control" id="cmbDepartment">
              </select>
            </div>
          </div>
        </div>

        <div class="col-md-9">
          <div class="pull-right">
            <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary" onclick="saveEmployeeData();" data-onclick="saveEmployeeData();"><i class="fa fa-user-plus"></i> Tambah Baru</button>
            <button type="button" class="btn btn-md btn-flat btn-danger"><i class="fa fa-refresh"></i> Batal</button>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <div style="float:left; margin-right:10px;">
          <img src="<?= base_url('assets/images/avatar_2x.png'); ?>" class="img-responsive" width="138px" height="138px">
        </div>
      </div>

      <div class="col-md-12">
        <fieldset>
          <legend>Data Pegawai</legend>
          <table class="table table-responsive table-striped" id="employeeListTable">
            <thead>
              <th>ID. Pegawai</th>
              <th>No. KTP</th>
              <th>Nama Lengkap</th>
              <th>Jenis Kelamin</th>
              <th>No.Telp. / Ponsel</th>
              <th>E-mail</th>
              <th>Departemen</th>
              <th>Pilihan</th>
            </thead>
            <tbody>

            </tbody>
          </table>
        </fieldset>
      </div>

    </div>
  </div>
</div>
