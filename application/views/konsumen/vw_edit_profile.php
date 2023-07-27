<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style type="text/css">
    @import url('<?= base_url() ?>/assets/css/styleProfile.css');

    .center-ball {

        border: 0;
        height: 4px;
        width: 10%;

        position: relative;

        background: #B41515;

    }

    .banner-tes {
        background-color: #f7f8fa;

    }

    .border-input:focus {
        outline: none;
        border: 1px solid #f53f51;
    }

    .input-login:focus {
    outline: none;
    border: 1px solid #f53f51;
  }
</style>
<div class="banner" style="padding-bottom:20px; ">
    <h1 class="font-weight-semibold">Edit Profil</h1>
    <h6 class="font-weight-normal text-muted pb-3">Lakukan perubahan pada informasimu</h6>
    <hr class="center-ball">

</div>
<form method="post" action="<?= base_url('Konsumen/edit') ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
<div class="banner-tes">
    <div class="container" style="background-color: #f5f6fa; ">

        <div class="body-class" style="padding-top:50px; padding-bottom:20px; ">
            <div class="row gutters ">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-51">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile" style="padding-top:10px;">
                                    <div class="user-avatar">
                                        <div class="rounded-box">

                                            <div class="outer">
                                                <img src="<?= base_url('assets/images/profil/') . $user['image']; ?>" alt="Maxwell Admin" style="width: 100% !important;height: 100% !important;">
                                                <div class="inner">

                                                    <input class="inputfile" type="file" name="image" >
                                                    <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                        </svg></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="padding-top:10px;">
                                    <h5 class="user-name"><?= $user['nama']; ?></h5>
                                    <h6 style="color: black; font-size:15px;">Role: <?= $user['role']; ?></h6>
                                    <h6 class="user-email">anggota sejak <?= date('d F Y', $user['date_created']); ?></h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Profil</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Password</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
                    <div class="card h-100 tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Data Personal</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="lembaga">Nama Institusi</label>
                                        <input type="text" value="<?= $konsumen['lembaga']; ?>" class="form-control input-login" id="lembaga" name="lembaga" placeholder="Masukkan Lembaga" readonly>

                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" value="<?= $konsumen['email']; ?>" class="form-control input-login" id="email" name="email" placeholder="Masukkan Email" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" value="<?= $konsumen['nama']; ?>"  class="form-control input-login" id="nama" name="nama" placeholder="Masukkan Nama">
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="nohp">No HP</label>
                                        <input type="text" value="<?= $konsumen['nohp']; ?>" class="form-control input-login" id="nohp" name="nohp" placeholder="Masukkan No Hp">
                                    </div>
                                </div>
                            </div>
             
                            <div class="row gutters" style="margin-top:20px;">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">

                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>


                    <!-- yang kedua -->
                    <div class="card h-100 tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<div class="card-body">
<form method="post" action="<?= base_url('Konsumen/edit_password') ?>" >
    <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h6 class="mb-2 text-primary">Ubah Password</h6>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label for="current_password">Password saat ini</label>
                <input type="password"  class="form-control input-login" id="current_password" name="current_password" placeholder="Masukkan password saat ini">
                
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label for="nama">Password baru</label>
                <input type="password"  class="form-control input-login" id="new_password" name="new_password" placeholder="Masukkan password baru">

            </div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-group">
                <label for="nohp">Konfirmasi password baru</label>
                <input type="password"  class="form-control input-login" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password baru">
                
            </div>
        </div>
    </div>
    <input type="checkbox" onclick="myFunction()">Lihat password

    <div class="row gutters" style="margin-top:20px;">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="text-right">
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Ubah</button>
            </div>
        </div>
    </div>
</form>
</div>
</div>



</div>



                </div>
            </div>
        </div>

    </div>
</div>
                 

<script>
function myFunction() {
  var x = document.getElementById("current_password");
  var y = document.getElementById("new_password");
  var z = document.getElementById("confirm_password");
  if (x.type === "password" || y.type === "password" || z.type === "password") {
    x.type = "text";
    y.type = "text";
    z.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
    z.type = "password";
  }
}

</script>