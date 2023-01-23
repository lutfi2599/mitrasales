

  <div class="loader" id="loader">
    <img id="loader-gif" src="<?php echo base_url() ?>assets/img/images/loader2.gif" alt="">
  </div>

  <div class="container">
    <div class="row">
      <div class="col-6 mt-4 ms-5">
        <h3 class="prospect-title">Home</h3>
      </div>
      <div class="col-4 mt-3 ">
        <a href=""><img src="<?php echo base_url() ?>assets/img/images/hasbulla2.jpg" alt="" class="user-picture mb-5"></a>
      </div>
    </div>
  </div>

  <h1 class="home-name ms-4">Hello Jhogi Decalvin</h1>

  <div class="container me-5">
    <div class="row">
      <div class="col-4">
        <a class="overview-button ps-3 pe-4 pt-2 pb-2">Overview</a>
      </div>
      <div class="col-6 ms-3">
        <a href="<?= url('master/rewardList') ?>" class="reedem-button ps-3 pe-4 pt-2 pb-2">Reedem Point</a>
      </div>
    </div>
  </div>

  <a class="reedem-link" href="<?= url('master/viewProspect') ?>">
  <div class="total-point col-10 ms-4 mt-4 pb-5 pt-3">
    <h1 class="ms-3" style="color: white;">Total Point</h1>
    <p class="ms-3" style="color: white;">Tukarkan point mu dengan hadiah yang telah kami sediakan</p>
    <!-- <div class="progress col-10 ms-4">
      <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div> -->
    <span class="btn btn-success">
      <h1 class="ms-3" style="color: white;"><?= $userPoint[0]['total_point'] ?> Point Tersedia</h1>
    </span>
  </div>
</a>

  <div class="ms-4 mb-4 categories">
    <h1 style="color: white;">Categories</h1>
  </div>

  <div class="container">
    <div class="row">
      <div class="total-point col-5 ms-4 mt-4 pb-5 pt-3">
        <div class="container">
          <div class="row me-2">
            <div class="col-3">
              <div class="prospect-user-picture">
                <img src="<?php echo base_url() ?>assets/img/images/user.png" alt="">
              </div>
            </div>
            <h5 class=" mb-3 col-5" style="color: white;">Prospect</h1>
          </div>
        </div>
        <h1 class="reedem-status-number">10</h1>
        <div class="progress reedem-status-bar">
          <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>


      <div class="total-point col-5 ms-4 mt-4 pb-5 pt-3">
        <div class="container">
          <div class="row">
            <div class="col-2">
              <div class="prospect-user-picture">
                <img src="<?php echo base_url() ?>assets/img/images/stopwatch.png" alt="">
              </div>
            </div>
            <h5 class="ms-2 mb-3 col-2" style="color: white;">waiting</h1>
          </div>
        </div>
        <h1 class="reedem-status-number">2</h1>
        <div class="progress reedem-status-bar">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="total-point col-5 ms-4 mt-4 pb-5 pt-3">
        <div class="container">
          <div class="row me-2">
            <div class="col-2">
              <div class="">
                <img src="<?php echo base_url() ?>assets/img/images/remove.png" alt="">
              </div>
            </div>
            <h5 class=" mb-3 col-5 ms-3" style="color: white;">Lost</h1>
          </div>
        </div>
        <h1 class="reedem-status-number">5</h1>
        <div class="progress reedem-status-bar">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>


      <div class="total-point col-5 ms-4 mt-4 pb-5 pt-3">
        <div class="container">
          <div class="row">
            <div class="col-2">
              <div class="">
                <img src="<?php echo base_url() ?>assets/img/images/check.png" alt="">
              </div>
            </div>
            <h5 class="ms-3 mb-3 col-2" style="color: white;">Deal</h1>
          </div>
        </div>
        <h1 class="reedem-status-number">10</h1>
        <div class="progress reedem-status-bar">
          <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>





 