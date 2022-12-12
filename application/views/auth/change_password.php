<!-- Begin Page Content -->
<div class="container-fluid">
      <div class="container">
            <div class="row">
                  <div class="col-md-12" style="margin-top: 60px;">
                        <div class="card">
                              <div class="card-header">
                                    Ubah Password
                              </div>
                              <div class="card-body">
                                    <?= $this->session->flashdata('message') ?>
                                    <form action="<?= base_url('account/changepassword') ?>" method="post">
                                          <div class="form-group">
                                                <label for="current_password">Password Lama</label>
                                                <input type="password" id="current_password" name="current_password" class="form-control">
                                                <?= form_error('current_password', ' <small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                          <div class="form-group">
                                                <label for="password1">Password Baru</label>
                                                <input type="password" class="form-control" id="password1" name="password1">
                                                <?= form_error('password1', ' <small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                          <div class="form-group">
                                                <label for="password2">Konfirmasi Password Baru</label>
                                                <input type="password" class="form-control" id="password2" name="password2">
                                                <?= form_error('password2', ' <small class="text-danger pl-3">', '</small>'); ?>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->