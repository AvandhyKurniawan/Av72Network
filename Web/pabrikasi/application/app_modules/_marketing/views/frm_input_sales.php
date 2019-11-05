<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $Data['Title']; ?></h1>
      <ol class="breadcrumb">
        <i class="fa fa-link" aria-hidden="true"></i>&nbsp;
        <li><?php echo $Link["Segment1"]; ?></li>
        <li><?php echo $Link["Segment2"]; ?></li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Input Form</h3>
        </div>
        <div class="box-body">
          <div class="col-md-4">
            <i class="fa fa-square text-red"> Kolom berwarna kuning harus diisi.</i>
          </div>
          <div class="callout col-md-8 fade" id="notifInput">
            <center>
              <label id="notifInputText">Data Berhasil Di Simpan</label>
            </center>
          </div>
          <div class="col-md-4">
            <input type="hidden" id="txtIdSales">
            <table class="table table-responsive" style="margin-bottom:0;">
              <tr>
                <td width="10%">Kode Sales</td>
                <td width="1%">:</td>
                <td>
                  <div class="form-group has-warning" id="fgKodeSales">
                    <input type="text" id="txtKodeSales" class="form-control" placeholder="Masukan Kode Sales" onkeyup="cekKodeSales(this);">
                    <label for="txtKodeSales" id="lblWarning" class="text-red fade">Kode Sales Sudah Digunakan</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>
                  <div class="form-group has-warning">
                    <input type="text" id="txtNamaLengkap" class="form-control" placeholder="Masukan Nama Lengkap">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                  <div class="form-group has-warning">
                    <label>
                      <input type="radio" name="rbJenkel" value="Pria" checked> Pria
                    </label>
                    &nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="rbJenkel" value="Wanita"> Wanita
                    </label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>No. Telp. / HP.</td>
                <td>:</td>
                <td>
                  <div class="form-group has-warning">
                    <input type="number" id="txtNoTelp" class="form-control" placeholder="Masukan No.Telp. / HP.">
                  </div>
                </td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                  <div class="form-group">
                    <textarea id="txtAlamat" rows="5" cols="80" class="form-control" placeholder="Masukan Alamat Sales"></textarea>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <div class="form-group">
                    <button type="button" id="btnSimpan" class="btn btn-md btn-primary btn-flat" onclick="saveDataSales();"><i class="fa fa-check"></i> Simpan</button>
                    <button type="button" class="btn btn-md btn-danger btn-flat" onclick="resetFormSales();"><i class="fa fa-remove"></i> Batal</button>
                  </div>
                </td>
              </tr>
            </table>
          </div>

          <div class="col-md-8">
            <h4 class="text-blue">Daftar Sales</h4>
            <div class="table-responsive">
              <table class="table table-responsive table-striped" id="tableDataSales">
                <thead>
                  <th>No.</th>
                  <th>Kode Sales</th>
                  <th>Nama Lengkap</th>
                  <th>Jenis Kelamin</th>
                  <th>No.Telp / HP.</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </thead>
              </table>
            </div>
          </div>
        </div>

        <div class="box-footer">
        </div>
      </div>
    </section>

</div>
