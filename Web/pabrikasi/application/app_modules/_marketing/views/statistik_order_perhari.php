<style>
     .dataTable > thead > tr > td[class*="sort"]::after{display: none}
     .dataTable > thead > tr > th{background-color: #337ab7; color: #FFF;}
</style>
<div class="content-wrapper">
  <section class="content-header">
    <p><h1><?php echo $Data['Title']; ?></h1> </p>
    <div class="input-group input-group-sm col-md-3" style="width: 270px; font-size: 14px;">
      <input type="text" class="form-control date" autocomplete="off" id="tgl_awal" placeholder="Pilih Tanggal Awal">
      <input type="text" class="form-control date" autocomplete="off" id="tgl_akhir" placeholder="Pilih Tanggal Akhir">
          <span class="input-group-btn">
            <button type="button" class="btn btn-info btn-flat" onclick="statisticChartPerHari()" style="height: 60px;"> Cari </button>
          </span>
    </div>
      <ol class="breadcrumb">
        <i class="fa fa-link" aria-hidden="true"></i>&nbsp;
        <li><?php echo $Link["Segment1"]; ?></li>
        <li><?php echo $Link["Segment2"]; ?></li>
      </ol>
  </section>

  <section class="content">
    <input type="hidden" id="jenis" value="">
    <div class="nav-tabs-custom" style="cursor: move;">
      <ul class="nav nav-tabs pull-right ui-sortable-handle">
        <li><a href="#CBG" data-toggle="tab"  onclick="changeTitleChart('Cabang')">Cabang</a></li>
        <li><a href="#LN" data-toggle="tab" onclick="changeTitleChart('Luar Negeri')">Luar Negeri</a></li>
        <li><a href="#LK" data-toggle="tab" onclick="changeTitleChart('Luar Kota')">Luar Kota</a></li>
        <li class="active" id="test"><a href="#DK" data-toggle="tab"  onclick="changeTitleChart('Dalam Kota')">Dalam Kota</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Order <span id="title">Dalam Kota</span> ( <span id="tglTitle"></span> )</li>
      </ul>
      <div class="tab-content padding">
        <div class="chart tab-pane active" id="DK">
          <canvas id="myChart1"></canvas>

          <div class="box box-primary" style="margin-top: 30px;">
            <div class="box-header with-border">
              <h3 class="box-title text-blue" id="lblRincianStatistikDK">Rincian Statistik Dalam Kota</h3>
            </div>
            <div class="box-body">
              <div class="col-sm-3 col-xs-6">
                <table class="table table-responsive table-striped table-bordered">
                  <tr>
                    <td width="20%">Lembar</td>
                    <td width="1%">:</td>
                    <td id="tdLembarDK"></td>
                  </tr>
                  <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td id="tdBeratDK"></td>
                  </tr>
                  <tr>
                    <td>Bal</td>
                    <td>:</td>
                    <td id="tdBalDK"></td>
                  </tr>
                </table>
              </div>
              <table class="table table-responsive">
                <tr>
                  <td width="10%">Jenis Qty</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbJnsQtyDK">
                      <option value="KG">Kilogram</option>
                      <option value="LEMBAR">Lembar</option>
                      <option value="BAL">Bal</option>
                    </select>
                  </td>
                  <td width="10%">Sortir</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbSortDK">
                      <option value="ASC">Terkecil</option>
                      <option value="DESC" selected="true">Terbesar</option>
                    </select>
                  </td>
                  <td>
                    <button type="button" class="btn btn-md btn-primary btn-flat" onclick="urutkanRincian()"><i class="fa fa-sort"></i> Urutkan</button>
                  </td>
                </tr>
              </table>
              <table class="table table-responsive table-striped" id="tableRincianStatistikDalamKota">
                <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align: middle;">Nama Customer</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Pesan</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Estimasi</th>
                    <th rowspan="2" style="vertical-align: middle;">Status Pesanan</th>
                    <th colspan="3"><center>Jumlah Pesanan</center></th>
                  </tr>
                  <tr>
                    <th><center>Kilogram</center></th>
                    <th><center>Lembar</center></th>
                    <th><center>BAL</center></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="chart tab-pane" id="LK">
          <canvas id="myChart2"></canvas>

          <div class="box box-primary" style="margin-top: 30px;">
            <div class="box-header with-border">
              <h3 class="box-title text-blue" id="lblRincianStatistikLK">Rincian Statistik Luar Kota</h3>
            </div>
            <div class="box-body">
              <div class="col-sm-3 col-xs-6">
                <table class="table table-responsive table-striped table-bordered">
                  <tr>
                    <td width="20%">Lembar</td>
                    <td width="1%">:</td>
                    <td id="tdLembarLK"></td>
                  </tr>
                  <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td id="tdBeratLK"></td>
                  </tr>
                  <tr>
                    <td>Bal</td>
                    <td>:</td>
                    <td id="tdBalLK"></td>
                  </tr>
                </table>
              </div>
              <table class="table table-responsive">
                <tr>
                  <td width="10%">Jenis Qty</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbJnsQtyLK">
                      <option value="KG">Kilogram</option>
                      <option value="LEMBAR">Lembar</option>
                      <option value="BAL">Bal</option>
                    </select>
                  </td>
                  <td width="10%">Sortir</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbSortLK">
                      <option value="ASC">Terkecil</option>
                      <option value="DESC" selected="true">Terbesar</option>
                  </td>
                  <td>
                    <button type="button" class="btn btn-md btn-primary btn-flat" onclick="urutkanRincian()"><i class="fa fa-sort"></i> Urutkan</button>
                  </td>
                </tr>
              </table>
              <table class="table table-responsive table-striped" id="tableRincianStatistikLuarKota">
                <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align: middle;">Nama Customer</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Pesan</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Estimasi</th>
                    <th rowspan="2" style="vertical-align: middle;">Status Pesanan</th>
                    <th colspan="3"><center>Jumlah Pesanan</center></th>
                  </tr>
                  <tr>
                    <th><center>Kilogram</center></th>
                    <th><center>Lembar</center></th>
                    <th><center>BAL</center></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="chart tab-pane" id="CBG">
          <canvas id="myChart3"></canvas>

          <div class="box box-primary" style="margin-top: 30px;">
            <div class="box-header with-border">
              <h3 class="box-title text-blue" id="lblRincianStatistikCBG">Rincian Statistik Cabang</h3>
            </div>
            <div class="box-body">
              <div class="col-sm-3 col-xs-6">
                <table class="table table-responsive table-striped table-bordered">
                  <tr>
                    <td width="20%">Lembar</td>
                    <td width="1%">:</td>
                    <td id="tdLembarCBG"></td>
                  </tr>
                  <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td id="tdBeratCBG"></td>
                  </tr>
                  <tr>
                    <td>Bal</td>
                    <td>:</td>
                    <td id="tdBalCBG"></td>
                  </tr>
                </table>
              </div>
              <table class="table table-responsive">
                <tr>
                  <td width="10%">Jenis Qty</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbJnsQtyCBG">
                      <option value="KG">Kilogram</option>
                      <option value="LEMBAR">Lembar</option>
                      <option value="BAL">Bal</option>
                    </select>
                  </td>
                  <td width="10%">Sortir</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbSortCBG">
                      <option value="ASC">Terkecil</option>
                      <option value="DESC" selected="true">Terbesar</option>
                    </select>
                  </td>
                  <td>
                    <button type="button" class="btn btn-md btn-primary btn-flat" onclick="urutkanRincian()"><i class="fa fa-sort"></i> Urutkan</button>
                  </td>
                </tr>
              </table>
              <table class="table table-responsive table-striped" id="tableRincianStatistikCabang">
                <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align: middle;">Nama Customer</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Pesan</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Estimasi</th>
                    <th rowspan="2" style="vertical-align: middle;">Status Pesanan</th>
                    <th colspan="3"><center>Jumlah Pesanan</center></th>
                  </tr>
                  <tr>
                    <th><center>Kilogram</center></th>
                    <th><center>Lembar</center></th>
                    <th><center>BAL</center></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="chart tab-pane" id="LN">
          <canvas id="myChart4"></canvas>

          <div class="box box-primary" style="margin-top: 30px;">
            <div class="box-header with-border">
              <h3 class="box-title text-blue" id="lblRincianStatistikLN">Rincian Statistik Luar Negeri</h3>
            </div>
            <div class="box-body">
              <div class="col-sm-3 col-xs-6">
                <table class="table table-responsive table-striped table-bordered">
                  <tr>
                    <td width="20%">Lembar</td>
                    <td width="1%">:</td>
                    <td id="tdLembarLN"></td>
                  </tr>
                  <tr>
                    <td>Berat</td>
                    <td>:</td>
                    <td id="tdBeratLN"></td>
                  </tr>
                  <tr>
                    <td>Bal</td>
                    <td>:</td>
                    <td id="tdBalLN"></td>
                  </tr>
                </table>
              </div>
              <table class="table table-responsive">
                <tr>
                  <td width="10%">Jenis Qty</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbJnsQtyLN">
                      <option value="KG">Kilogram</option>
                      <option value="LEMBAR">Lembar</option>
                      <option value="BAL">Bal</option>
                    </select>
                  </td>
                  <td width="10%">Sortir</td>
                  <td width="1%">:</td>
                  <td width="30%">
                    <select class="form-control" id="cmbSortLN">
                      <option value="ASC">Terkecil</option>
                      <option value="DESC" selected="true">Terbesar</option>
                    </select>
                  </td>
                  <td>
                    <button type="button" class="btn btn-md btn-primary btn-flat" onclick="urutkanRincian()"><i class="fa fa-sort"></i> Urutkan</button>
                  </td>
                </tr>
              </table>
              <table class="table table-responsive table-striped" id="tableRincianStatistikLuarNegeri">
                <thead>
                  <tr>
                    <th rowspan="2" style="vertical-align: middle;">Nama Customer</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Pesan</th>
                    <th rowspan="2" style="vertical-align: middle;">Tanggal Estimasi</th>
                    <th rowspan="2" style="vertical-align: middle;">Status Pesanan</th>
                    <th colspan="3"><center>Jumlah Pesanan</center></th>
                  </tr>
                  <tr>
                    <th><center>Kilogram</center></th>
                    <th><center>Lembar</center></th>
                    <th><center>BAL</center></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
