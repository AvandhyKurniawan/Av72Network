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
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-4">
                <i class="fa fa-square text-red"> Semua Kolom Tidak Boleh Kosong</i>
              </div>
              <table class="table table-responsive" id="tableFormInputKomisi">
                <input type="hidden" id="txtIdTransaksi">
                <input type="hidden" id="txtIdSales">
                <input type="hidden" id="txtIdJenis">
                <input type="hidden" id="txtKdGdHasil">
                <tr>
                  <td width="10%">Kode Sales</td>
                  <td width="1%">:</td>
                  <td>
                    <div class="form-group has-warning">
                      <select class="form-control" id="cmbKodeSales">

                      </select>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Nama Sales</td>
                  <td>:</td>
                  <td>
                    <div class="form-group has-warning">
                      <input type="text" class="form-control" id="txtNamaSales" placeholder="Masukan Nama Sales" readonly>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Tanggal Order</td>
                  <td>:</td>
                  <td>
                    <div class="form-group has-warning">
                      <div class="input-group date">
                        <input type="text" class="form-control date" id="txtTglOrder" autocomplete="off" placeholder="Pilih Tanggal Pemesanan">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Nama Pelanggan</td>
                  <td>:</td>
                  <td>
                    <div class="form-group has-warning">
                      <input type="text" class="form-control" id="txtNamaPelanggan" placeholder="Masukan Nama Pelanggan">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Kode Order</td>
                  <td>:</td>
                  <td>
                    <div class="form-group has-warning">
                      <input type="text" class="form-control" id="txtKodeOrder" placeholder="Masukan Kode Order">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Ukuran</td>
                  <td>:</td>
                  <td>
                    <div class="form-group has-warning">
                      <select class="form-control" id="cmbUkuran">

                      </select>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Merek</td>
                  <td>:</td>
                  <td>
                    <div class="form-group has-warning">
                      <input type="text" class="form-control" id="txtMerek" placeholder="Masukan Nama Merek" readonly>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Jumlah</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control number" id="txtJumlahKg" placeholder="Masukan Jumlah Berat" style="float:left">
                        <span class="input-group-addon">KG</span>
                      </div>
                    </div>
                  </td>
                  <!-- <td>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control number" id="txtJumlahLembar" placeholder="Masukan Jumlah Lembar" style="float:left">
                        <span class="input-group-addon">Lembar</span>
                      </div>
                    </div>
                  </td> -->
                  <td>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control number" id="txtJumlahBal" placeholder="Masukan Jumlah Bal" style="float:left">
                        <span class="input-group-addon">Bal</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Jenis Barang</td>
                  <td>:</td>
                  <td>
                    <div class="form-group has-warning">
                      <select class="form-control" id="cmbJenisBarang">

                      </select>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Harga Satuan</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <select class="form-control" id="cmbJenisHargaSatuan" onchange="gantiJenisHarga();">
                        <option value="KG">Kg</option>
                        <option value="Lembar">Lembar</option>
                        <option value="Pack">Pack</option>
                      </select>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control number" id="txtHarga" placeholder="Masukan Harga" style="float:left">
                        <span class="input-group-addon" id="spanHarga">KG</span>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Potongan</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control number" id="txtPotongan" placeholder="Masukan Potongan Harga">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Diskon</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control number" id="txtDiscount" placeholder="Masukan Diskon" onkeyup="hitungHargaDiskon();">
                        <span class="input-group-addon">%</span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control number" id="txtHasilDiscount" placeholder="Hasil Diskon" readonly>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Lembar 5%</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control number" id="txtLembar5" placeholder="Masukan Lembar 5%" onkeyup="hitungHargaDiskon()">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Lembar 2%</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control number" id="txtLembar2" placeholder="Masukan Lembar 2%" onkeyup="hitungHargaDiskon()">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Lembar 1%</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control number" id="txtLembar1" placeholder="Masukan Lembar 1%" onkeyup="hitungHargaDiskon()">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Lembar 0.8%</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control number" id="txtLembar8" placeholder="Masukan Lembar 0.8%" onkeyup="hitungHargaDiskon()">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Lembar 0.5%</td>
                  <td>:</td>
                  <td>
                    <div class="form-group">
                      <input type="text" class="form-control number" id="txtLembar05" placeholder="Masukan Lembar 0.5%" onkeyup="hitungHargaDiskon()">
                    </div>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="form-group">
                      <button type="button" id="btnSimpan" class="btn btn-md btn-primary btn-flat" onclick="saveTransaksiKomisiSales();"><i class="fa fa-check"></i> Simpan</button>
                      <button type="button" class="btn btn-md btn-danger btn-flat" onclick="resetFormKomisi();"><i class="fa fa-remove"></i> Batal</button>
                    </div>
                  </td>
                </tr>
              </table>
              <div class="col-md-12">
                <div class="col-md-4">
                  <h4 class="text-blue pull-left">Data Order Sales</h4>
                </div>
                <div class="callout col-md-8 fade" id="notifInput">
                  <center>
                    <label id="notifInputText">Data Berhasil Di Simpan</label>
                  </center>
                </div>
              </div>
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-responsive table-striped table-bordered" id="tableDataKomisiPending">
                    <thead>
                      <th>No</th>
                      <th>Kode Order</th>
                      <th>Tanggal</th>
                      <th>Nama Pelanggan</th>
                      <th>Berat</th>
                      <th>Ukuran</th>
                      <th>Merek</th>
                      <th>Harga</th>
                      <th>Diskon</th>
                      <th>Potongan</th>
                      <th>Lembar 5%</th>
                      <th>Lembar 2%</th>
                      <th>Lembar 1%</th>
                      <th>Lembar 0.8%</th>
                      <th>Lembar 0.5%</th>
                      <th>Jumlah Lembar 5%</th>
                      <th>Jumlah Lembar 2%</th>
                      <th>Jumlah Lembar 1%</th>
                      <th>Jumlah Lembar 0.8%</th>
                      <th>Jumlah Lembar 0.5%</th>
                      <th>Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 10px;">
                <button type="button" class="btn btn-md btn-flat btn-success pull-right" onclick="selesaiInputTransaksiKomisiSales();"><i class="fa fa-check"></i> Selesai</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" role="dialog" id="modal-lihat-detail-pesanan">
        <div class="modal-dialog modal-lg" style="height:100%; width: 100%; margin:0; padding:0;">
          <div class="modal-content" style="height:100%; width: 100%;">
            <div class="modal-header">
              <button type='button' class='close' data-dismiss='modal' data-target="#modal-lihat-detail-pesanan" aria-label='Close'><span aria-hidden='true'>&times;</span></button>
              <center>
                <h3 class="text-primary"><b>Klip Plastik</b></h3>
                <p>
                  <b>
                    Jl.Yos Sudarso No.115A (Daan Mogot Km.19) Batu Ceper<br>
                    Kota Tangerang<br>
                    Telp.021-551-8899 | Fax.021-551-3905
                  </b>
                </p>
              </center>
            </div>
            <div class="modal-body" style="height:65%; overflow-y:scroll;">
              <div class="row">
                <div class="col-md-6">
                  <table class="table table-responsive">
                    <tr>
                      <td width="20%">No. Order</td>
                      <td width="1%">:</td>
                      <td id="td_no_order"></td>
                    </tr>
                    <tr>
                      <td>Nama Perusahaan</td>
                      <td>:</td>
                      <td id="td_nm_perusahaan"></td>
                    </tr>
                    <tr>
                      <td>Nama Owner</td>
                      <td>:</td>
                      <td id="td_nm_owner"></td>
                    </tr>
                    <tr>
                      <td>Nama Pemesan</td>
                      <td>:</td>
                      <td id="td_nm_pemesan"></td>
                    </tr>
                    <tr>
                      <td>Nama Purchasing</td>
                      <td>:</td>
                      <td id="td_nm_purchasing"></td>
                    </tr>
                  </table>
                </div>

                <div class="col-md-6">
                  <table class="table table-responsive">
                    <tr>
                      <td width="20%">Tgl. Pesan</td>
                      <td width="1%">:</td>
                      <td id="td_tgl_pesan"></td>
                    </tr>
                    <tr>
                      <td>Tgl. Estimasi</td>
                      <td>:</td>
                      <td id="td_tgl_estimasi"></td>
                    </tr>
                    <tr>
                      <td>Term Payment</td>
                      <td>:</td>
                      <td id="td_term_payment"></td>
                    </tr>
                    <tr>
                      <td>Proof</td>
                      <td>:</td>
                      <td id="td_proof"></td>
                    </tr>
                    <tr>
                      <td>Expedisi</td>
                      <td>:</td>
                      <td id="td_expedisi"></td>
                    </tr>
                  </table>
                </div>

                <div class="col-md-12">
                  <table class="table table-responsive table-striped" id="tabel-lihat-pesanan-detail">
                    <thead>
                      <tr>
                        <th rowspan="2" style="vertical-align:middle;">Jumlah</th>
                        <th rowspan="2" style="vertical-align:middle;">Sisa</th>
                        <th rowspan="2" style="vertical-align:middle;">Ukuran</th>
                        <th rowspan="2" style="vertical-align:middle;">Harga</th>
                        <th rowspan="2" style="vertical-align:middle;">Merek</th>
                        <th colspan="2"><center>Warna</center></th>
                        <th rowspan="2" style="vertical-align:middle;">SM</th>
                        <th rowspan="2" style="vertical-align:middle;">DLL</th>
                        <th rowspan="2" style="vertical-align:middle;">Kode Harga</th>
                        <th colspan="2" style="vertical-align:middle;"><center>Omset</center></th>
                        <th rowspan="2" style="vertical-align:middle;">Status Pesanan</th>
                        <th rowspan="2" style="vertical-align:middle;">Status Kirim</th>
                      </tr>
                      <tr>
                        <th><center>Plastik</center></th>
                        <th><center>Cetak</center></th>
                        <th><center>Kg</center></th>
                        <th><center>Lembar</center></th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <p id="last-update" class="pull-right">Last Update : </p>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modal-detail-customer" role="dialog">
        <div class="modal-dialog modal-lg" style="height:100%; width: 100%; margin:0; padding:0;">
          <div class="modal-content" style="height:100%; width: 100%;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modal-detail-customer">&times;</button>
              <h3 class="modal-title">Data Customer</h3>
            </div>
            <div class="modal-body" style="height:83%;overflow-y:scroll;">
              <div class="row">
                <div class="col-md-6">
                  <table class="table table-responsive">
                    <tr>
                      <td width="15%">Kode Customer</td>
                      <td width="1%">:</td>
                      <td id="td_kd_cust"></td>
                    </tr>
                    <tr>
                      <td>Nama Perusahaan</td>
                      <td>:</td>
                      <td id="td_nm_perusahaan1"></td>
                    </tr>
                    <tr>
                      <td>Nama Owner</td>
                      <td>:</td>
                      <td id="td_nm_owner1"></td>
                    </tr>
                    <tr>
                      <td>Nama Purchasing</td>
                      <td>:</td>
                      <td id="td_nm_purchasing1"></td>
                    </tr>
                    <tr>
                      <td>No.telp</td>
                      <td>:</td>
                      <td id="td_no_telp"></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td id="td_alamat"></td>
                    </tr>
                  </table>
                </div><!--col-md-6_FIRST-->
                <div class="col-md-6">
                  <table class="table table-responsive">
                    <tr>
                      <td width="15%">Kota/ Provinsi/ Negara</td>
                      <td width="1%">:</td>
                      <td id="td_kota_prov_negara"></td>
                    </tr>
                    <tr>
                      <td>Kode Pos</td>
                      <td>:</td>
                      <td id="td_kd_pos"></td>
                    </tr>
                    <tr>
                      <td>No.Fax</td>
                      <td>:</td>
                      <td id="td_no_fax"></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td id="td_email"></td>
                    </tr>
                    <tr>
                      <td>Website</td>
                      <td>:</td>
                      <td id="td_website"></td>
                    </tr>
                    <tr>
                      <td>Note</td>
                      <td>:</td>
                      <td>
                        <div style="width:100%;height:150px;overflow-x:scroll;overflow-y:scroll;" id="td_note">

                        </div>
                      </td>
                    </tr>
                  </table>
                </div><!--col-md-6_SECOND-->
                <div class="col-md-12">
                  <fieldset>
                    <legend>Produk Servis</legend>
                    <table class="table table-responsive table-striped" id="table-product-service">
                      <thead>
                        <th>Produk</th>
                        <th>Ukuran</th>
                        <th>Harga</th>
                        <th>Term Payment</th>
                        <th>Merek</th>
                        <th>Gambar</th>
                        <th>Pilihan</th>
                      </thead>
                    </table>
                  </fieldset>
                </div>
              </div><!--row-->
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal-note" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modal-note">&times;</button>
              <h3 class="modal-title">Note</h3>
            </div>
            <div class="modal-body">
              <div id="note-wrapper"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
