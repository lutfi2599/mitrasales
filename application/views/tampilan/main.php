<div class="loader" id="loader">
  <img id="loader-gif" src="<?php echo base_url() ?>assets/img/images/loader2.gif" alt="">
</div>

<div class="container">
  <div class="row">
    <div class="col-6 mt-4 ms-5">
      <!-- <h3 class="prospect-title">Home</h3> -->
    </div>
    <a href="<?= url('users/viewEditUser/' . logged('id')) ?>" style="float: right; text-align: right;"><img src="<?= base_url('uploads/users/' . logged('id') . '.png'); ?>" alt="" class="user-picture mb-5"></a>
  </div>
</div>


<h1 class="home-name" style="font-size: 20px;margin-left: 25px; margin-top: -30px;">Hello, <?= logged('nama_lengkap'); ?></h1>
<div class="container me-5">
  <div class="row">
    <div class="col-6">
      <a href="<?= url('master/rewardList') ?>" class="btn btn-success" style="margin-bottom: 40px; margin-left: 15px;margin-top: -25px">Reedem Point</a>
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
      <h1 class="ms-3" style="color: white;"><?= $userPoint[0]['total_point'] ?> Point</h1>
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
          <h5 class="mb-3 col-5" style="color: white;">Prospect</h1>
        </div>
      </div>
      <h1 class="reedem-status-number text-center"><?= $cprospect[0]['hitung'] ?></h1>
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
      <h1 class="reedem-status-number text-center"><?= $cwaiting[0]['hitung'] ?></h1>
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
          <h5 class="mb-3 col-5 ms-3" style="color: white;">Lost</h1>
        </div>
      </div>
      <h1 class="reedem-status-number text-center"><?= $clost[0]['hitung'] ?></h1>
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
      <h1 class="reedem-status-number text-center"><?= $cdeal[0]['hitung'] ?></h1>
    </div>
  </div>
</div>