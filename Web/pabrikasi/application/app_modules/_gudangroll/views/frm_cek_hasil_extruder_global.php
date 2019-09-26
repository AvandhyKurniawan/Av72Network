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
          <h3 class="box-title"></h3>
          <button type="button" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modalSearch">
            <i class="fa fa-search"></i>
            <span>Cari Hasil Extruder</span>
          </button>
        </div>
        <div class="box-body">
          <div class="col-md-12">
            <div class="col-md-6">
              <fieldset>
                <legend>Hasil Extruder</legend>
                <table class="table table-responsive table-striped" id="tableHasilExtruder">
                  <thead>
                    <th>Shift</th>
                    <th>Hasil</th>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <th>Total</th>
                    <th id="totalHasilExtruder"></th>
                  </tfoot>
                </table>
              </fieldset>
            </div>
            <div class="col-md-6">
              <fieldset>
                <legend>Masuk Gudang</legend>
                <table class="table table-responsive table-striped" id="tableMasukGudang">
                  <thead>
                    <th>Shift</th>
                    <th>Hasil</th>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <th>Total</th>
                    <th id="totalMasukGudang"></th>
                  </tfoot>
                </table>
              </fieldset>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="modalSearch" role="dialog" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" data-target="#modalHasilGlobalExtruder">&times;</button>
            <h4 class="modal-title text-purple">Cari Hasil Global Extruder</h4>
          </div>
          <div class="modal-body">
            <table class="table table-responsive">
              <tr>
                <td width="20%">Tanggal Awal</td>
                <td width="1%">:</td>
                <td>
                  <div class="form-group has-warning">
                    <div class="input-group date">
                      <input type="text" id="txtTanggalAwal" class="form-control" placeholder="Pilih Tanggal Awal" readonly>
                      <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <!-- <tr>
                <td width="20%">Tanggal Akhir</td>
                <td width="1%">:</td>
                <td>
                  <div class="form-group has-warning">
                    <div class="input-group date">
                      <input type="text" id="txtTanggalAkhir" class="form-control" placeholder="Pilih Tanggal Akhir" readonly>
                      <div class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                      </div>
                    </div>
                  </div>
                </td>
              </tr> -->
              <!-- <tr>
                <td width="20%">Jenis Barang</td>
                <td width="1%">:</td>
                <td>
                  <div class="form-group has-warning">
                    <select class="form-control" id="cmbJenis">
                      <option value="LOKAL">LOKAL</option>
                      <option value="EXPORT">EXPORT</option>
                    </select>
                  </div>
                </td>
              </tr> -->
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-md btn-flat btn-primary pull-right" onclick="getLaporanHasilExtruderGlobal()">Cari</button>
          </div>
        </div>
      </div>
    </div>

</div>
