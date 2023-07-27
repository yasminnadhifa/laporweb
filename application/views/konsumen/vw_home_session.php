<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    .border-input:focus {
        outline: none;
        border: 1px solid #f53f51;
    }
    .stars {
  display: flex;
  align-items: center;
  gap: 25px;
}
.un {
  color: #e6e6e6;
  font-size: 35px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.active {
  color: #B41515;
  font-size: 35px;
  cursor: pointer;
  transition: color 0.2s ease;
}
.test:hover{
  color:#B41515;
}
.dropdown-item:active{
  color:#e6e6e6;
}
#dokumen::file-selector-button {
	border: 2px solid #555555;
	color: #555555;
	border-radius: 4px;
	background-color: #ffffff;
}

#dokumen::file-selector-button:hover {
	background-color: #e9e9e9;
}

#dokumen::-webkit-file-upload-button {
	border: 2px solid #555555;
	color: #555555;
	border-radius: 4px;
	background-color: #ffffff;
}

#dokumen::-webkit-file-upload-button:hover {
	background-color: #e9e9e9;
}
</style>
<?= $this->session->flashdata('message'); ?>
<div class="banner">
    <div class="container">
        <h1 class="font-weight-semibold">Layanan Aspirasi dan Pengaduan Online </h1>
        <h6 class="font-weight-normal text-muted pb-3">Sampaikan laporan Anda langsung kepada LearningX</h6>
        <div>
        <button class="btn btn-opacity-warning ml-1" data-target="#aspirasi" data-toggle="modal">Aspirasi</button>
        <button class="btn btn-opacity-light ml-1" data-target="#pengaduan" data-toggle="modal">Pengaduan</button>
            <button class="btn btn-opacity-success mr-1" data-target="#exampleModal" data-toggle="modal">Tingkat Kepuasan</button>

        </div>
        <img src="<?= base_url() ?>/assets/images/Group171.svg" alt="" class="img-fluid">
    </div>
</div>

<div class="content-wrapper">
    <div class="container">

        <section class="digital-marketing-service" id="tentang">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                    <h3 class="m-0">Apa itu LearningX?</h3>
                    <div class="col-lg-7 col-xl-6 p-0">
                        <p class="py-4 m-0 text-muted">Learning X bertujuan untuk mencetak talenta talenta
                            digital terbaik, untuk anak bangsa Indonesia.</p>
                        <p class="font-weight-medium text-muted">LX International membangun LearningX sebagai
                            sarana untuk pengembangan skill siswa-siswi
                            serta mahasiswa dengan tujuan untuk memenuhi
                            kebutuhan industri akan tenaga kerja dari sektor
                            industri digital.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                    <img src="<?= base_url() ?>/assets/images/LearningX2.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-lg-7 p-0 text-center flex-item grid-margin" data-aos="fade-right">
                    <img src="<?= base_url() ?>/assets/images/LearningX.png" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                    <h3 class="m-0">Apa itu<br>Lapor By LearningX?</h3>
                    <div class="col-lg-9 col-xl-8 p-0">
                        <p class="py-4 m-0 text-muted">Lapor By LearningX bertujuan untuk membantu konsumen agar dapat menyampaikan
                            keluhan dan juga saran mengenai pembelajaran dalam LearningX</p>
                        <p class="pb-2 font-weight-medium text-muted">LX International membangun Lapor By LearningX sebagai sarana untuk peningkatan kualitas dalam kegiatan LearningX</p>
                    </div>
                    <a href="<?= base_url('Konsumen/tentang') ?>" class="btn btn-info">Lihat Selengkapnya</a>
                </div>
            </div>
        </section>
        <section class="contact-us" id="contact-section">
            <div class="contact-us-bgimage grid-margin">
                <div class="pb-4">
                    <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Mengalami kendala?</h4>
                </div>
                <div data-aos="fade-up">
                    <a href="https://wa.link/uoxj5i" class="btn btn-rounded btn-outline-danger">Hubungi kami</a>
                </div>
            </div>
        </section>


        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form method="post" id="formtesti" action="<?= base_url('Testi') ?>" onsubmit="return validateForm()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Tingkat Kepuasan</h4>
                    </div>
                    
                    <div class="modal-body">
                       
                        <input type="hidden" class="form-control border-input" id="id" name="id" value="<?= $user['id']; ?>">
                        <input type="hidden" class="form-control border-input" id="star" name="star" value="0" placeholder="Name">
                            <!-- <div class="form-group"> -->
                                <!-- <label for="Name">Name</label> -->
                                
                            <!-- </div> -->
                            <!-- <div class="form-group"> -->
                                <!-- <label for="Lembaga">Lembaga/Instansi</label> -->
                               
                            <!-- </div> -->
                            <div class="form-group">
                                <label for="Message">Pesan</label>
                                <textarea  value="<?= set_value('pesan'); ?>" class="form-control border-input" id="pesan" name="pesan" placeholder="Ketikan Pesan"></textarea>
                               
                            </div>
                            <div class="form-group">
                                <label for="Message">Tingkat Kepuasan</label>
                                <div class="stars rating" >
                                    <span class="fa-solid fa-star un" id="star1" onclick="rate(1)" ></span>
                                    <span class="fa-solid fa-star un" id="star2" onclick="rate(2)"></span>
                                    <span class="fa-solid fa-star un" id="star3" onclick="rate(3)"></span>
                                    <span class="fa-solid fa-star un" id="star4" onclick="rate(4)"></span>
                                    <span class="fa-solid fa-star un" id="star5" onclick="rate(5)"></span>
                                    
                                </div>
                                
                            </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
                </form>
            </div>
        </div>


                <!-- Aspirasi -->
                <div class="modal fade" id="aspirasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form method="post" action="<?= base_url('Aspirasi') ?>" enctype="multipart/form-data" onsubmit="return validateFormAspirasi()">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Aspirasi</h4>
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
                                <input type="text" value="<?= set_value('judul'); ?>" name="judul" class="form-control border-input" id="judul_aspirasi" placeholder="Judul Laporan">
                               
                            </div>


                            <div class="form-group">
                                <label for="Message">Isi Laporan</label>
                                <textarea value="<?= set_value('isi'); ?>" name="isi" class="form-control border-input" id="isi_aspirasi" placeholder="Ketikan Pesan"></textarea>
                                
                            </div>                            
                            <div class="form-group">
                                <label for="Dokumen">Dokumen Pendukung</label>
                                <input type="file" value="<?= set_value('dokumen'); ?>" name="dokumen" class="form-control border-input" id="dokumen" >
                            </div>
                            
                            <input type="hidden" name="no_aspirasi" id="no_aspirasi" value="ASP<?= time() ?>" readonly class="form-control">
                    <input type="hidden" name="id_user" id="id" value="<?= $user['id']; ?>" readonly class="form-control">
            


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <!-- Pengaduan -->
        <div class="modal fade" id="pengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form method="post" action="<?= base_url('Laporan') ?>" enctype="multipart/form-data" onsubmit="return validateFormLaporan()">
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
                                        <?php foreach ($category as $p) : ?>
                                     <option value="<?= $p['jenis']; ?>"><?= $p['jenis']; ?></option>
                                     <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Message">Isi Laporan</label>
                                <textarea value="<?= set_value('isi'); ?>" name="isi" class="form-control border-input" id="isi" placeholder="Ketikan Pesan"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Dokumen">Dokumen Pendukung</label>
                                <input type="file" value="<?= set_value('dokumen'); ?>" name="dokumen" class="form-control border-input" id="dokumen" >
                            </div>
                            <input type="hidden" name="no_laporan" id="no_laporan"value="LX<?= time() ?>" readonly class="form-control">
                    <input type="hidden" name="id_user" id="id" value="<?= $user['id']; ?>" readonly class="form-control">
            


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>
                </div>
                </form>
            </div>
        </div>


    </div>
</div>

<script>

   function rate(id){
    document.getElementsByName("star")[0].value=id;
        switch(id){
            case 1:
                checked("star1");
                unchecked("star2");
                unchecked("star3");
                unchecked("star4");
                unchecked("star5");
                break;
            case 2:
                checked("star1");
                checked("star2");
                unchecked("star3");
                unchecked("star4");
                unchecked("star5");
                break;
            case 3:
                checked("star1");
                checked("star2");
                checked("star3");
                unchecked("star4");
                unchecked("star5");
                break;
            case 4: 
                checked("star1");
                checked("star2");
                checked("star3");
                checked("star4");
                unchecked("star5");
                break;
            case 5:
                checked("star1");
                checked("star2");
                checked("star3");
                checked("star4");
                checked("star5");  
                break;
            default:

        }
   }

   function checked(star_id){
    var element = document.getElementById(star_id);
    element.classList.remove("un");
    element.classList.add("active");
   }

   function unchecked(star_id){
    var element = document.getElementById(star_id);
    element.classList.remove("active");
    element.classList.add("un");
   }

   function validateFormAspirasi() {
  var judul = document.getElementById('judul_aspirasi').value;
  var isi = document.getElementById('isi_aspirasi').value;

  if (judul === '') {
    alert('Judul harus diisi');
    return false;
  }

  if (isi === '') {
    alert('Isi harus diisi');
    return false;
  }

  return true;
}

function validateFormLaporan() {
  var judul = document.getElementById('judul').value;
  var isi = document.getElementById('isi').value;
  var tanggal = document.getElementById('tanggal').value;
  var kategori = document.getElementById('kategori').value;

  if (judul === '') {
    alert('Judul harus diisi');
    return false;
  }
  if (tanggal === '') {
    alert('Tanggal harus diisi');
    return false;
  }
  if (kategori === '') {
    alert('Kategori harus diisi');
    return false;
  }
  if (isi === '') {
    alert('Isi laporan harus diisi');
    return false;
  }




  return true;
}
function validateForm() {
  // Mengambil nilai rating yang dipilih
  var rating = getSelectedRating();

  // Lakukan validasi rating
  if (rating === 0) {
    alert('Pilih minimal satu bintang');
    return false;
  }

  // ...
  
  // Return true jika formulir valid
  return true;
}

function getSelectedRating() {
  var ratingElements = document.getElementsByClassName('fa-star');
  for (var i = 0; i < ratingElements.length; i++) {
    if (ratingElements[i].classList.contains('active')) {
      return i + 1;
    }
  }
  return 0;
}
</script>