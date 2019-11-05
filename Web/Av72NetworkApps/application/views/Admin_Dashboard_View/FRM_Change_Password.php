<div class="container-fluid">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Ubah Kata Sandi</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <label>Kata Sandi Lama</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                    <input type="password" id="txtOldPassword" class="form-control" placeholder="Masukan Kata Sandi Lama Anda">
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label>Kata Sandi Baru</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                    <input type="password" id="txtPassword" class="form-control" onkeyup="checkLengthPassword(this);" placeholder="Masukan Kata Sandi Lama Anda">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="text-red fade" id="lblWarningUpass">Kata Sandi Terlalu Pendek</label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">
                    <label>Konfirmasi Kata Sandi Baru</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                    <input type="password" id="txtConfirmPassword" class="form-control" onkeyup="comparePassword('txtPassword','txtConfirmPassword');" placeholder="Masukan Kata Sandi Lama Anda">
                    </div>
                </div>
                <div class="col-md-1" style="margin:0; padding:0;">
                    <label class="text-red fade" id="lblWarningUconfirm"><i class="fa fa-remove"></i></label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-5">
                    <button type="button" id="btnAction" class="btn btn-md btn-flat btn-primary pull-right" onclick="changePasswordData();" data-onclick="changePasswordData();">
                        <img src="<?= base_url('assets/images/loading_1.svg'); ?>" style="display: none;" width="20px" height="20px;">
                        <i class="fa fa-pencil" style="display: inline-block;"></i> Ubah
                    </button>
                </div>
                <div class="col-md-1" style="margin:0; padding:0;">&nbsp;</div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        
    </div>
  </div>
</div>
