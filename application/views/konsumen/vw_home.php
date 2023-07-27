<style>
    .border-input:focus {
        outline: none;
        border: 1px solid #f53f51;
    }
    .chat-btn {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 9999;
}

.floating-messenger-chat {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 300px;
  height: 400px;
  background-color: #ffffff;
  border: 1px solid #dddddd;
  z-index: 9999;
  display: none; /* Default: disembunyikan */
}

.chat-content {
  padding: 10px;
  height: 300px;
  overflow-y: scroll;
}

.chat-input {
  padding: 10px;
}

.bubble {
  background-color: #f1f0f0;
  border-radius: 20px;
  padding: 8px 12px;
  margin-bottom: 10px;
}

.user-bubble {
  background-color: #cce5ff;
  color: #0366d6;
  float: left;
}

.bot-bubble {
  background-color: #e5e5e5;
  color: #333333;
  float: right;
}
</style>

<div class="banner">
    <div class="container">
        <h1 class="font-weight-semibold">Layanan Aspirasi dan Pengaduan Online </h1>
        <h6 class="font-weight-normal text-muted pb-3">Sampaikan laporan Anda langsung kepada LearningX</h6>
        <div><button class="btn btn-light mr-1" style="border-radius: 50px;" data-target="#pengaduan" data-toggle="modal" >Ajukan Pengaduan!</button></div>
        
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
                    <a href="<?= base_url('Konsumen/tentanglx') ?>" class="btn btn-info">Lihat Selengkapnya</a>
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



    </div>
</div>


<div class="modal fade" id="pengaduan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
          
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Selamat datang di LAPOR!</h4>
                    </div>
                    <div class="modal-body">
                    <img src="<?= base_url() ?>/assets/images/cara.png" alt="" class="img-fluid">

                    </div>

                    <div class="modal-footer" style="margin-left: 50px;" > 
                      
                        <a type="button" href="<?= base_url('Auth') ?>" class="btn btn-light " >Masuk ke LAPOR</a>
                        <a type="button" href="<?= base_url('Auth/registrasi') ?>" class="btn btn-success">Buat akun LAPOR</a>
                    </div>
                </div>
                </div>
            </div>
        </div>

