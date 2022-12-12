<div class="container">
  <div class="col-md-6 offset-md-3" style="margin-top: 60px;">
    <div class="card">
      <div class="card-header">
        Daftar | HotelK2
      </div>
      <div class="card-body">
        <?= form_open('account/registration') ?>
        <?= $this->session->flashdata('message') ?>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input type="text" name="nama" id="nama" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat" required></textarea>
        </div>
        <div class="form-group">
          <label for="no_hp">Nomor HP</label>
          <input type="number" name="no_hp" id="no_hp" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Nomor HP" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" aria-describedby="emailHelp" placeholder="Masukan Username" required>
          <?= form_error('username', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="form-group">
          <label for="password1">Password</label>
          <input type="password" name="password1" class="form-control" id="password1" placeholder="Masukan Password" required>
          <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
        </div>
        <div class="form-group">
          <label for="password2">Konfirmasi Password</label>
          <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukan Konfirmasi Password" required>
        </div>
        <div class="form-group">
          Sudah mempunyai akun? <a href="<?= base_url('account/login') ?>">Masuk</a>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
      </div>
    </div>
  </div>
</div>