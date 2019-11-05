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
              <button type="button" class="btn btn-md btn-flat btn-primary" onclick="modalCariDataApal()"><i class="fa fa-search"></i> Cari Data Apal</button>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-responsive table-striped" id="tableLaporanApalPerMerek">
                    <thead>
                      <th>No</th>
                      <th>Nama Customer</th>
                      <th>Merek</th>
                      <th>Tanggal</th>
                      <th>Hasil Lembar</th>
                      <th>Berat Kotor</th>
                      <th>Berat Bersih</th>
                      <th>Total Apal</th>
                      <th>Persentase</th>
                    </thead>
                    <tfoot style="background-color:#00c0ef; color:#FFF;">
                      <th colspan='4'><center>Total</center></th>
                      <th id="thTotalHasilLembar"></th>
                      <th id="thTotalBeratKotor"></th>
                      <th id="thTotalBeratBersih"></th>
                      <th id="thTotalBeratApal"></th>
                      <th></th>
                    </tfoot>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="box-footer">

            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalCariDataApal" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modalCariDataApal">&times;</button>
              <h4 class="modal-title">Cari Data Apal</h4>
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
                            <input type="text" class="form-control" id="txtTglAwal" placeholder="Pilih Tanggal Awal" readonly>
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
                            <input type="text" class="form-control" id="txtTglAkhir" placeholder="Pilih Tanggal Akhir" readonly>
                            <span class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </span>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Merek</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <select class="form-control" id="cmbMerek"></select>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-md btn-flat btn-primary" onclick="cariLaporanApalPerMerek()"><i class="fa fa-search"></i> Cari</button>
            </div>
          </div>
        </div>
      </div>
    </section>

</div>
