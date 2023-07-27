<style>
    .un {
        color: #fae896;
        font-size: 20px;
        cursor: pointer;
        transition: color 0.2s ease;
    }
</style>


<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Aspiration</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">

                            <h4>Data Aspiration by User</h4>


                        </div>
                        <div class="card-body">
                        <div style="margin-bottom:20px;">
                    <a href="<?= base_url() ?>Extra/exportAspirasi" class="btn btn-outline-success" ><i class="fas fa-download"></i>Save to Excel</a>
                </div>
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aspiration report</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($aspirasi as $us) : ?>
                                            <tr>
                                                <td><?= $i; ?>.</td>
                                                <td><?= $us['no_aspirasi']; ?></td>
                                                <td><?= $us['nama']; ?></td>
                                                <td><?= $us['judul']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('Console/detail_aspiration/') . $us['id']; ?>"  class="btn btn-icon icon-left btn-info" ><i class="fas fa-info-circle"></i> Detail</a>
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