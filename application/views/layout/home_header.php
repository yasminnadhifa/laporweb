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

.stars {
  display: flex;
  align-items: center;
  gap: 25px;
}
.stars i {
  color: #e6e6e6;
  font-size: 35px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.stars i.active {
  color: red;
}
</style>


</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <img src="<?=base_url()?>/assets/images/Lapor2.png" alt="">
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
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Konsumen') ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tentang">Tentang</a>
          </li>
          <li class="nav-item" style="margin-left: 10px; margin-right:10px;">
            <a href="<?= base_url('Auth') ?>" class="btn btn-danger" >Login</a>
          </li>
          <li class="nav-item" >
            <a href="<?= base_url('Auth/registrasi') ?>" class="btn btn-outline-danger">Register</a>
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>

 