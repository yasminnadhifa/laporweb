<style>
  .btn-primary, .btn-primary.disabled {
  box-shadow: 0 2px 6px #d1b4b4;
  background-color: #B41515;
  border-color: #B41515; }
  .btn-primary:focus, .btn-primary.disabled:focus {
    background-color: #962626 !important; }
    .btn-primary:focus:active, .btn-primary.disabled:focus:active {
      background-color: #962626 !important; }
  .btn-primary:active, .btn-primary:hover, .btn-primary.disabled:active, .btn-primary.disabled:hover {
    background-color: #962626 !important; }

    .input-login:focus{
	outline: none;
	border: 1px solid #f53f51;
}
</style>

<body >

  <div id="app">
    <section class="section">
      <div class="container " style="margin-top:140px;">
      
        <div class="row ">
        
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          
            <div class="card card-danger" style="width: 400px;border-top: 2px solid #B41515;">
            
            <div class="d-flex justify-content-center">
              
              <img src="<?=base_url()?>template/dist/assets/img/logo.png" alt="logo" width="200" class="">
            </div>
              <div class="d-flex justify-content-center mt-4">
                <h4 style="color:#343434">Administrator Login</h4>
                
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <center>
              <h6 style="font-size:small">Hi! Welcome back to Admin Panel LMS Learning X</h6>
              </center>
              </div>
              

              <div class="card-body">
              <?= $this->session->flashdata('message'); ?> 
                <form method="POST" action="<?=base_url('Console')?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control input-login" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <!-- <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div> -->
                    </div>
                    <input id="password" type="password" class="form-control input-login"  name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary  btn-lg btn-block"  tabindex="4">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>