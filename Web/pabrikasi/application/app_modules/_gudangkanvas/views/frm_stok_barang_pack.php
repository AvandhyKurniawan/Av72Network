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
				<button type="button" class="btn btn-md btn-flat btn-warning" data-toggle="modal" data-backdrop="static"
					data-target="#modalCariHistoryAnekaMacam" onclick="modalCariHistoryAnekaMacam('ANEKA_MACAM')"><i
						class="fa fa-search"></i> Cari History</button>
				<button type="button" class="btn btn-md btn-flat btn-danger" data-toggle="modal" data-backdrop="static"
					data-target="#modalTambahStockPack" onclick="modalTambahStock()"><i class="fa fa-plus"></i> Tambah Stock
					Pack</button>
				<button type="button" class="btn btn-md btn-flat btn-success" data-toggle="modal" data-backdrop="static" data-target="#modalKoreksiPack" onclick="modalKoreksiPack('KANVAS')"><i class="fa fa-pencil"></i> Koreksi Pack</button>
			</div>

			<!-- <div class="col-md-12" style="margin-top: 10px;">
          <div class="col-md-6" style="display: none;" id="alertKirimanBarangKeGudangBuffer">
            <div class="alert alert-info">
              <h4>
                <a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#modalApproveHasilPotong" onclick="modalKirimanUntukGudangKanvas('STANDARD')">
                  Ada Kiriman Barang Dari Gudang Campur / Standard / Sablon
                </a>
              </h4>
            </div>
          </div>
          <div class="col-md-6" style="display: none; cursor: pointer;" id="alertKirimanBahanSablon">
            <a href="#" style="text-decoration:none;" data-toggle="modal" data-target="#modalKirimanBahanSablon" onclick="modalKirimanBahanSablon()">
            <div class="alert alert-info">
              <h4>
                  Ada Kiriman Bahan Sablon Dari Gudang Bahan
              </h4>
            </div>
            </a>
          </div>
        </div> -->

			<div class="col-md-12" style="margin-top:10px;" id="masterContainerHasil">
				<h3>Stok Pack</h3>
				<table class="table table-responsive table-striped" id="tableDataMasterBarangPack">
					<thead>
						<th>Kode</th>
						<th>Nama Barang</th>
						<th>Keterangan</th>
						<th>Stock</th>
						<th>Action</th>
					</thead>
				</table>
				<!-- <h3>Stok Bahan Sablon</h3>
          <table class="table table-responsive table-striped" id="tableDataBahanSablon">
            <thead>
              <th style="width: 10px">No</th>
              <th>Nama Bahan</th>
              <th>Warna</th>
              <th>Jenis</th>
              <th>Status</th>
              <th>Stok</th>
              <th>Action</th>
            </thead>
          </table> -->
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" id="historyContainerHasil" style="display:none; margin-top:10px;">
				<div class="col-md-4" id="infoSaldoWrapper">
					<div class="info-box" style="position:relative;">
						<span class="info-box-icon bg-aqua" style="padding-top:23px; position:absolute; height:100%;">
							<i class="fa fa-bookmark-o" style="vertical-align:middle; line-height:2;"></i>
						</span>

						<div class="info-box-content">
							<span class="info-box-number text-blue">Saldo Awal </span>
							<span class="info-box-text text-blue" id="textSaldoAwalBerat">Berat : 10000</span>
							<span class="info-box-text text-blue" id="textSaldoAwalLembar">Lembar : 10000</span>
							<hr style="margin:5px 0 5px 0">
							<span class="info-box-number text-red">Saldo Akhir </span>
							<span class="info-box-text text-red" id="textSaldoAkhirBerat">Berat : 10000</span>
							<span class="info-box-text text-red" id="textSaldoAkhirLembar">Lembar : 10000</span>
						</div>
					</div>
				</div>

				<div class="col-md-4" id="infoFlowWrapper">
					<div class="info-box" style="position:relative;">
						<div class="info-box-icon bg-green" style="padding-top:23px; position:absolute; height:100%;">
							<i class="fa fa-exchange" style="vertical-align:middle; line-height:2;"></i>
						</div>

						<div class="info-box-content">
							<span class="info-box-number text-blue">Masuk </span>
							<span class="info-box-text text-blue" id="textMasukBerat">Berat : 10000</span>
							<span class="info-box-text text-blue" id="textMasukLembar">Lembar : 10000</span>
							<hr style="margin:5px 0 5px 0">
							<span class="info-box-number text-red">Keluar </span>
							<span class="info-box-text text-red" id="textKeluarBerat">Berat : 10000</span>
							<span class="info-box-text text-red" id="textKeluarLembar">Lembar : 10000</span>
						</div>
					</div>
					<button type="button" class="btn btn-md btn-flat btn-block btn-primary" id="btnRefreshTableHistory"><i
							class="fa fa-refresh"></i> Refresh Table</button>
				</div>

				<div class="col-md-4" id="infoSaldoWrapper">
					<div class="info-box" style="position:relative;">
						<span class="info-box-icon bg-yellow" style="padding-top:23px; position:absolute; height:100%;">
							<i class="fa fa-lock" style="vertical-align:middle; line-height:2;"></i>
						</span>

						<div class="info-box-content">
							<span class="info-box-number text-blue">Stock Data Master </span>
							<span class="info-box-text text-blue" id="textBeratStok">Berat : 0.00</span>
							<span class="info-box-text text-blue" id="textLembarStok">Lembar : 0.00</span>
							<hr style="margin:5px 0 5px 0">
							<span class="info-box-number text-red">&nbsp;</span>
							<span class="info-box-text text-red">&nbsp;</span>
							<span class="info-box-text text-red">&nbsp;</span>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<h3 class="text-primary" id="txtDetailHistory"></h3>
				</div>
				<table class="table table-responsive table-striped" id="tableHistoryAnekaMacamMasuk">
					<thead>
						<th>Tanggal</th>
						<th>Berat</th>
						<th>Banyak</th>
						<th>Keterangan</th>
						<th>Action</th>
					</thead>
				</table>
				<div class="col-md-12">
					<h3 class="text-primary" id="txtDetailHistory2"></h3>
				</div>
				<table class="table table-responsive table-striped" id="tableHistoryGudangHasilKeluar">
					<thead>
						<th>Tanggal</th>
						<th>Berat</th>
						<th>Banyak</th>
						<th>Keterangan</th>
						<th>Action</th>
					</thead>
				</table>
			</div>
		</div>
	</section>
</div>



<!-- Item list Modal -->
<div class="modal fade" id="daftarAnekaItem" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" data-target="#modalTambahGudangHasil">&times;</button>
				<h4 class="modal-title text-blue">Daftar Produk Aneka</h4>
			</div>
			<div class="modal-body" style="height:500px; overflow-y:scroll;">
				<table class="table table-responsive table-striped table-bordered" id="tableProdukAnekaItemModal">
					<thead>
						<th>No.</th>
						<th>Nama Produk</th>
						<th>Merek</th>
						<th>Jumlah</th>
						<th>Warna Cetak</th>
						<th>DLL</th>
						<th>Strip</th>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Item stock Modal -->
<div class="modal fade" id="modalEditStock" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-blue">Stock</h4>
			</div>
			<div class="modal-body" style="height:500px; overflow-y:scroll;">
				<table class="table table-responsive text-center">
					<tr>
						<td id="stok-title"></td>
					</tr>
					<tr>
						<td>
							<input type="text" class="form-control num" id="stok-pack" placeholder="stock">
							<input type="hidden" id="kode_produk">
						</td>
					</tr>
					<tr>
						<td>
							<button class="btn btn-success btn-block" onclick="updateStockPack()">Submit</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- MODAL HISTORY ANEKA -->
<div class="modal fade" id="modalCariHistoryAnekaMacam" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					data-target="#modalCariHistoryAnekaMacam">&times;</button>
				<h4 class="modal-title text-blue">Cari History</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive">
					<tr>
						<td width="20%">Tanggal Awal</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<div class="input-group date">
									<input type="text" id="txtTglAwal1" class="form-control" placeholder="Masukan Tanggal Awal" readonly>
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
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
									<input type="text" id="txtTglAkhir1" class="form-control" placeholder="Masukan Tanggal Akhir"
										readonly>
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td>Pilih Barang</td>
						<td>:</td>
						<td>
							<div class="form-group has-warning">
								<select class="form-control" id="cmbAnekaMacam"></select>
							</div>
						</td>
					</tr>
				</table>
				<small class="text-red">
					Note : Kolom Berwarna Kuning Tidak Boleh Kosong
				</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-flat btn-success" onclick="cariHistoryAnekaMacam('KANVAS')"><i
						class="fa fa-search"></i> Cari History</button>
			</div>
		</div>
	</div>
</div>



<!-- MODAL TAMBAH STOCK PACK -->
<div class="modal fade" id="modalTambahStockPack" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" data-target="#modalTambahStockPack">&times;</button>
				<h4 class="modal-title text-blue">Tambah Stock Pack</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive">
					<tr>
						<td>Pilih Barang</td>
						<td>:</td>
						<td>
							<div class="form-group has-warning">
								<select class="form-control" id="cmbAnekaMacam_stock"></select>
							</div>
						</td>
					</tr>
					<tr>
						<td>Jumlah Pack</td>
						<td>:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" class="form-control number" id="jumlah_pack" placeholder="Jumlah Pack">
							</div>
						</td>
					</tr>
					<tr>
						<td>Jumlah Berat</td>
						<td>:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" class="form-control number" id="jumlah_berat" placeholder="Jumlah Berat">
							</div>
						</td>
					</tr>
					<tr>
						<td>Jumlah Lembar</td>
						<td>:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" class="form-control number" id="jumlah_lembar" placeholder="Jumlah Lembar">
							</div>
						</td>
					</tr>
				</table>
				<small class="text-red">
					Note : Kolom Berwarna Kuning Tidak Boleh Kosong
				</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-flat btn-success" onclick="tambahStockPack()"><i
						class="fa fa-plus"></i> Tambah Stock</button>
			</div>
		</div>
	</div>
</div>




<!-- MODAL EDIT DATA AWAL -->
<div class="modal fade" id="modalEditDataAwal" role="dialog" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" data-target="#modalEditDataAwal">&times;</button>
				<h4 class="modal-title text-blue">Edit Data Awal</h4>
			</div>
			<div class="modal-body">
				<table class="table table-responsive">
					<tr>
						<td>Jumlah Pack</td>
						<td>:</td>
						<td>
							<div class="form-group has-warning">
								<input type="hidden" id="kd_pack_awal">
								<input type="text" class="form-control number" id="jumlah_pack_awal" placeholder="Jumlah Pack">
							</div>
						</td>
					</tr>
					<tr>
						<td>Jumlah Berat</td>
						<td>:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" class="form-control number" id="jumlah_berat_awal" placeholder="Jumlah Berat">
							</div>
						</td>
					</tr>
				</table>
				<small class="text-red">
					Note : Kolom Berwarna Kuning Tidak Boleh Kosong
				</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-flat btn-success" onclick="EditDataAwalPack()"><i
						class="fa fa-plus"></i> Edit Data Awal</button>
			</div>
		</div>
	</div>
</div>


<!-- modal edit history -->
<div class="modal fade" id="modalEditHistoryPack" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modalEditHistoryPack">&times;</button>
              <h4 class="modal-title text-blue">Edit Detail Barang Masuk / Keluar</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-responsive">
                    <tr>
                      <td width="20%">Tanggal</td>
                      <td width="1%">:</td>
                      <td>
                        <div class="form-group has-warning">
                          <div class="input-group date">
                            <input type="text" id="txtTglHistoryMasuk" class="form-control" placeholder="Masukan Tanggal History" readonly>
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Merek</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <select class="form-control" id="cmbUkuran6">

                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr id="trJumlahPengiriman" style="display:none;">
                      <td>Jumlah Pengiriman</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <input type="text" id="txtJumlahPengiriman" class="form-control number" style="width : 90%; float:left;" placeholder="Masukan Jumlah Pengiriman">
                          <span id="txtSatuan" style="float:left; margin-left:5px; margin-top : 5px;">PACK</span>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Berat</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <input type="text" id="txtBeratMasukHistory" class="form-control number" placeholder="Masukan Jumlah Berat History">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Pack</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <input type="text" id="txtLembarMasukHistory" class="form-control number" placeholder="Masukan Jumlah Lembar History">
                        </div>
                      </td>
                    </tr>
                  </table>
                  <small class="text-red">
                    Note : 1. Kosongkan Kolom Merek Jika Tidak Ingin Memindahkan Barang
                  </small>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnSaveEditHistoryPack" class="btn btn-md btn-flat btn-warning"><i class="fa fa-pencil"></i> Ubah</button>
            </div>
          </div>
        </div>
      </div>

			<!-- ModalKoreksi -->

			<div class="modal fade" id="modalKoreksiPack" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" data-target="#modalKoreksiPack">&times;</button>
              <h4 class="modal-title text-blue">Formulir Koreksi Barang Aneka Macam</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-responsive">
                    <tr>
                      <td width="20%">Tanggal</td>
                      <td width="1%">:</td>
                      <td>
                        <div class="form-group has-warning">
                          <div class="input-group date">
                            <input type="text" id="txtTglKoreksi" class="form-control" placeholder="Masukan Tanggal Koreksi" readonly>
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Ukuran</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <select class="form-control" id="cmbUkuran3">

                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Berat</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <input type="text" id="txtBeratKoreksi" class="form-control number" placeholder="Masukan Jumlah Berat Koreksi">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Pack</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <input type="text" id="txtPackKoreksi" class="form-control number" placeholder="Masukan Jumlah Lembar Koreksi">
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Jenis Koreksian</td>
                      <td>:</td>
                      <td>
                        <div class="form-group has-warning">
                          <select class="form-control" id="cmbJenisKoreksi">
                            <option value="PLUS">PLUS</option>
                            <option value="MINUS">MINUS</option>
                          </select>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <td>
                        <input type="text" id="txtKeterangan" class="form-control" placeholder="Masukan Ketarangan">
                      </td>
                    </tr>
                  </table>
                  <button type="button" class="btn btn-md btn-flat btn-danger pull-right" onclick="resetFormKoreksiGudangBuffer('SABLON');"><i class="fa fa-remove"></i> Batal</button>
                  <button type="button" id="btnAddKoreksiGudangHasil" class="btn btn-md btn-flat btn-primary pull-right"><i class="fa fa-plus"></i> Tambah</button>
                </div>
                <div class="col-md-12">
                  <table class="table table-responsive" id="tableListKoreksiPackTemp">
                    <thead>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Berat</th>
                      <th>Pack</th>
                      <th>Jenis Koreksi</th>
                      <th>Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="btnSaveKoreksiGudangHasil" class="btn btn-md btn-flat btn-success"><i class="fa fa-check"></i> Selesai</button>
            </div>
          </div>
        </div>
      </div>
