<div class="container">
  <div class="col-md-6 offset-md-3" style="margin-top: 60px;">
    <div class="card">
      <div class="card-header">
        Masuk | Hotel K2
      </div>
      <div class="card-body">
        <?= form_open('account/login') ?>
        <?= $this->session->flashdata('message') ?>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" value="<?= set_value('username') ?>">
          <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class=" form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password">
          <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          Belum mempunyai akun? <a href="<?= base_url('account/registration') ?>">Daftar</a>
        </div>
        <button type="submit" class="btn btn-primary">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</div>