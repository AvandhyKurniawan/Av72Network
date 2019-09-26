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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h4 class="text-blue">Permintaan Barang</h4>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-responsive table-striped" id="tableDataPermintaan">
                <thead>
                  <th>No.</th>
                  <th>Kode Permintaan</th>
                  <th>Tanggal Permintaan</th>
                  <th>Status Permintaan</th>
                  <th>Jenis Permintaan</th>
                  <th>Pengguna</th>
                  <th>Action</th>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">

        </div>
      </div>

      <div class="box box-primary">
        <div class="box-header with-border">
          <h4 class="text-blue">Permintaan Sparepart</h4>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <table class="table table-responsive table-striped" id="tableDataPermintaanSparepart">
                <thead>
                  <th>No.</th>
                  <th>Kode Permintaan</th>
                  <th>Tanggal Permintaan</th>
                  <th>Status Permintaan</th>
                  <th>Pengguna</th>
                  <th>Action</th>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="box-footer">

        </div>
      </div>

      <div class="modal fade" id="modalLihatPesanan" role="dialog" tabindex="-1">
        <div class="modal-dialog" style="width:100%; height:100%; margin:0; padding:0;">
          <div class="modal-content" style="width:100%; height:100%;">
            <div class="modal-header">
              <button type="button" id="btnCloseDetailPermintaan" class="close" data-dismiss="modal" data-target="#modalLihatPesanan">&times;</button>
              <h4 class="text-blue">Detail Permintaan</h4>
            </div>
            <div class="modal-body" style="height:80%; overflow-y:scroll;">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-responsive table-striped" id="tableDetailPermintaan">
                    <thead>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Warna</th>
                      <th>Jumlah Permintaan</th>
                      <th>Keterangan</th>
                      <th>Status Permintaan</th>
                      <th>Action</th>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-md btn-flat btn-success" id="btnSetujuiPermintaanBarang"><i class="fa fa-check"></i> Setujui</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalBatalPermintaan" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modalBatalPermintaan">&times;</button>
              <h4 class="text-blue">Pembatalan Permintaan</h4>
            </div>
            <div class="modal-body">
              <table class="table table-responsive">
                <tr>
                  <td width="20%">Keterangan</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="form-group has-warning">
                      <textarea id="txtKeteranganPurchasing" class="form-control" rows="5" cols="50" placeholder="Masukan Keterangan Pembatalan"></textarea>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnBatalPermintaan" class="btn btn-md btn-flat btn-danger"><i class="fa fa-remove"></i> Batalkan Permintaan</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalAktifkanPermintaan" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modalAktifkanPermintaan">&times;</button>
              <h4 class="text-blue">Aktikan Permintaan Kembali</h4>
            </div>
            <div class="modal-body">
              <table class="table table-responsive">
                <tr>
                  <td width="20%">Status Permintaan</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="form-group has-warning">
                      <select class="form-control" id="cmbStatusPermintaan">
                        <option value="PENDING">PENDING</option>
                        <option value="PROGRESS">PROGRESS</option>
                      </select>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnAktifkanPermintaan" class="btn btn-md btn-flat btn-success"><i class="fa fa-check"></i> Aktifkan</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalInputPenerimaanBarang" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" id="btnClosePenerimaanBarang" class="close" data-dismiss="modal" data-target="#modalInputPenerimaanBarang">&times;</button>
              <h4 class="text-blue">Input Penerimaan Barang</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-responsive">
                    <tr>
                      <td width="20%">Nama Supplier</td>
                      <td width="1%">:</td>
                      <td>
                        <div class="form-group has-warning">
                          <input type="text" id="txtNamaSupplier" class="form-control" placeholder="Masukan Nama Supplier">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Tanggal Penerimaan</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <div class="input-group date">
                            <input type="text" id="txtTglTerima" class="form-control" placeholder="Masukan Tanggal Penerimaan" readonly>
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr id="trJumlahPermintaan" style="display:none;">
                      <td>Jumlah Penerimaan</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <input type="text" id="txtJumlahPenerimaan" class="form-control number" placeholder="Masukan Jumlah Penerimaan">
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnTerima" class="btn btn-md btn-success btn-flat"><i class="fa fa-check"></i> Terima</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalTambahPembelianBahanBaru" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modalTambahPembelianBahanBaru">&times;</button>
              <h4 class="modal-title text-primary" id="modalTambahPembelianBahanBaruTitle">Tambah Pembelian Bahan Baku Baru</h4>
            </div>
            <div class="modal-body" style="height:500px; overflow-y:scroll;">
              <fieldset>
                <legend id="modalTambahPembelianBahanBaruLegend">Formulir Permintaan Pembelian Bahan Baku</legend>
                <input type="hidden" id="txtKdPermintaan">
                <input type="hidden" id="txtTanggalBeli">
                <table class="table table-responsive">
                  <!-- <tr>
                    <td width="20%">Kode Permintaan</td>
                    <td width="1%">:</td>
                    <td>
                      <div class="form-group has-warning">
                        <input type="text" id="txtKdPermintaan" class="form-control" placeholder="Masukan Kode Permintaan" readonly>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%">Tanggal</td>
                    <td width="1%">:</td>
                    <td>
                      <div class="form-group has-warning">
                        <div class="input-group date">
                          <input type="text" class="form-control" id="txtTanggalBeli" placeholder="Masukan Tanggal Pembelian" readonly>
                          <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr> -->
                  <!-- <tr>
                    <td>Nama Customer</td>
                    <td>:</td>
                    <td>
                      <div class="form-group has-warning">
                        <input type="text" class="form-control" id="txtNamaCustomer" placeholder="Masukan Nama Customer" maxlength="100">
                      </div>
                    </td>
                  </tr> -->
                  <tr>
                    <td>Kode Barang</td>
                    <td>:</td>
                    <td>
                      <div class="form-group has-warning">
                        <select class="form-control" id="cmbGudangBahan"></select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Nama Bahan Baku</td>
                    <td>:</td>
                    <td>
                      <div class="form-group has-warning">
                        <input type="text" id="txtNamaBahan" class="form-control" placeholder="Akan Muncul Otomatis Saat Bahan Baku Sudah Dipilih" readonly>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Jumlah Pembelian</td>
                    <td>:</td>
                    <td>
                      <div class="form-group has-warning">
                        <input type="text" class="form-control number" id="txtJumlahPermintaan" placeholder="Masukan Jumlah Pembelian">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>
                      <div class="form-group">
                        <textarea id="txtKeterangan" class="form-control" rows="5" cols="50"></textarea>
                      </div>
                    </td>
                  </tr>
                </table>
                <button type="button" class="btn btn-md btn-flat btn-primary pull-right" id="btnSimpanPembelian">Simpan</button>
                <button type="button" class="btn btn-md btn-flat btn-warning pull-right" onclick="resetFormPembelian('BAHAN BAKU');">Batal</button>
                <small class="text-red">
                  Note : 1. Kolom Berwarna Kuning Tidak Boleh Kosong <br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         2. Jika Tidak Ingin Mengubah Barang Maka Kolom Kode Barang Dikosongkan Saja
                </small>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
