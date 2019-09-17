<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Pembayaran Registrasi</h3>
    </div>
    <div class="box-body">
      <div class="col-md-12">
        <div class="col-md-2">
          <label>ID. Registrasi</label>
        </div>
        <div class="col-md-1">
          <label>:</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <select class="form-control" id="cmbRegistrationID">

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

    </div>
    <div class="box-footer">

    </div>
  </div>
</div>
