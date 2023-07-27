<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
  .drop-zone {
    max-width: 500px;
    height: 200px;
    padding: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-family: "Quicksand", sans-serif;
    font-weight: 500;
    font-size: 20px;
    cursor: pointer;
    color: #cccccc;
    border: 4px dashed #b55050;
    border-radius: 10px;
  }

  .drop-zone--over {
    border-style: solid;
  }

  .drop-zone__input {
    display: none;
  }

  .drop-zone__thumb {
    width: 100%;
    height: 100%;
    border-radius: 10px;
    overflow: hidden;
    background-color: #cccccc;
    background-size: cover;
    position: relative;
  }

  .drop-zone__thumb::after {
    content: attr(data-label);
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 5px 0;
    color: #ffffff;
    background: rgba(0, 0, 0, 0.75);
    font-size: 14px;
    text-align: center;
  }
</style>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>School</h1>
    </div>
    
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <?= $this->session->flashdata('message'); ?>
            <div class="card-header">

              <h4>Data School</h4>


            </div>
            <div class="card-body">
              <div style="margin-bottom:20px;">
                <a data-target="#exampleModal" data-toggle="modal" class="btn btn-outline-success"><i class="bi bi-file-earmark-spreadsheet"></i> Import Excel</a>
                <a href="<?= base_url() ?>Console/add" class="btn btn-outline-dark"><i class="fas fa-plus"></i> Add School</a>
              </div>
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>
                        No
                      </th>
                      <th>School Name</th>
                      <th>Address</th>
                      <th>Province</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lembaga as $us) : ?>
                      <?php
                      $status = $us['status'];
                      if ($status === 'Active') {
                        $class = 'badge badge-success';
                      } else if ($status === 'Not active') {
                        $class = 'badge badge-danger';
                      } else {
                        $class = 'unknown-class';
                      }
                      ?>
                      <tr>
                        <td><?= $i; ?>.</td>
                        <td><?= $us['nama']; ?></td>
                        <td><?= $us['alamat']; ?></td>
                        <td> <?= $us['provinsi']; ?>
                        </td>
                        <td><?= $us['nohp']; ?></td>
                        <td>
                          <div class="<?= $class ?>" id="myDiv"><?= $us['status']; ?></div>
                        </td>
                        <td><a href="<?= base_url('Console/edit_school/') . $us['id']; ?>" class="btn btn-secondary"><i class="far fa-edit"></i>Edit</a>
                          <a href="<?= base_url('Console/delete_school/') . $us['id']; ?>" class="btn btn-warning" onclick="return confirm_delete('Are you sure?')"><i class="fas fa-times"></i> Delete</a>
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

<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= base_url() ?>Extra/loadfile" enctype="multipart/form-data" method="POST">
      <div class="modal-header">
        <h5 class="modal-title">Upload Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="drop-zone" style="margin-bottom: 15px;">
          <span>Drop file here or click to upload</span>
          <input type="file" name="myFile" class="drop-zone__input" >
        </div>
        <div>
          <span>Download Excel template <a href="<?= base_url() ?>Extra/getTemplate" style="color:#b55050;">here</a></span>
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="submit" class="btn btn-outline-dark">Upload</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- end -->





</div>
</div>
<script>
  document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");
    dropZoneElement.addEventListener("click", (e) => {
      inputElement.click();
    });
    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateThumbnail(dropZoneElement, inputElement.files[0]);
      }
    });
    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("drop-zone--over");
    });
    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });
    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();
      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;
        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
      }
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
      dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }
    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
      thumbnailElement = document.createElement("div");
      thumbnailElement.classList.add("drop-zone__thumb");
      dropZoneElement.appendChild(thumbnailElement);
    }
    thumbnailElement.dataset.label = file.name;
    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = () => {
        thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
      };
    } else {
      thumbnailElement.style.backgroundImage = null;
    }
  }

  function confirm_delete(question) {

    if (confirm(question)) {

      alert("Action to delete");

    } else {
      return false;
    }

  }


</script>