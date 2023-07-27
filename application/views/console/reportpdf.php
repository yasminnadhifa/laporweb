<!DOCTYPE html>
<html>
<head>
  <title>LAPOR BY LEARNINGX</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@200;400&display=swap" rel="stylesheet">
  <style>
    *{
      font-family: 'Montserrat', sans-serif;
    }
    html{
      font-family: 'Montserrat', sans-serif;
      margin: 0;
      padding: 0;
     
    }
    body{
      padding: 100px;
      background-image: url('<?= base_url('/assets/images/cover.png') ?>');
    }

    h1 {
      font-family: 'Montserrat', sans-serif;
      text-align: center;
    }

    .section {
      font-family: 'Montserrat', sans-serif;
      margin-bottom: 20px; 

    }

    .section-title {
      font-family: 'Montserrat', sans-serif;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .section-content {
      font-family: 'Montserrat', sans-serif;
      font-size: 14px;
    }
  </style>
</head>
<body>
<div style="margin-top:60px;">
  <h1>Report [<?= $laporan['no_laporan']; ?> - <?= $laporan['nama']; ?>]</h1>
</div>

  <div class="section">
    <div class="section-title">Reporting date</div>
    <div class="section-content">
    <?= $laporan['created_at']; ?>
    </div>
  </div>

  <div class="section">
    <div class="section-title">Incident date</div>
    <div class="section-content">
    <?= $laporan['tanggal']; ?>
    </div>
  </div>

  <div class="section">
    <div class="section-title">Category</div>
    <div class="section-content">
    <?= $laporan['kategori']; ?>
    </div>
  </div>
  <div class="section">
    <div class="section-title">Title</div>
    <div class="section-content">
    <?= $laporan['judul']; ?>
    </div>
  </div>
  <div class="section">
    <div class="section-title">Content</div>
    <div class="section-content">
    <?= $laporan['isi']; ?>
    </div>
  </div>
  <div style="page-break-before: always;">

  <div class="section">
    <div class="section-title">Document</div>
    <div class="section-content">
    <?php if (empty($laporan['dokumen'])): ?>
                No document
    <?php else: ?>
  
    <a href="<?= base_url('/assets/images/laporan/') . $laporan['dokumen']; ?>" ><img alt="image" src="<?= base_url('/assets/images/laporan/') . $laporan['dokumen']; ?>" width="200px" height="200px" ></a>
    </div>
    <?php endif; ?>
  </div>
  <div class="section">
    <div class="section-title">Message</div>
    <div class="section-content">
    <?= $laporan['pesan']; ?>
    </div>
  </div>
  <div class="section">
    <div class="section-title">Status</div>
    <div class="section-content">
    <?= $laporan['status']; ?>
    </div>
  </div>
</div>

</body>
</html>