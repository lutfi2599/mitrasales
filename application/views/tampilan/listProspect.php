<div class="loader" id="loader">
   <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
</div>

<!-- heading -->

<body class="bg-dark mb-5">
   <div class="container">
      <div class="row">
         <div class="col-4 mt-4">
            <a class="back-button ps-3 pe-3 pt-2 pb-2" href="<?= url('/') ?>"><img src="<?php echo base_url() ?>assets/img/images/panah.png" alt=""></a>
         </div>
         <div class="col-4 mt-4">
            <p class="prospect-title">List Prospect</p>
         </div>
         <div class="col-4 mt-3">
            <a href="<?= url('users/viewEditUser/' . logged('id')) ?>"><img src="<?= base_url('uploads/users/' . logged('id') . '.png'); ?>" alt="" class="user-picture mb-5"></a>
         </div>
      </div>
   </div>
   <!-- end of heading -->

   <!-- search -->
   <div class="input-group search-jurnal " style="position: absolute">
      <!-- <div class="form-outline col-11" style="padding-left: 8%;">
         <input type="search" id="form1" class="form-control search" placeholder="Search" />
      </div> -->
      <!-- end of search -->
      <div class="col-6 mt-4 mb-2">
         <a class="all-button ps-4 pe-4 pt-2 pb-2" href="<?= url('master/viewAddPros') ?>">New Prospect</a>
      </div>

      <div class="container">
         <div class="row">
            <?php foreach ($prospects as $row) : ?>
               <div class="col-10 mt-3 prospect-person">
                  <a href="<?php echo url('master/viewEditPros/' . $row['id']) ?>" class="text-white text-center" style="text-decoration: none;">
                     <p style="font-size: 16px;padding: 10px 0 0 0"><?= $row['nama_customer'] ?></p>
                  </a>
               </div>
            <?php endforeach ?>
         </div>
         <br>
         <br>
         <br>
         <br>
         <br>
      </div>