   <!-- Main Content -->
   <div class="main-content">
     <section class="section">
       <div class="section-header">
         <h1>Dashboard</h1>
       </div>
       <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-primary">
               <i class="far fa-user"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>User Active</h4>
               </div>
               <div class="card-body">
                 <?= $konsumen ?>
               </div>
             </div>
           </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-danger">
               <i class="far fa-newspaper"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>Aspiration</h4>
               </div>
               <div class="card-body">
                 <?= $aspirasi ?>
               </div>
             </div>
           </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-warning">
               <i class="far fa-file"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>Reports</h4>
               </div>
               <div class="card-body">
                 <?= $report ?>
               </div>
             </div>
           </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-success">
               <i class="fas fa-circle"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>Service Rating</h4>
               </div>
               <div class="card-body">
                 <?= $testi ?>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-lg-8 col-md-12 col-12 col-sm-12">
           <div class="card">
             <div class="card-header">
               <h4>Statistics of Rate</h4>
               <div class="card-header-action">
               <button data-target="#exampleModal" data-toggle="modal" class="btn btn-warning">View Average</button>
               </div>
             </div>
             <div class="card-body">
               <canvas id="myChart2" ></canvas>
             </div>
           </div>
         </div>
         <div class="col-lg-4 col-md-12 col-12 col-sm-12">

           <div class="card card-hero">
             <div class="card-header" style=" background-image: linear-gradient(to bottom, #B41515, #ba7272);">
               <div class="card-icon">
                 <i class="far fa-question-circle" style="color:#b55050;"></i>
               </div>
               <h4><?= $reports ?></h4>
               <div class="card-description">Customers need help</div>
             </div>
             <div class="card-body p-0">
               <div class="tickets-list">
                 <?php foreach ($laporan as $product) : ?>
                   <a href="#" class="ticket-item">
                     <div class="ticket-title" style="color:#B41515;">
                       <h4><?php echo $product->judul; ?></h4>
                     </div>
                     <div class="ticket-info">
                       <div><?php echo $product->category_name; ?></div>
                       <div class="bullet"></div>
                       <div style="color:#B41515;"><?php echo $product->tanggal; ?></div>
                     </div>
                   </a>
                 <?php endforeach; ?>
                 <a href="<?= base_url('Console/reports') ?>" class="ticket-item ticket-more" style="color:#B41515;">
                   View All <i class="fas fa-chevron-right"></i>
                 </a>
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
                <h5 class="modal-title">Average</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <label style="font-weight: bold; margin-top:20px;" for="Name">The average rating is:  </label>
                </div>
                <div>
                    <span id="avgrate"><?= $rating ?></span>
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
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
   <script>
    var rating_count = <?= json_encode($rating_count) ?>;
    var ratings = [];
    var counts = [];

    for (var i = 0; i < rating_count.length; i++) {
        ratings.push(rating_count[i].star);
        counts.push(rating_count[i].count);
    }
    console.log(rating_count)

    var ctx = document.getElementById('myChart2').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ratings,
            datasets: [{
                label: 'Count',
                data: counts,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


</script>