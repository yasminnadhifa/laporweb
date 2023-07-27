<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins');

  .input-login {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
  }

  .input-login:focus {
    outline: none;
    border: 1px solid #f53f51;
  }
</style>


<body style="font-family: 'Poppins', sans-serif;">
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-5 col-md-12 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <br> <br> <br>

            <h4 class="text-dark" style="margin-left: auto;">Registrasi Konsumen</h4>
            <br>
            <form method="post" class="user" action="<?= base_url('Auth/registrasi'); ?>">
              <div class="form-group">
                <label for="lembaga">Lembaga</label>
                <select name="lembaga" value="<?= set_value('lembaga'); ?>" id="lembaga" class="form-control input-login ">
                  <option value="" disabled selected>Pilih Lembaga</option>
                  <?php foreach ($lembaga as $p) : ?>
                    <option value="<?= $p['nama']; ?>"><?= $p['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('lembaga', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="lembaga">Role</label>
                <select name="role" value="<?= set_value('role'); ?>" id="role" class="form-control input-login ">
                  <option value="" disabled selected>Pilih Role</option>
                    <option value="Siswa">Siswa</option>
                    <option value="Guru">Guru</option>
                    <option value="Pendamping">Pendamping</option>
                </select>
                <?= form_error('role', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" value="<?= set_value('nama'); ?>" class="form-control input-login" id="nama" name="nama" placeholder="Nama">
                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
              </div>
              <div class=row>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>No HP</label>
                    <div class="input-group">
                        <div class="input-group-prepend ">
                          <div class="input-group-text input-login">+62</div>
                        </div>
                        <input type="text" value="<?= set_value('nohp'); ?>" class="form-control input-login" id="inlineFormInputGroup" name="nohp" placeholder="Nomor HP">
                    <?= form_error('nohp', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                    
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" value="<?= set_value('email'); ?>" class="form-control input-login" id="email" name="email" placeholder="Email">
                    <?= form_error('email', '<small class="text-danger pl-2 ">', '</small>'); ?>
                  </div>
                </div>


              </div>
              <div class=row>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password"  class="form-control input-login" name="password" id="password" placeholder="Password">
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label>Ulangi Password</label>
                    <input type="password"  class="form-control input-login" name="password2" id="password2" placeholder="Ulangi password">
                    <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>

              </div>


              <div class="form-group text-right">
                <button type="submit" name="daftar" class="form-control btn btn-danger btn-lg btn-icon icon-right" tabindex="4">
                  Daftar
                </button>

              </div>
            </form>

            <span style="margin-top: 200px; text-align: center;">Sudah punya akun? <a href="<?= base_url('Auth') ?>" style="color:red;">Login Sekarang</a> </span>

          </div>
        </div>
        <div class="col-lg-7 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" style="background-image:url('<?= base_url() ?>template2/assets/img/unsplash/login-bgs.jpg')">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Selamat Datang</h1>
                <h5 class="font-weight-normal text-muted-transparent">Lapor By LearningX!</h5>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
  </div>