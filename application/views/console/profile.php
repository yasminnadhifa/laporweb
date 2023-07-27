
  
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="<?= base_url('Console/dashboard') ?>">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">

        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="<?= base_url('/assets/images/profil/') . $user['image']; ?>" class="rounded-circle profile-widget-picture">

              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name"><?= $user['nama']; ?><div class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div>Administrator
                  </div>
                </div>

              </div>

            </div>
          </div>
          <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
              <div class="card-header">
                <h4>Profile</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="home" aria-selected="true">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#password" role="tab" aria-controls="profile" aria-selected="false">Password</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="home-tab">
                    <!-- input -->

                    <form method="post" action="<?= base_url('Console/profile') ?>"  enctype="multipart/form-data">

                      <div class="card-body">

                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>" required="" readonly>

                        </div>
                        <div class="form-group">
                          <label>Name</label>
                          <input type="text" class="form-control" value="<?= $user['nama']; ?>" name="nama" id="nama" required="">
                          <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                          <label>Avatar</label>
                          <div class="custom-file" >
                          <input type="file" class="form-control custom-file-input" name="image" id="name">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button type="submit"class="btn btn-secondary">Save Changes</button>
                      </div>
                    </form>

                    <!-- end -->


                  </div>
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="profile-tab">
                  <form method="post" action="<?= base_url('Console/profilepass') ?>"  enctype="multipart/form-data">

<div class="card-body">

  <input type="hidden" name="id" value="<?= $user['id']; ?>">
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" required="" >
    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
  </div>
  <div class="form-group">
    <label>Confirm password</label>
    <input type="password" class="form-control"  name="password2" id="password2" required="">
    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
  </div>

</div>
<div class="card-footer text-right">
  <button type="submit"class="btn btn-secondary">Save Changes</button>
</div>
</form>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>

  </div>
  </div>

  