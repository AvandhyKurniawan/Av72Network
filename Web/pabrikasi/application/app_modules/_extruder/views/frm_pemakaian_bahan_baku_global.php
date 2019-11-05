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
            <button type="button" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modalCariData" data-backdrop="static">
              <i class="fa fa-search"></i> Cari Data Pemakaian
            </button>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div id="dataWrapper">
                  <table class="table table-responsive table-striped" id="tableData">
                    <thead>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Shift</th>
                      <th>Jumlah</th>
                      <th>Sub Total</th>
                    </thead>
                    <tfoot style="background-color: #00c0ef; color: #FFF;">
                      <th colspan="4"><center>Total</center></th>
                      <th id="thTotal"></th>
                    </tfoot>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalCariData" role="dialog" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" data-target="#modalCariData">&times;</button>
            <h4 class="modal-title">Cari Data</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-responsive">
                  <tr>
                    <td width="30%">Tanggal Awal</td>
                    <td width="1%">:</td>
                    <td>
                      <div class="form-group has-warning">
                        <div class="input-group date">
                          <input type="text" id="txtTglAwal" class="form-control" placeholder="Pilih Tanggal Awal" readonly>
                          <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
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
                          <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-md btn-flat btn-primary" onclick="cariDataPemakaianBahanBakuGlobal()"><i class="fa fa-search"></i> Cari</button>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>
