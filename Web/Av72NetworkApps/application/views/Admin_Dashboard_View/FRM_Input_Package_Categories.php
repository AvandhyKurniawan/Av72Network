<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Tambah Data Kategori Paket</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1-1" data-toggle="tab" onclick="PACKAGECATEGORYDATA.ajax.reload(null, false);">Daftar Data Kategori Internet</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">Tambah Data Kategori Internet</a></li>
              <li class="pull-right header"><i class="fa fa-th"></i> Menu Data Pegawai</li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-responsive table-striped" id="packageCategoriesListTable">
                      <thead>
                        <th width="10%">No.</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Diperbarui Pada</th>
                        <th>Pilihan</th>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
              </div><!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2-2">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <label>Nama Kategori</label>
                    </div>
                    <div class="col-md-1">
                      <label>:</label>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" id="txtCategoryName" class="form-control" placeholder="Masukan Nama Kategori">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-2">
                      <label>Keterangan</label>
                    </div>
                    <div class="col-md-1">
                      <label>:</label>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <textarea id="txtCategoryInformation" class="form-control" placeholder="Masukan Keterangan Bila Perlu" cols="80" rows="8"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-9">
                    <div class="pull-right">
                      <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary" onclick="savePackageCategoryData();" data-onclick="savePackageCategoryData();">
                        <img src="<?= base_url('assets/images/loading_1.svg'); ?>" style="display: none;" width="20px" height="20px;">
                        <i class="fa fa-plus" style="display: inline-block;"></i> Tambah Baru
                      </button>
                      <button type="button" class="btn btn-md btn-flat btn-danger" onclick="resetForm();"><i class="fa fa-refresh"></i> Batal</button>
                    </div>
                  </div>
                </div><!-- /.row -->
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          </div><!-- /.nav-tabs-custom -->
        </div><!-- /.col-md-12 -->
      </div><!-- /.row -->
    </div>
    <div class="box-footer">

    </div>
  </div>
</div>
