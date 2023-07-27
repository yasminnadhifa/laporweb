<style>
    @import url('<?= base_url() ?>/assets/css/stylePengaduan.css');

    .center-ball {

        border: 0;
        height: 4px;
        width: 10%;

        position: relative;
        margin: 30px auto;
        background: #B41515;

    }

    .banner-tes {
        background-color: #f7f8fa;
        padding-top: 5px;

    }

    .info {
        background-color: #DAD5D9;
        /* Green */
        border: none;
        color: black;
        text-align: center;
        text-decoration: none;
        display: inline-block;

        margin: 4px 2px;
        border-radius: 12px;
    }




    /* Float four columns side by side */
    .column {
        float: left;
        width: 25%;
        padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {
        margin: 0 -5px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    }

    /* Style the counter cards */
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        padding: 16px;
        text-align: center;
        background-color: #f1f1f1;
    }
    .selesai{
        color: #74C365;
        font-weight: 900;

    }
    .peninjauan{
        color: #1139CA;
        font-weight: 900;
    }
    .menunggu{
        color: #B41515;
        font-weight: 900;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="banner" style="padding-bottom:5px; ">
    <h1 class="font-weight-semibold">Riwayat Pengaduan</h1>
    <h6 class="font-weight-normal text-muted pb-3">Lihat riwayat pengaduan</h6>
    <hr class="center-ball">
    <?php if (empty($laporan)): ?>
        <h5 >Belum ada pengajuan</h5>
</div>

<section class="banner-tes">

    <div class="limiter">
    <?php else: ?>
        <div class="container-table100">
            <div class="wrap-table100">

                <div class="row">


                <?php $i = 1; ?>
                   <?php foreach ($laporan as $us) : ?>
                    <?php
                                            $status = $us['status'];
                                            if ($status === 'Selesai') {
                                                $class = 'selesai';
                                                $icon = '<i class="bi bi-clipboard2-check"></i>';
                                            } else if ($status === 'Sedang dalam peninjauan') {
                                                $class = 'peninjauan';
                                                $icon = '<i class="bi bi-search"></i>';
                                            } else if ($status === 'Menunggu konfirmasi') {
                                                $class = 'menunggu';
                                                $icon = '<i class="bi bi-hourglass-split"></i>';
                                            } else {
                                                $class = 'badge badge-secondary';
                                            }
                                            ?>
                    <div class="column" style="margin-bottom: 25px;">
                        <div class="card">
                            <h3><?= $us['no_laporan']; ?></h3>
                            <p class="<?= $class ?>" ><?= $icon ?> <?= $us['status']; ?></p>
                            <button id="btn-detail" onclick="get(<?= $us['id']; ?>)" data-target="#exampleModal" data-toggle="modal" class="badge btn-opacity-light">Detail</button>
                        </div>
                    </div>
                    <?php $i++; ?>
                            <?php endforeach; ?>
                </div>

            </div>
        </div>
        <?php endif; ?>
    </div>


</section>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Detail Laporan</h4>
            </div>

            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label style="font-weight: bold;" for="Name">No Laporan</label>
                            <span id="no">Nomornya </span>
                        </div>
                        <div class="col">
                            <label style="font-weight: bold;" for="Name">Kategori Laporan</label>
                            <button class="info" id="kategori">Sudah selesai</button>
                        </div>
                        <div class="w-100"></div>
                        <div class="col" style="margin-top:20px;">
                            <label style="font-weight: bold;" for="Name">Tanggal Laporan</label>
                            <span id="tanggal">Tanggal </span>
                        </div>
                        <div class="col" style="margin-top:20px;">
                            <label style="font-weight: bold;" for="Name">Tanggal Kejadian</label>
                            <span id="tanggalk">Tanggal </span>
                        </div>

                    </div>
                    <div>
                        <label style="font-weight: bold; margin-top:20px;" for="Name">Judul Laporan</label>
                    </div>
                    <div>
                        <span id="judul"></span>
                    </div>
                    <div>
                        <label style="font-weight: bold; margin-top:20px;" for="Name">Isi Laporan</label>
                    </div>
                    <div>
                        <span id="isi">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula arcu turpis,
                            sed vulputate odio euismod at. Curabitur venenatis, urna at porta dapibus,
                            ex velit interdum risus, nec tincidunt ex magna sit amet nulla. Aenean eget
                            consequat libero</span>
                    </div>
                    <div>
                        <label style="font-weight: bold; margin-top:20px;" for="Name">Status</label>
                    </div>
                    <div>
                        <span id="status">Sudah selesai</span>
                    </div>
                    <div>
                        <label style="font-weight: bold; margin-top:20px;" for="Name">Balasan Laporan</label>
                    </div>
                    <div>
                        <span id="pesan">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vehicula arcu turpis,
                            sed vulputate odio euismod at. </span>
                    </div>

                </div>


            </div>
            <div class="container" style="margin-top: 40px;">
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pengaduan -->
<div class="modal fade" id="pengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?= base_url('Laporan') ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Pengaduan</h4>
                </div>
                <div class="modal-body">

                    <!-- <div class="form-group"> -->
                    <!-- <label for="Name">Nama</label> -->
                    <!-- <input type="hidden" class="form-control border-input" id="Name" placeholder="Name"> -->
                    <!-- </div> -->
                    <!-- <div class="form-group"> -->
                    <!-- <label for="Lembaga">Lembaga/Instansi</label> -->
                    <!-- <input type="hidden" class="form-control border-input" id="Lembaga" placeholder="Lembaga"> -->
                    <!-- </div> -->
                    <div class="form-group">
                        <label for="Lembaga">Judul Laporan</label>
                        <input type="text" value="<?= set_value('judul'); ?>" name="judul" class="form-control border-input" id="judul" placeholder="Judul Laporan">
                    </div>
                    <div class="form-group">
                        <label for="Lembaga">Tanggal Kejadian</label>
                        <input type="date" value="<?= set_value('tanggal'); ?>" name="tanggal" class="form-control border-input" id="tanggal" placeholder="Tanggal Kejadian">
                    </div>
                    <div class="form-group">
                        <label for="lembaga">Kategori Laporan</label>
                        <select value="<?= set_value('kategori'); ?>" name="kategori" id="kategori" class="form-control input-login ">
                            <option value="">Pilih Kategori</option>
                            <option value="Mentor">LMS</option>
                            <option value="Tim LX">Tim Operasional LX</option>
                            <option value="Mentor">Mentor LX</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Message">Isi Laporan</label>
                        <textarea value="<?= set_value('isi'); ?>" name="isi" class="form-control border-input" id="isi" placeholder="Ketikan Pesan"></textarea>
                    </div>
                    <input type="hidden" name="no_laporan" id="no_laporan" value="LX<?= time() ?>" readonly class="form-control">
                    <input type="hidden" name="id_user" id="id" value="<?= $user['id']; ?>" readonly class="form-control">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function get(id) {

        $.ajax({
            url: "<?php echo base_url(); ?>Laporan/detail/" + id,
            type: "GET",
            dataType: "json",
            success: function(product) {
                // do something with the product data
                console.log(product);

                // populate the modal with the product data
                $('#exampleModal').find('.modal-body #no').text(product.no_laporan);
                $('#exampleModal').find('.modal-body #tanggal').text(product.created_at);
                $('#exampleModal').find('.modal-body #tanggalk').text(product.tanggal);
                $('#exampleModal').find('.modal-body #judul').text(product.judul);
                $('#exampleModal').find('.modal-body #kategori').text(product.kategori);
                $('#exampleModal').find('.modal-body #status').text(product.status);
                $('#exampleModal').find('.modal-body #isi').text(product.isi);
                $('#exampleModal').find('.modal-body #pesan').text(product.pesan);


                // show the modal
                $('#exampleModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.log('Request failed. Returned status of ' + xhr.status);
            }
        });
    }
</script>