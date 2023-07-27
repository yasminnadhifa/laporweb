<style>
	@import url('https://fonts.googleapis.com/css?family=Poppins');
	.input-login {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}
.input-login:focus{
	outline: none;
	border: 1px solid #f53f51;
}
</style>



<body style="font-family: 'Poppins', sans-serif;">
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-5 col-md-12 col-12 col-sm-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
           <br>           <br>           <br>           <br>            <br>            <br>            <br>

            <h4 class="text-dark" style="margin-left: auto;">Ganti Password Anda untuk</h4>
            <h5><?= $this->session->userdata('reset_email')?></h5>
			<br>    
      <?= $this->session->flashdata('message'); ?>     
            <form class="user" method="post" ction="<?= base_url('Auth/changePassword'); ?>">
              <div class="form-group">
				<label>Password</label>
                <input type="password" class="form-control input-login"  id="password" name="password" placeholder="Masukkan password baru">
                <?= form_error('password', '<small class="text-danger pl-2 ">', '</small>'); ?>
              </div>
              <div class="form-group">
				<label>Ulangi Password</label>
                <input type="password" class="form-control input-login"  id="password2" name="password2" placeholder="Ulangi password baru">
                <?= form_error('password2', '<small class="text-danger pl-2 ">', '</small>'); ?>
              </div>
              <div class="form-group text-right">
			
                <button type="submit" class="form-control btn btn-danger btn-lg btn-icon icon-right" tabindex="4">
                  Ganti Password
                </button>
				
              </div>
            </form>
            
          </div>
        </div>
        <div class="col-lg-7  order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" style="background-image:url('<?= base_url() ?>template2/assets/img/unsplash/login-bgs.jpg')">
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