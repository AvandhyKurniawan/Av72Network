<?php
if(count($TEMP) > 0){
  $display1 = "style='display: block;'";
  $display2 = "style='display: none;'";
  $KodeBarang = $TEMP[0]["kd_produk"];
  $NamaBarang = $TEMP[0]["nama_produk"];
  $Keterangan = $TEMP[0]["keterangan"];
}else{
  $display1 = "style='display: none;'";
  $display2 = "style='display: block;'";
  $KodeBarang = $KDPRODUK;
  $NamaBarang = $TEMP[0]["nama_produk"];
  $Keterangan = $TEMP[0]["keterangan"];
}
?>

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
			<div class="box box-warning">
				<div class="box-header with-border">
					<button type="button" class="btn btn-md btn-flat btn-primary" id="btnTambahBarang"><i class="fa fa-plus"></i>
						Tambah
						Baru</button>
				</div>
				<div class="box-body">
					<div class="row" id="formWrapper" style="display:none;">
						<div class="col-md-12">
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab1" data-toggle="tab">Tab 1</a></li>
									<li><a href="#tab2" data-toggle="tab" <?= $display1; ?> onclick="cekDaftarProdukAnekaPlastik();">Tab
											2</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab1">
										<table class="table table-responsive">
											<tr>
												<td width="15%">Kode Barang</td>
												<td width="1%">:</td>
												<td>
													<div class="form-group">
														<input type="text" id="txtKodeBarang" class="form-control" placeholder="Masukan Kode Barang"
															readonly value='<?= $KodeBarang; ?>'>
													</div>
												</td>
											</tr>
											<tr>
												<td>Nama Barang</td>
												<td>:</td>
												<td>
													<div class="form-group">
														<input type="text" id="txtNamaBarang" class="form-control" placeholder="Masukan Nama Barang"
															value='<?= $NamaBarang; ?>'>
													</div>
												</td>
											</tr>
											<tr>
												<td>Keterangan</td>
												<td>:</td>
												<td>
													<div class="form-group">
														<textarea id="txtKeterangan" rows="5" cols="50" class="form-control"
															placeholder="Masukan Keterangan Bila Diperlukan"><?= $Keterangan; ?></textarea>
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td></td>
												<td>
													<div class="pull-right">
														<button type="button" id="btnSimpanBarangBaru" class="btn btn-md btn-flat btn-primary"
															onclick="simpanBarangBaru();">
															<i class="fa fa-plus"></i> Tambah
														</button>
														<button type="button" id="btnSimpanBarangBaru" class="btn btn-md btn-flat btn-danger"
															onclick="tambahBarangBaru('#formWrapper','#dataWrapper',false);">
															<i class="fa fa-remove"></i> Batal
														</button>
													</div>
												</td>
											</tr>
										</table>
									</div>
									<div class="tab-pane" id="tab2">
										<table class="table table-responsive">
											<tr>
												<td width="25%"><input type="text" id="txtKdProduk" class="form-control" readonly
														placeholder="Masukan Kode Produk"></td>
												<td width="25%"><select class="form-control" style="width:100%" id="cmbBarangPack"
														required></select></td>
												<td width="25%"><input type="text" id="txtJumlah" class="form-control number"
														placeholder="Jumlah" required></td>
												<td width="25%">
													<select class="form-control" id="cmbSatuan" required>
														<option value="">Pilih Satuan</option>
														<option value="LEMBAR">Lembar</option>
														<option value="KG">Kilogram</option>
													</select>
												</td>
											</tr>
											<tr>
												<td><input type="text" id="txtWarnaCetak" class="form-control" placeholder="Warna Cetak"
														required></td>
												<td><input type="text" id="txtDll" class="form-control" placeholder="DLL" required></td>
												<td><input type="text" id="txtStrip" class="form-control" placeholder="Strip" required></td>
											</tr>
											<tr>
												<td><input type="text" id="txtOmsetKg" class="form-control" placeholder="Omset Kg"></td>
												<td><input type="text" id="txtOmsetLembar" class="form-control" placeholder="Omset Lembar"></td>
												
												<td><textarea id="txtMerek" rows="2" cols="50" class="form-control" placeholder="Merek"required></textarea></td>
											</tr>
											<tr>
												<td colspan="4">
													<button type="button" id="btnSimpanBarangBaru" class="btn btn-md btn-flat btn-primary"
														onclick="tambahBarangBaru();">
														<i class="fa fa-plus"></i> Tambah
													</button>
													<button type="button" class="btn btn-md btn-flat btn-danger">
														<i class="fa fa-remove"></i> Batal
													</button>
												</td>
											</tr>
										</table>

										<fieldset>
											<legend>Daftar Barang</legend>
											<table class="table table-responsive table-striped table-bordered" id="tableProdukAnekaItem">
												<thead>
													<th>No.</th>
													<th>Nama Produk</th>
													<th>Merek</th>
													<th>Jumlah</th>
													<th>Warna Cetak</th>
													<th>DLL</th>
													<th>Strip</th>
													<th>Omset KG</th>
													<th>Omset Lembar</th>
													<th colspan="2">Aksi</th>
												</thead>
												<tbody>

												</tbody>
											</table>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="pull-right">
								<button type="button" class="btn btn-md btn-flat btn-success" onclick="selesaiBarangBaru()" id="btnSelesaiBarangBaru"><i
										class="fa fa-check"></i> Selesai</button>
							</div>
						</div>
					</div>
					<hr>
					<div class="row" id="dataWrapper" style="margin-top:20px;">

						<div class="col-md-12">
							<table class="table table-responsive table-striped table-bordered" id="tableMasterBarangAnekaPlastik">
								<thead>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Keterangan</th>
									<th colspan="2">Pilihan</th>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="modalEditAnekaItem" role="dialog" tabindex="10">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" data-target="#modalTambahGudangHasil">&times;</button>
				<h4 class="modal-title text-blue">Edit Barang</h4>
			</div>
			<div class="modal-body" style="height:500px; overflow-y:scroll;">
				<table class="table table-responsive">
					<tr>
						<td width="25%">Pilih Ukuran</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="hidden" id="txtIdEdit">

								<small class="text-red">
									Kosongkan bila tidak ingin mengganti barang!
								</small>
								<select class="form-control" style="width:100%" id="cmbBarangEdit" required>
							</div>
						</td>
					</tr>
					<tr>
						<td width="25%">Jumlah</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtJumlahEdit" class="form-control number" placeholder="Jumlah" required="">
							</div>
						</td>
					</tr>
					<tr>
						<td width="25%">Pilih Satuan</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<select class="form-control" id="cmbSatuanEdit" required="">
									<option value="LEMBAR">Lembar</option>
									<option value="KG">Kilogram</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td width="25%">Warna Cetak</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtWarnaCetakEdit" class="form-control" placeholder="Warna Cetak" required="">
							</div>
						</td>
					</tr>
					<tr>
						<td width="25%">Dll</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtDllEdit" class="form-control" placeholder="DLL" required="">
							</div>
						</td>
					</tr>

					<tr>
						<td width="25%">Strip</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtStripEdit" class="form-control" placeholder="Strip" required="">
							</div>
						</td>
					</tr>

					<tr>
						<td width="25%">Omset KG</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtOmsetKgEdit" class="form-control" placeholder="Omset KG" required="">
							</div>
						</td>
					</tr>

					<tr>
						<td width="25%">Omset Lembar</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtOmsetLembarEdit" class="form-control" placeholder="Omset Lembar" required="">
							</div>
						</td>
					</tr>

					
					<tr>
						<td width="25%">Merek</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<textarea id="txtMerekEdit" rows="2" cols="50" class="form-control" placeholder="Merek"
									required=""></textarea>
							</div>
						</td>
					</tr>

				</table>
				<small class="text-red">
					Note : Kolom Berwarna Kuning Tidak Boleh Kosong
				</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-flat btn-primary" onclick="selesaiEditItem()">Simpan</button>
			</div>
		</div>
	</div>
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
						<th>Omset KG</th>
						<th>Omset Lembar</th>
						<th colspan="2">Aksi</th>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- edit data master barang mmodal -->
<div class="modal fade" id="modalEditMasterBarang" role="dialog" tabindex="10">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" data-target="#modalTambahGudangHasil">&times;</button>
				<h4 class="modal-title text-blue">Edit Barang</h4>
			</div>
			<div class="modal-body" style="height:500px; overflow-y:scroll;">
				<table class="table table-responsive">
					<tr>
						<td width="25%">Kode Produk</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtKodeProdukEdit" class="form-control" disabled required="">
							</div>
						</td>
					</tr>
          <tr>
						<td width="25%">Nama Barang</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<input type="text" id="txtNamaBarangEdit" class="form-control" placeholder="Nama Barang" required="">
							</div>
						</td>
					</tr>
          <tr>
						<td width="25%">Keterangan</td>
						<td width="1%">:</td>
						<td>
							<div class="form-group has-warning">
								<textarea id="txtKeteranganEdit" rows="5" cols="50" class="form-control" placeholder="Masukan Keterangan Bila Diperlukan"></textarea>
							</div>
						</td>
					</tr>

				</table>
				<small class="text-red">
					Note : Kolom Berwarna Kuning Tidak Boleh Kosong
				</small>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-flat btn-primary" onclick="selesaiEditBarang()">Simpan</button>
			</div>
		</div>
	</div>
</div>
