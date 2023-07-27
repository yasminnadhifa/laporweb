<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>User Active</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
   
            <div class="card-header">
              
              <h4>Data User</h4>
              
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>School</th>
                      <th>Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($konsumen as $us) : ?>
                      <tr>
                        <td><?= $i; ?>.</td>
                        <td><?= $us['nama']; ?></td>
                        <td><?= $us['email']; ?></td>
                        <td> <?= $us['lembaga']; ?>
                        </td>
                        <td><?= $us['nohp']; ?></td>

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
