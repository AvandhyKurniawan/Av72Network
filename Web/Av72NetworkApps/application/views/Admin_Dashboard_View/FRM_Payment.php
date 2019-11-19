<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Data Pembayaran</h3>
    </div>
    <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1-1" data-toggle="tab">Daftar Data Tagihan</a></li>
            <li><a href="#tab_2-2" data-toggle="tab">Daftar Data Pembayaran</a></li>
            <li><a href="#tab_3-3" data-toggle="tab">Tambah Data Tagihan</a></li>
            <li><a href="#tab_4-4" data-toggle="tab">Tambah Data Pembayaran</a></li>
            <li class="pull-right header"><i class="fa fa-th"></i> Menu Data Pembayaran</li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
              <div class="row">
              </div><!-- /.row -->
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_2-2">
              <div class="row">
              </div><!-- /.row -->
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_3-3">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>ID. Registrasi</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" data-id="cmbRegistrationID" id="cmbRegistrationID1">

                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>No. Tagihan</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="txtBillNumber" placeholder="Masukan Nomor Tagihan">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Tanggal Cetak Tagihan</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group date">
                        <input type="text" class="form-control" id="txtDateOfPrintBill" placeholder="Pilih Tanggal Cetak Tagihan" readonly>
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Tanggal Jatuh Tempo</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group date">
                        <input type="text" class="form-control" id="txtDueDate" placeholder="Pilih Tanggal Jatuh Tempo" readonly>
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>No. Kontrak</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="txtContractNumber" placeholder="Masukan Nomor Kontrak">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Harga Internet</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control currency" id="txtInternetPrice" placeholder="Masukan Nomor Harga Internet" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Total Pajak</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control currency" id="txtTaxAmount" placeholder="Masukan Total Pajak" readonly>
                    </div>
                  </div>
                </div>

              </div><!-- /.row -->
            </div><!-- /.tab-pane -->

            <div class="tab-pane" id="tab_4-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>ID. Registrasi</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" data-id="cmbRegistrationID" id="cmbRegistrationID2">

                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Jenis Pembayaran</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" id="cmbPaymentType" onchange="changePaymentType(this);">
                        <option value="">== Pilih Jenis Pembayaran ==</option>
                        <option value="REGISTRASI">Registrasi</option>
                        <option value="INTERNET">Internet</option>
                        <option value="PERANGKAT">Perangkat</option>
                        <option value="REGISTRASI DAN PERANGKAT">Registrasi Dan Perangkat</option>
                        <option value="INTERNET DAN PERANGKAT">Internet Dan Perangkat</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" id="paymentPeriodWrapper" style="display:none;">
                  <div class="col-md-2">
                    <label>Periode Pembayaran</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" id="cmbBillingPeriode">
                        <?php
                          $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                          for ($i=0; $i < count($arrBulan); $i++) {
                            $value = $arrBulan[$i]." ".date("Y");
                            echo "<option value='$value'>$value</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Tanggal Pembayaran</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group date">
                        <input type="text" id="txtPaymentDate" class="form-control" placeholder="Pilih Tanggal Pembayaran" readonly value="<?= date("Y-m-d"); ?>">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" id="registrationAmountWrapper" style="display:none;">
                  <div class="col-md-2">
                    <label>Biaya Registrasi</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" id="txtRegistrationAmount" class="form-control" placeholder="Masukan Biaya Registrasi" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" id="priceWrapper" style="display:none;">
                  <div class="col-md-2">
                    <label>Tarif Internet</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" id="txtPrice" class="form-control" placeholder="Masukan Tarif Internet Bulanan" readonly>
                    </div>
                  </div>
                </div>  

                <div class="col-md-12" id="devicePriceWrapper" style="display:none;">
                  <div class="col-md-2">
                    <label>Harga Alat / Cicilan / Sewa</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" id="txtDevicePrice" class="form-control" placeholder="Masukan Harga Alat / Cicilan / Sewa">
                    </div>
                  </div>
                </div>

                <div class="col-md-12"  id="taxWrapper" style="display:none;">
                  <div class="col-md-2">
                    <label>Jumlah Pajak</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" id="txtTaxAmount" class="form-control number" placeholder="Jumlah Pajak Yang Harus Dibayarkan" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-12" id="amountToBePaidWrapper" style="display:none;">
                  <div class="col-md-2">
                    <label>Jumlah Yang Harus Dibayar</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" id="txtBillingAmount" class="form-control" placeholder="Masukan Jumlah Yang Harus Dibayar" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Jumlah Yang Dibayarkan</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" id="txtPaymentAmount" class="form-control number" placeholder="Masukan Jumlah Yang Dibayarkan">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Jumlah Yang Kembalian</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" id="txtAmountOfChange" class="form-control number" placeholder="Masukan Jumlah Kembalian" readonly>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Metode Pembayaran</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <select class="form-control" id="cmbPaymentType">
                        <option value="CASH">Tunai</option>
                        <option value="TRANSFER">Transfer</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Keterangan Pembayaran</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <textarea id="txtPaymentInformation" rows="5" cols="80" class="form-control" placeholder="Masukan Keterangan Bila Perlu"></textarea>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-md-2">
                    <label>Unggah Bukti Transfer</label>
                  </div>
                  <div class="col-md-1">
                    <label>:</label>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="file" id="fileTransferProofImage">
                    </div>
                  </div>
                </div>

                <div class="col-md-9">
                  <div class="pull-right">
                    <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary"><i class="fa fa-check"></i> Simpan Baru</button>
                    <button type="button" class="btn btn-md btn-flat btn-danger" onclick='resetForm(true);'><i class="fa fa-refresh"></i> Batal</button>
                  </div>
                </div>
              </div><!-- /.row -->
            </div><!-- /.tab-pane -->
          </div><!-- /.tab-content -->
        </div><!-- /.nav-tabs-custom -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
      

    </div>
    <div class="box-footer">

    </div>
  </div>
</div>
