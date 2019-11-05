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
              <button type="button" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modalCariBonPengembalianCatCampur" data-backdrop="static"><i class="fa fa-search"></i> Cari Bon Pengembalian Cat Campur</button>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12" id="bonPengembalianCatCampurWrapper" style="display:none;">
                  <h3 class="text-blue">Bon Pengembalian Cat Campur</h3>
                  <label id="lblPeriode" class="text-muted pull-right"><?php echo date("d F Y"); ?> - <?php echo date("d F Y"); ?></label>
                  <table class="table table-responsive table-striped" id="tableDataBonPengembalianCatCampur">
                    <thead>
                      <th>Nama Barang</th>
                      <th>Ukuran</th>
                      <th>Warna</th>
                      <th>Warna Cat</th>
                      <th>Jumlah</th>
                      <th>Status Bon</th>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnKirim" class="btn btn-md btn-flat btn-success"><i class="fa fa-send"></i> Kirim</button>
              <a href="#" target="_blank" id="btnPrint" class="btn btn-md btn-flat btn-default"><i class="fa fa-print"></i> Cetak</a>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalCariBonPengembalianCatCampur" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button"class="close" data-dismiss="modal" data-target="#modalCariBonPengembalianCatCampur">&times;</button>
              <h4 class="modal-title text-blue">Cari Data Bon Pengembalian Cat Campur</h4>
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
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnSearch" class="btn btn-md btn-flat btn-success" onclick="searchBonPengembalianCatCampur();"><i class="fa fa-search"></i> Cari</button>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
