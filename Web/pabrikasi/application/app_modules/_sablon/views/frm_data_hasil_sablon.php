<div class="content-wrapper">
  <section class="content-header">
    <h1><?php echo $Data['Title']; ?> <span id="tanggal"></span></h1>
    <input type="hidden" name="tgl1" id="tgl1" value=""> <input type="hidden" name="tgl2" id="tgl2" value="">
      <ol class="breadcrumb">
        <i class="fa fa-link" aria-hidden="true"></i>&nbsp;
        <li><?php echo $Link["Segment1"]; ?></li>
        <li><?php echo $Link["Segment2"]; ?></li>
      </ol>
    </section>
    <section class="content" id="hasilSablonPerTgl">
      <div class="box box-success">
        <div class="box-body">
          <button type="button" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#modal_cariHasilSablon"><i class="fa fa-search"></i> Cari Hasil Sablon</button>
          <div class="table-responsive">
            <table class="table table-responsive table-striped" id="tableDataHasilSablonPerTgl" style="display: none;">
              <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Customer</th>
                <th>Merek</th>
                <th>Ukuran</th>
                <th>Warna Plastik</th>
                <th>Warna Cetak</th>
                <th>Hasil Lembar</th>
                <th>Hasil Berat</th>
                <th>Jenis Barang</th>
                <th colspan="2" style="text-align: center;">Action</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </section>
  </section>
  <section>
      <div id="modal_cariHasilSablon" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="text-align: center;">
        <div class="modal-dialog modal-sm">
          <!-- konten modal-->
          <div class="modal-content" style="background-color:#00a65a;">
            <!-- heading modal -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title" style="text-align: center; color: black;"><i class="fa fa-search">&nbsp;&nbsp;Cari Hasil Sablon</i></h3>
            </div>
            <!-- body modal -->
            <div class="modal-body">
              <div class="form-group">
                <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" name="tgl_awal" id="tgl_awal" placeholder="Tanggal Awal" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="tgl_akhir" id="tgl_akhir" placeholder="Tanggal Akhir" readonly>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" onclick="cariHasilSablon()" class="btn btn-flat bg-navy margin" style="margin: 0; position: relative; width: 100%;"><b>Cari</b></button>
              </div>
            </div>
            <!-- footer modal -->
            <div class="modal-footer" style="text-align: center; color: black;"></div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div id="modal_detailHasilSablon" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg" style="width: 1050px;margin: auto; padding-top: 20px;">
          <!-- konten modal-->
          <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header" style="background-color:#00a65a;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title" style="text-align: center; color: black;">&nbsp;&nbsp;Detail Hasil Sablon</h3>
            </div>
            <!-- body modal -->
            <div class="modal-body" style="height:500px; overflow-y:scroll;">
              <div class="content">
                <div id="detail_hasil_sablon"></div>
              </div>
            </div>
            <!-- footer modal -->
            <div class="modal-footer" style="text-align: center; color: black;"></div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditHasilSablon">
      <div class="modal-dialog modal-lg" style="width:100%; height:100%; margin:0; padding:0;">
        <div class="modal-content" style="width: 100%; height:100%">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" data-target="#modalEditHasilSablon">&times;</button>
            <h4 class="modal-title">Ubah Hasil Sablon</h4>
          </div>
          <div class="modal-body" style="width: 100%; height:90%; overflow-y:scroll;">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-responsive" id="tableDetailRencana">
                  <thead>
                    <th>No.</th>
                    <th>Customer</th>
                    <th>Ukuran</th>
                    <th>Merek</th>
                    <th>Warna Plastik</th>
                    <th>Warna Sablon</th>
                    <th>Jumlah Rencana</th>
                    <th>Satuan Kg.</th>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>

              <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <i class="fa fa-cubes"></i>
                    <h3 class="box-title">Hasil Sablon</h3>
                  </div>
                  <div class="box-body">
                    <div class="form-group col-md-4">
  		            		<label>Kode Hasil Sablon :</label>
  				        	  <input type="text" class="form-control" value="" placeholder="Kode Sablon" name="kd_hasil" id="kd_hasil" required="" readonly="">
  				          </div>
  		  				    <div class="form-group col-md-4">
  		  					    <label>Hasil Jadi /Lembar :</label>
  				        	  <input type="number" class="form-control" value="" placeholder="Hasil Jadi Lembar" name="hasil_lembar" id="hasil_lembar" required="">
  				          </div>
    				        <div class="form-group col-md-4">
    				       		<label>Hasil Jadi /Kg :</label>
    				        	<input type="number" class="form-control" value="" placeholder="Hasil Jadi Berat" name="hasil_berat" id="hasil_berat" required="">
    				        </div>
    				        <div class="form-group col-md-4">
    				        	<label>Jenis Barang :</label>
    				        	<select class="form-control" name="jenis_barang" id="jenis_barang">
    				        		<option value="">Pilih Jenis Barang</option>
    				        		<option value="LOKAL">LOKAL</option>
    				        		<option value="EXPORT">EXPORT</option>
    				        	</select>
    				        </div>
    				        <div class="form-group col-md-4">
    				        	<label>Tanggal Pengerjaan :</label>
    				        	<input type="date" class="form-control" value="" placeholder="Tanggal Pengerjaan" name="tgl_pengerjaan" id="tgl_pengerjaan" required="">
    				        </div>
    				        <div class="form-group col-md-4">
    				        	<label>Keterangan</label>
    				        	<input type="text" class="form-control" value="" placeholder="Keterangan" name="keterangan" id="keterangan" required="">
    				        </div>
    								<div class="form-group col-md-4">
    				        	<label>Jumlah Berat Pengambilan</label>
    				        	<input type="number" class="form-control" value="" placeholder="Jumlah Berat Pengambilan Pastik Polos" name="jumlahBeratPengambilan" id="jumlahBeratPengambilan" required="">
    				        </div>
    								<div class="form-group col-md-4">
    				        	<label>Jumlah Lembar Pengambilan</label>
    				        	<input type="number" class="form-control" value="" placeholder="Jumlah Lembar Pengambilan Pastik Polos" name="jumlahLembarPengambilan" id="jumlahLembarPengambilan" required="">
    				        </div>
  								  <div class="form-group col-md-4"><br><br><br></div>
    								<div class="form-group col-md-4">
    				        	<label>Jumlah Berat Kembalian</label>
    				        	<input type="number" class="form-control" value="" placeholder="Jumlah Berat Pengembalian Pastik Polos" name="jumlahBeratPengembalian" id="jumlahBeratPengembalian" required="">
    				        </div>
    								<div class="form-group col-md-4">
    				        	<label>Jumlah Lembar Kembalian</label>
    				        	<input type="number" class="form-control" value="" placeholder="Jumlah Lembar Pengembalian Pastik Polos" name="jumlahLembarPengembalian" id="jumlahLembarPengembalian" required="">
    				        </div>
                  </div>
                </div>

                <div class="box box-primary">
                  <div class="box-header with-border">
                    <i class="fa fa-tint"></i>
		                <h3 class="box-title">Pemakaian Bahan</h3>
                  </div>
                  <div class="box-body">
                    <div class="col-md-12">
                      <table class="table">
                        <tr>
                          <td rowspan="3" style="vertical-align:middle;">Tambah Bahan</td>
                          <td>
                            <select class="form-control" id="cmbJenisBahan">
                              <option value="">--Pilih Jenis Bahan--</option>
                              <option value="MINYAK">Minyak</option>
                              <option value="CAT MURNI">Cat Murni</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control" id="cmbNamaBahan"></select>
                          </td>
                          <td>
                            <select class="form-control" id="cmbSatuan">
                              <option value="Kg">Kg</option>
                              <option value="Ons">Ons</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input type="number" class="form-control" id="txtJumlahBahan" placeholder="Jumlah Bahan" value="0" min="0">
                          </td>
                          <td>
                            <input type="number" class="form-control" id="txtSisaBahan" placeholder="Sisa Bahan" value="0" min="0">
                          </td>
                          <td>
                            <button type="button" id="btnTambahPenggunaanBahan" class="btn btn-md btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah</button>
                            <button type="button" id="btnBatalTambahBahan" class="btn btn-md btn-flat btn-danger"><i class="fa fa-undo"></i> Batal</button>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-12">
                      <table class="table table-responsive table-striped" id="tableJenisBahan">
                        <thead>
                          <th>No.</th>
                          <th>Jenis</th>
                          <th>Nama Barang</th>
                          <th>Warna</th>
                          <th>Jumlah</th>
                          <th>Sisa</th>
                          <th>Pilihan</th>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-md btn-flat btn-block btn-success" onclick="ubahHasilSablon();"><i class="fa fa-check"></i> Simpan</button>
                </div>
                <div class="col-md-4"></div>
              </div>
            </div>
          </div> <!-- Modal body -->
        </div>
      </div>
    </div>
</div>
