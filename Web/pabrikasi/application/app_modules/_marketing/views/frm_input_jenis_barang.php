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
            <input type="hidden" id="txtIdJenis">
            <table class="table table-responsive" style="margin-bottom:0;">
              <tr>
                <td width="10%">Kode Jenis</td>
                <td width="1%">:</td>
                <td>
                  <div class="form-group has-warning" id="fgKodeJenis">
                    <input type="text" id="txtKodeJenis" class="form-control" placeholder="Masukan Kode Jenis Barang" onkeyup="cekKodeJenisBarang(this);">
                    <label for="txtKodeJenis" id="lblWarning" class="text-red fade">Kode Jenis Sudah Digunakan</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Nama Jenis</td>
                <td>:</td>
                <td>
                  <div class="form-group has-warning" id="fgNamaJenis">
                    <input type="text" id="txtNamaJenis" class="form-control" placeholder="Masukan Nama Jenis Barang">
                    <label for="txtNamaJenis" id="lblWarningNama" class="text-red fade">Nama Jenis Sudah Digunakan</label>
                  </div>
                </td>
              </tr>
              <tr>
                <td>Ket. Jenis</td>
                <td>:</td>
                <td>
                  <div class="form-group has-warning">
                    <textarea id="txtKetJenis" rows="5" cols="80" class="form-control" placeholder="Masukan Keterangan Barang"></textarea>
                  </div>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td>
                  <div class="form-group">
                    <button type="button" id="btnSimpan" class="btn btn-md btn-primary btn-flat" onclick="saveDataJenisBarang();"><i class="fa fa-check"></i> Simpan</button>
                    <button type="button" class="btn btn-md btn-danger btn-flat" onclick="resetFormJenis();"><i class="fa fa-remove"></i> Batal</button>
                  </div>
                </td>
              </tr>
            </table>
          </div>

          <div class="col-md-8">
            <h4 class="text-blue">Daftar Jenis Barang</h4>
            <div class="table-responsive">
              <table class="table table-responsive table-striped" id="tableDataJenisBarang">
                <thead>
                  <th>No.</th>
                  <th>Kode Jenis</th>
                  <th>Nama Jenis</th>
                  <th>Keterangan Jenis</th>
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