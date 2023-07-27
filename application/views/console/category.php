<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Category</h1>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
   
            <div class="card-header">
              
              <h4>Data Category</h4>
              
              
            </div>
            <div class="card-body">
            <div style="margin-bottom:20px;">
                    <a href="<?= base_url() ?>Console/add_category" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add Category</a>
                </div>
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>Category</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($category as $us) : ?>
                      <tr>
                        <td><?= $i; ?>.</td>
                        <td><?= $us['jenis']; ?></td>
                        <td><a href="<?= base_url('Console/edit_category/') . $us['id']; ?>" class="btn btn-secondary"><i class="far fa-edit"></i>Edit</a>
                        <a href="<?= base_url('Console/delete_category/') . $us['id']; ?>" class="btn btn-warning" onclick="return confirm_delete('Are you sure?')"><i class="fas fa-times"></i> Delete</a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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
<script>


    function confirm_delete(question) {

        if (confirm(question)) {

            alert("Action to delete");

        } else {
            return false;
        }

    }
</script>