<!DOCTYPE html>
<html lang="en">
<head>
  <title>LAPOR BY LEARNINGX</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/aos/css/aos.css">
  <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<style>


</style>


</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <img src="<?=base_url()?>/assets/images/Lapor2.png" >
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
            <img src="<?=base_url()?>/assets/images/Lapor2.png" width="130px" >
              <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Konsumen/indexUser') ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Konsumen/tentang') ?>">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Konsumen/pengaduan') ?>">Riwayat</a>
          </li>
          

          <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?= base_url('assets/images/profil/') . $user['image']; ?>" width="40" height="40" class="rounded-circle">
        </a>

        <div class="dropdown-menu" >
          <a class="dropdown-item test" href="<?= base_url('Konsumen/profile/') . $user['id']; ?>">Ubah Profil</a>
          <a class="dropdown-item test" onclick="logout()" id="logoutLink">Keluar</a>
        </div>
      </li>   
    </ul>
  </div>


        </ul>
      </div>
    </div> 
    </nav>   
  </header>

  <script>
function logout() {
    // Tampilkan konfirmasi dialog menggunakan SweetAlert
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect ke halaman logout setelah konfirmasi logout
            window.location.href = "<?= base_url('Auth/logout') ?>";
        }
    });
}
</script>