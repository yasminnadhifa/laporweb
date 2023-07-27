<style>
    .un {
        color: #fae896;
        font-size: 20px;
        cursor: pointer;
        transition: color 0.2s ease;
    }
</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Service Rating</h1>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">

                            <h4>Data Service Rating by User</h4>


                        </div>
                        <div class="card-body">
                        <div style="margin-bottom:20px;">
                    <a href="<?= base_url() ?>Extra/exportTesti" class="btn btn-outline-success" ><i class="fas fa-download"></i>Save to Excel</a>
                </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>School</th>
                                            <th>Star</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($testi as $us) : ?>
                                            <tr>
                                                <td><?= $i; ?>.</td>
                                                <td><?= $us['nama']; ?></td>
                                                <td><?= $us['lembaga']; ?></td>
                                                <td> <?php
                                                        $rating = $us['star'];  // Example rating value

                                                        for ($is = 1; $is <= 5; $is++) {
                                                            if ($is <= $rating) {
                                                                echo '<i class="fas fa-star un"></i>'; // Solid star icon
                                                            } else {
                                                                echo '<i class="far fa-star un"></i>'; // Outlined star icon
                                                            }
                                                        }
                                                        ?>
                                                </td>
                                                <td>
                                                <?php
            $nohp = $us['nohp'];
            $url = 'https://wa.me/+62' . $nohp;

            

            echo '<a href="' . $url . '" class="btn btn-danger">Reply to WA</a>';
            ?>
                                                    <a href="#" onclick="get(<?= $us['id']; ?>)" class="btn btn-icon icon-left btn-info" data-target="#exampleModal" data-toggle="modal"><i class="fas fa-info-circle"></i> Detail</a>
                                                    <a href="<?= base_url('Console/delete_testi/') . $us['id']; ?>" class="btn btn-warning" onclick="return confirm_delete('Are you sure?')"><i class="fas fa-times"></i> Delete</a>
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
            <div class="modal-header">
                <h5 class="modal-title">Detail Service Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <label style="font-weight: bold; margin-top:20px;" for="Name">Created at: </label>
                </div>
                <div>
                    <span id="tanggal">cef</span>
                </div>
                <div>
                    <label style="font-weight: bold; margin-top:20px;" for="Name">Name: </label>
                </div>
                <div>
                    <span id="nama">cef</span>
                </div>
                <div>
                    <label style="font-weight: bold; margin-top:20px;" for="Name">School: </label>
                </div>
                <div>
                    <span id="sekolah">cef</span>
                </div>
                <div>
                    <label style="font-weight: bold; margin-top:20px;" for="Name">Star: </label>
                </div>
                <div>
                    <span id="star"></span>
                </div>
                <div>
                    <label style="font-weight: bold; margin-top:20px;" for="Name">Message: </label>
                </div>
                <div>
                    <span id="pesan">cef</span>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>

<!-- end -->






</div>
</div>

<script>
    function get(id) {

        $.ajax({
            url: "<?php echo base_url(); ?>Console/detail_testi/" + id,
            type: "GET",
            dataType: "json",
            success: function(product) {
                // do something with the product data
                console.log(product);

                if (product[0].star !== undefined) {
                    displayRating(product[0].star);
                }


                // populate the modal with the product data
                $('#tanggal').text(product[0].created_at);
                $('#nama').text(product[0].nama);
                $('#sekolah').text(product[0].lembaga);

                $('#pesan').text(product[0].pesan);;

                // show the modal
                $('#exampleModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Request failed. Returned status of ' + xhr.status);
            }
        });
    }

    function displayRating(rating) {
        var $ratingStars = $('#star');
        $ratingStars.empty();

        for (var i = 1; i <= 5; i++) {
            if (i <= rating) {
                $ratingStars.append('<i class="fas fa-star un"></i>');
            } else {
                $ratingStars.append('<i class="far fa-star un"></i>');
            }
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