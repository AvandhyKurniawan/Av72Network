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
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <button type="button" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modalCariKartuStok" data-backdrop="static">Cari Data Kartu Stok</button>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-responsive">
                  <tr>
                    <td width="10%">Stok Master</td>
                    <td width="1%">:</td>
                    <td width="10%">
                      <select class="form-control" id="cmbStokMaster">
                        <option value="">-- Pilih --</option>
                        <option value="> 0"> > 0 </option>
                        <option value="< 0"> < 0 </option>
                        <option value="= 0"> = 0 </option>
                      </select>
                    </td>
                    <td width="10%">Stok Awal</td>
                    <td width="1%">:</td>
                    <td width="10%">
                      <select class="form-control" id="cmbStokAwal">
                        <option value="">-- Pilih --</option>
                        <option value="> 0"> > 0 </option>
                        <option value="< 0"> < 0 </option>
                        <option value="= 0"> = 0 </option>
                      </select>
                    </td>
                    <td width="10%">Stok Akhir</td>
                    <td width="1%">:</td>
                    <td width="10%">
                      <select class="form-control" id="cmbStokAkhir">
                        <option value="">-- Pilih --</option>
                        <option value="> 0"> > 0 </option>
                        <option value="< 0"> < 0 </option>
                        <option value="= 0"> = 0 </option>
                      </select>
                    </td>
                    <td>
                      <button type="button" id="btnSortir" class="btn btn-md btn-flat btn-primary"> <i class="fa fa-sort"></i> Sortir</button>
                    </td>
                    <td>
                      <label class="text-blue" id="checkAll" style="margin-left:10px;">
                        <input type="checkbox" onclick="checkAll(this)"> Tandai Semua
                      </label>
                      <button type="button" id="btnUpdateStokMaster" class="btn btn-md btn-flat btn-success pull-right" onclick="perbaruiStokMaster();"><i class="fa fa-refresh"></i> Perbarui Stok Master</button>
                    </td>
                  </tr>
                </table>
                <div style="overflow-x:scroll;">
                  <table class="table table-responsive table-striped table-bordered" id="tableDataKartuStok">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Stok Master</th>
                        <th>Stok Awal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Stok Akhir</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
                <!-- <button type="button" class="btn btn-md btn-flat btn-success pull-right" id="btnPrint"><i class="fa fa-print"></i> Cetak</button> -->
                <!-- <button type="button" class="btn btn-md btn-flat btn-primary pull-right" id="btnExport"><i class="fa fa-file-excel-o"></i> Export Ke Excel</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalCariKartuStok" role="dialog" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" data-target="#modalCariKartuStok">&times;</button>
            <h4 class="text-blue">Cari Kartu Stok</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-responsive">
                  <tr>
                    <td width="20%">Tanggal Awal</td>
                    <td width="1%">:</td>
                    <td>
                      <div class="form-group has-warning">
                        <div class="input-group date">
                          <input type="text" id="txtTglAwal" class="form-control" placeholder="Pilih Tanggal Awal" readonly>
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%">Tanggal Akhir</td>
                    <td width="1%">:</td>
                    <td>
                      <div class="form-group has-warning">
                        <div class="input-group date">
                          <input type="text" id="txtTglAkhir" class="form-control" placeholder="Pilih Tanggal Akhir" readonly>
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%">Jenis</td>
                    <td width="1%">:</td>
                    <td>
                      <div class="form-group has-warning">
                        <select class="form-control" id="cmbJenis">
                          <option value="BAHAN BAKU">BAHAN BAKU</option>
                          <option value="BIJI WARNA">BIJI WARNA</option>
                          <option value="MINYAK">MINYAK</option>
                          <option value="CAT CAMPUR">CAT CAMPUR</option>
                          <option value="SPARE PART">SPARE PART</option>
                          <option value="APAL">APAL</option>
                        </select>
                      </div>
                      <!-- <input type="hidden" id="cmbJenis" value="CAT MURNI"> -->
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnCariKartuStok" class="btn btn-md btn-flat btn-primary" onclick="searchDataKartuStokBahan();"><i class="fa fa-search"></i> Cari</button>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>