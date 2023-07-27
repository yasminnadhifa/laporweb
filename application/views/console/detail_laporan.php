<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail of Report</h1>
    </div>

    <div class="section-body">
      <!-- Card -->
      <div class="card">

        <div class="card-header">
          <h4>[<?= $laporan['no_laporan']; ?>] - <?= $laporan['nama']; ?> - <?= $laporan['lembaga']; ?></h4>
          <div class="card-header-action">
            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
            <a href="<?= base_url('Extra/report/') . $laporan['id']; ?>" class="btn btn-danger">Save to PDF</a>
          </div>
        </div>
        <div class="collapse show" id="mycard-collapse">
          <div class="card-body">

            <div>
              <label style="font-weight: bold; " for="Name">Reporting date</label>
            </div>
            <div>
              <span id="judul"><?= $laporan['created_at']; ?></span>
            </div>
            <div>
              <label style="font-weight: bold; margin-top:20px;" for="Name">Incident date</label>
            </div>
            <div>
              <span id="isi"><?= $laporan['tanggal']; ?></span>
            </div>
            <div>
              <label style="font-weight: bold; margin-top:20px;" for="Name">Category</label>
            </div>
            <div>
              <span id="status"><?= $laporan['kategori']; ?></span>
            </div>
            <div>
              <label style="font-weight: bold; margin-top:20px;" for="Name">Title</label>
            </div>
            <div>
              <span id="pesan"><?= $laporan['judul']; ?> </span>
            </div>
            <div>
              <label style="font-weight: bold; margin-top:20px;" for="Name">Content</label>
            </div>
            <div>
              <span id="pesan"><?= $laporan['isi']; ?> </span>
            </div>
            <div>
              <label style="font-weight: bold; margin-top:20px;" for="Name">Document</label>
            </div>
            <div>
            <?php if (empty($laporan['dokumen'])): ?>
                  <span id="judul">No document</span>
    <?php else: ?>
              <div class="chocolat-parent">
                <a href="<?= base_url('assets/images/laporan/') . $laporan['dokumen']; ?>" class="chocolat-image" title="<?= $laporan['dokumen']; ?>">
                  <div data-crop-image="285">
                    <img alt="image" src="<?= base_url('assets/images/laporan/') . $laporan['dokumen']; ?>" class="img-fluid">
                  </div>
                </a>
              </div>
              <?php endif; ?>
            </div>
            <div>
              <label style="font-weight: bold; margin-top:20px;" for="Name">Message</label>
            </div>
            <div>
              <span id="pesan"><?= $laporan['pesan']; ?> </span>
            </div>
            <div>
              <label style="font-weight: bold; margin-top:20px;" for="Name">Status</label>
            </div>
            <div>
              <span id="pesan"><?= $laporan['status']; ?> </span>
            </div>

          </div>

        </div>

      </div>
      <!-- end -->
      <!-- input -->
      <div class="card">
        <div class="card-header">
          <h4>Add detail</h4>
        </div>
        <div class="card-body">
          <form method="POST">
            <input type="hidden" name="id" value="<?= $laporan['id']; ?>">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Message</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control input-login" name="pesan" id="pesan"   placeholder="Message"><?= $laporan['pesan']; ?></textarea>
                <?= form_error('pesan', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Status</label>
              <div class="col-sm-4">
                <select id="status" name="status" class="form-control input-login" >
                  <option class="selects disabled selected">Choose status</option>
                  <option class="selects" value="Menunggu konfirmasi" 
                  <?php if ($laporan['status'] == "Menunggu konfirmasi") {
                                                                echo "selected";
                                                            } ?>>Waiting for response</option>
                  <option class="selects"  value="Sedang dalam peninjauan"
                  <?php if ($laporan['status'] == "Sedang dalam peninjauan") {
                                                                echo "selected";
                                                            } ?>>Under Review</option>
                  <option class="selects" value="Selesai"
                  <?php if ($laporan['status'] == "Selesai") {
                                                                echo "selected";
                                                            } ?>>Finished</option>

                </select>
                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>

            <a href="<?= base_url('Console/reports') ?>" class="btn btn-light">Back</a>
            <button type="submit" name="tambah" class="btn btn-danger float-right">Save changes</button>

                        <?php
            $nohp = $laporan['nohp'];
            $message = $laporan['pesan'];
            $url = 'https://api.whatsapp.com/send?phone=' . $nohp . '&text=' . $message;

            

            echo '<a href="' . $url . '" class="btn btn-danger">Reply to WA</a>';
            ?>
          </form>
        </div>
      </div>
      <!-- end -->
    </div>
  </section>
</div>

</div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var img = document.getElementById("myImg");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
</script>