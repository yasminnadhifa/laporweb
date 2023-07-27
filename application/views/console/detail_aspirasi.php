

     <!-- Main Content -->
     <div class="main-content">
       <section class="section">
         <div class="section-header">
           <h1>Detail of Aspiration Report</h1>
         </div>

         <div class="section-body">
         <div class="card">
                  <div class="card-header">
                    <h4>[<?= $aspirasi['judul']; ?>] - <?= $aspirasi['nama']; ?> </h4>
                    <div class="card-header-action">
                    <a href="<?= base_url('Extra/aspirasi/') . $aspirasi['id']; ?>" class="btn btn-danger">Save to PDF</a>
                    </div>
                    
                  </div>
                  <div class="card-body">
                  <div>
                   <label style="font-weight: bold; " for="Name">Reporting date</label>
                 </div>
                 <div>
                   <span id="judul"><?= $aspirasi['created_at']; ?></span>
                 </div>
                 <div>
                   <label style="font-weight: bold; margin-top:20px;" for="Name">Title</label>
                 </div>
                 <div>
                   <span id="judul"><?= $aspirasi['judul']; ?></span>
                 </div>
                  <div>
                   <label style="font-weight: bold; margin-top:20px;" for="Name">Content</label>
                 </div>
                 <div>
                   <span id="judul"><?= $aspirasi['isi']; ?></span>
                 </div>
                    <div>
                   <label style="font-weight: bold; margin-top:20px;" for="Name">Document</label>
                 </div>
                 <?php if (empty($aspirasi['dokumen'])): ?>
                  <span id="judul">No document</span>
    <?php else: ?>
                    <div class="chocolat-parent">
                      <a href="<?= base_url('/assets/images/aspirasi/') . $aspirasi['dokumen']; ?>" class="chocolat-image" title="<?= $aspirasi['dokumen']; ?>">
                        <div data-crop-image="285">
                          <img alt="image" src="<?= base_url('/assets/images/aspirasi/') . $aspirasi['dokumen']; ?>" class="img-fluid">
                        </div>
                      </a>
                    </div>
                    <?php endif; ?>
                  </div>
                 
                </div>
              </div>
         </div>
       </section>
     </div>

     </div>
     </div>

