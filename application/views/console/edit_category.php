<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>

.input-login:focus{
	outline: none;
	border: 1px solid #B41515;
}
.selects:hover{
    background-color: #B41515;
}
</style>
     
     <!-- Main Content -->
     <?= $this->session->flashdata('message'); ?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Category</h1>
          </div>

          <div class="section-body">
          <div class="card">
                  <div class="card-header">
                    <h4>Edit category</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST">
                    <input type="hidden" name="id" value="<?= $category['id']; ?>">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control input-login" id="jenis" name="jenis" value="<?= $category['jenis']; ?>" placeholder="Category">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    
                    <a href="<?= base_url('Console/category') ?>" class="btn btn-light">Back</a>
                        <button type="submit" name="tambah" class="btn btn-danger float-right">Save changes</button>
  
                        </form>
          </div>
        </section>
      </div>

    </div>
  </div>
