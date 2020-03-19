<style media="screen">
html {
    font-family: verdana;
    font-size: 10pt;
    line-height: 25px;
}
#tableLaporanDataKomisi {
    border-collapse: collapse;
    width: 100%;
    overflow-x: scroll;
    display: block;
}
#tableLaporanDataKomisi thead {
    background-color: #EFEFEF;
}
#tableLaporanDataKomisi thead, #tableLaporanDataKomisi tbody {
    display: block;
}
#tableLaporanDataKomisi tbody {
    overflow-y: scroll;
    overflow-x: hidden;
    height: 500px;
}
#tableLaporanDataKomisi td, #tableLaporanDataKomisi th {
    min-width: 170px;
    height: 25px;
    overflow:hidden;
    text-overflow: nowrap;
    max-width: 170px;
}
</style>
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
          <div class="col-md-4">
            <button type="button" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modalSearchLaporanKomisi" data-backdrop="static" onclick="modalSearchLaporanKomisi()">
              <i class="fa fa-search"></i> Cari Laporan
            </button>
          </div>
          <div class="callout col-md-8 fade" id="notifInput">
            <center>
              <label id="notifInputText">Data Berhasil Di Simpan</label>
            </center>
          </div>
        </div>
        <div class="box-body">
          <div id="laporan" style="display:none;">
            <div class="col-md-6">
              <table class="table table-responsive">
                <tr>
                  <td width="18%">Kode Sales</td>
                  <td width="1%">:</td>
                  <td id="tdKodeSales"></td>
                </tr>
                <tr>
                  <td>Nama Sales</td>
                  <td>:</td>
                  <td id="tdNamaSales"></td>
                </tr>
                <tr>
                  <td>Periode</td>
                  <td>:</td>
                  <td id="tdPeriode"></td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <div class="col-md-10">
                <center>
                  <div style="padding:0; margin:0; width:50; float:left;">
                    <img src="<?php echo base_url("assets/images/logo_plastik_black.png") ?>" class="img-responsive img-circle" width="50px" height="50px">
                  </div>
                  <h3 style="margin-top:13px;"><strong>PT. KLIP PLASTIK INDONESIA</strong></h3>
                  <h4><strong>Laporan Perhitungan Komisi Penjualan Sales</strong></h4>
                </center>
              </div>
            </div>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-responsive table-striped table-bordered" id="tableLaporanDataKomisi">
                  <thead>
                    <th>No</th>
                    <th nowrap>Kode Order</th>
                    <th nowrap>Tanggal</th>
                    <th nowrap>Nama Pelanggan</th>
                    <th nowrap>Berat</th>
                    <th nowrap>Ukuran</th>
                    <th nowrap>Merek</th>
                    <th nowrap>Harga</th>
                    <th nowrap>Jumlah Rupiah 5%</th>
                    <th nowrap>Jumlah Rupiah 2%</th>
                    <th nowrap>Jumlah Rupiah 1%</th>
                    <th nowrap>Jumlah Rupiah 0.8%</th>
                    <th nowrap>Jumlah Rupiah 0.5%</th>
                    <th nowrap>Potongan</th>
                    <th nowrap>Diskon</th>
                    <th nowrap>Lembar 5%</th>
                    <th nowrap>Lembar 2%</th>
                    <th nowrap>Lembar 1%</th>
                    <th nowrap>Lembar 0.8%</th>
                    <th nowrap>Lembar 0.5%</th>
                    <th>Action</th>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12" id="colWrapper">
              <!-- <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">DL</td>
                    <td width="1%">:</td>
                    <td id="tdDL"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">PST</td>
                    <td width="1%">:</td>
                    <td id="tdPST"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">CST</td>
                    <td width="1%">:</td>
                    <td id="tdCST"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">PKPS</td>
                    <td width="1%">:</td>
                    <td id="tdPKPS"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">CKPS</td>
                    <td width="1%">:</td>
                    <td id="tdCKPS"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">CB</td>
                    <td width="1%">:</td>
                    <td id="tdCB"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">PLLB</td>
                    <td width="1%">:</td>
                    <td id="tdPLLB"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">PLLK</td>
                    <td width="1%">:</td>
                    <td id="tdPLLK"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">CLLB</td>
                    <td width="1%">:</td>
                    <td id="tdCLLB"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">CLLK</td>
                    <td width="1%">:</td>
                    <td id="tdCLLK"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">CABE</td>
                    <td width="1%">:</td>
                    <td id="tdCABE"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">ES</td>
                    <td width="1%">:</td>
                    <td id="tdES"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">HDPLOS</td>
                    <td width="1%">:</td>
                    <td id="tdHDPLOS"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">HCT</td>
                    <td width="1%">:</td>
                    <td id="tdHCT"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">LL</td>
                    <td width="1%">:</td>
                    <td id="tdLL"></td>
                  </tr>
                </table>
              </div>

              <div class="col-md-2">
                <table class="table">
                  <tr>
                    <td width="10%">POND</td>
                    <td width="1%">:</td>
                    <td id="tdPOND"></td>
                  </tr>
                </table>
              </div> -->

            </div>
            <div class="col-md-12" style="margin-top: 15px;">
              <div class="pull-right">
                <a href="#" class="btn btn-md btn-flat btn-primary" id="btnPrint" target="_blank"><i class="fa fa-print"></i> Cetak Laporan</a>
                <a href="#" class="btn btn-md btn-flat btn-success" id="btnExport"><i class="fa fa-file-excel-o"></i> Export Ke Excel</a>
                <?php
                  if(($this->session->userdata("fabricationGroup") != "marketing" || $this->session->userdata("fabricationGroup") != "it_department")
                      && $this->session->userdata("fabricationStatus") != "1"){
                ?>
                <?php
                  }else{
                ?>
                <button type="button" id="btnApprove" class="btn btn-md btn-flat btn-danger"><i class="fa fa-check"></i> Setujui</button>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalSearchLaporanKomisi" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Cari Laporan</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-responsive">
                    <tr>
                      <td width="15%">Tanggal Awal</td>
                      <td width="1%">:</td>
                      <td>
                        <div class="form-group has-warning">
                          <div class="input-group date">
                            <input type="text" id="txtTglAwal" class="form-control" placeholder="Pilih Tanggal Awal" readonly>
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Tanggal Akhir</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <div class="input-group date">
                            <input type="text" id="txtTglAkhir" class="form-control" placeholder="Pilih Tanggal Akhir" readonly>
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Sales</td>
                      <td></td>
                      <td>
                        <div class="form-group has-warning">
                          <select class="form-control" id="cmbSales">

                          </select>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnCari" class="btn btn-md btn-flat btn-primary" onclick="cariLaporanKomisiSales();"><i class="fa fa-search"></i> Cari</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalEditLaporan" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" style="height:90%; overflow-y:scroll;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modalEditLaporan">&times;</button>
              <div class="col-md-4">
                <h4 class="text-blue">Edit Laporan</h4>
              </div>
              <div class="callout col-md-8 fade" id="notifInputModal">
                <center>
                  <label id="notifInputTextModal">Data Berhasil Di Simpan</label>
                </center>
              </div>
            </div>
            <div class="modal-body" style="height:83%; overflow-y:scroll;">
              <div class="col-md-12">
                <div class="col-md-4">
                  <i class="fa fa-square text-red"> Semua Kolom Berwarna Kuning Dan Pilihan Tidak Boleh Kosong</i>
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
                    <td>Potongan</td>
                    <td>:</td>
                    <td>
                      <div class="form-group">
                        <input type="text" class="form-control number" id="txtPotongan" placeholder="Masukan Potongan Harga">
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
                        <input type="text" class="form-control number" id="txtLembar8" placeholder="Masukan Lembar 8%" onkeypress="hitungHargaDiskon()">
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
