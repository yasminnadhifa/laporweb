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
            <h1>School</h1>
          </div>

          <div class="section-body">
          <div class="card">
                  <div class="card-header">
                    <h4>Add school</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">School name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control input-login" id="nama" name="nama" value="<?= set_value('nama'); ?>" placeholder="Name">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control input-login" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>" placeholder="Address">
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Province</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control input-login" name="provinsi" value="<?= set_value('provinsi'); ?>" id="provinsi" placeholder="Province">
                        <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone number</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control input-login" name="nohp" id="nohp" value="<?= set_value('nohp'); ?>" placeholder="Phone number">
                        <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-4">
                      <select id="status" name="status" class="form-control input-login">
                          <option class="selects">Choose status</option>
                          <option class="selects" value="Active">Active</option>
                          <option class="selects" value="Not active">Not active</option>
                          
                        </select>
                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                      </div>
                    </div>
                    
                    <a href="<?= base_url('Console/school') ?>" class="btn btn-light">Back</a>
                        <button type="submit" name="tambah" class="btn btn-danger float-right">Save changes</button>
  
                        </form>
          </div>
          </div>
        </section>
      </div>

    </div>
  </div>
