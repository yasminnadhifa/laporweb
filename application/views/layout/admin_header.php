<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Console</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/summernote/summernote-bs4.css">
  
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/node_modules/prismjs/themes/prism.css">


  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/chocolat/dist/css/chocolat.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
  <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins');

    * {
      font-family: 'Poppins', sans-serif;
      src: url('https://fonts.googleapis.com/css?family=Poppins');
    }

    .test:hover {
      color: #B41515;
    }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg" style="background-color: #B41515;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
          <div class="search-element">

            <div class="search-backdrop"></div>

          </div>
        </form>
        <ul class="navbar-nav navbar-right">




          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?= base_url('assets/images/profil/') . $user['image']; ?>" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block"><?= $user['nama']; ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= site_url('Console/profile') ?>?id=<?= $user['id'] ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('Console/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">LAPOR</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">LP</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= base_url('Console/dashboard') ?>">
                <div class="test"><i class="fas fa-th-large test"></i>  <span>Dashboard</span> </div>
              </a></li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <div class="test"><i class="far fa-user"></i><span>User</span></div>
              </a>
              <ul class="dropdown-menu test">
                <li><a class=" test" href="<?= base_url('Console/school') ?>"><span class="test">School</span></a></li>
                <li><a class="nav-link test" href="<?= base_url('Console/user') ?>"><span class="test">User Active</span></a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <div class="test"><i class="far fa-file-alt"></i> <span>Reports</span></div>
              </a>
              <ul class="dropdown-menu test">
                <li><a class=" test" href="<?= base_url('Console/category') ?>"><span class="test">Category</span></a></li>
                <li><a class="nav-link test" href="<?= base_url('Console/reports') ?>"><span class="test">Report</span></a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="<?= base_url('Console/aspiration') ?>">
                <div class="test"><i class="fas fa-columns"></i> <span>Aspiration</span></div>
              </a></li>
            <li><a class="nav-link" href="<?= base_url('Console/testimonial') ?>">
                <div class="test"><i class="fas fa-fire"></i> <span>Service Rating</span></div>
              </a></li>
          </ul>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

          </div>
        </aside>
      </div>