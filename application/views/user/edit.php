<div class="container">
  <div class="row">
    <div class="col-md-12" style="margin-top: 60px;">
      <div class="card">
        <div class="card-header">
          Edit Penginapan | Admin
        </div>
        <div class="card-body">

          <?= form_open_multipart() ?>
          <?= $this->session->flashdata('message') ?>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" value="<?= $detail->nama ?>" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" disabled>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input name="alamat" class="form-control" placeholder="Masukan Alamat" value="<?= $detail->alamat ?>" disabled>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nomor HP</label>
            <input type="text" name="no_hp" value="<?= $detail->no_hp ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nomor HP" disabled>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" value="<?= $detail->username ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Username" disabled>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Level</label>
            <select name="level" class="form-control">
              <option value="">Pilih Level</option>
              <?php
              $level = array(1 => 'admin', 2 => 'user');
              foreach ($level as $key => $value) {
                if ($detail->level == $key) {
                  $selected = ' selected';
                } else {
                  $selected = '';
                }
                echo '<option value="' . $key . '"' . $selected . '>' . ucwords($value) . '</option>';
              }
              ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>