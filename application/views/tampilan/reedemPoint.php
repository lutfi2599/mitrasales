<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>reedem point</title>
   <link rel="stylesheet" href="assets/css/bootstrap.css">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-dark">

   <div class="loader" id="loader">
      <img id="loader-gif" src="<?php echo base_url() ?>assets/img/images/loader2.gif" alt="">
   </div>

   <div class="container">
      <div class="row">
         <div class="col-4 mt-4">
            <a class="back-button ps-3 pe-3 pt-2 pb-2" href="<?= url('/') ?>"><img src="<?php echo base_url() ?>assets/img/images/panah.png" alt=""></a>
         </div>
         <div class="col-4 mt-4">
            <p class="prospect-title">Reedem Point</p>
         </div>
         <div class="col-4 mt-3">
            <a href=""><img src="<?php echo base_url() ?>assets/img/images/hasbulla2.jpg" alt="" class="user-picture mb-3"></a>
         </div>
      </div>
   </div>



   <div class="col-6 text-center">
      <p class="all-button ps-3 pe-4 pt-2 pb-2">Point: <?= $userPoint[0]['total_point'] ?></p>
   </div>

   <?php if ($this->session->flashdata('alert')) : $time = time();  ?>

      <div class="alert alert-<?php echo $this->session->flashdata('alert-type') ?> alert-dismissible fade show" role="alert">
         <strong><?php echo $this->session->flashdata('alert') ?></strong>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

   <?php endif ?>


   <?php foreach ($rewards as $row) : ?>
      <div class="col-sm-12 mt-2 reedem-item">
         <div class="container">
            <a data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id'] ?>">
               <div class="row">
                  <div class="col-2">
                     <img src="<?php echo base_url() ?>assets/img/images/iphone.jpg" alt="" class="reedem-picture mt-3">
                  </div>
                  <div class="col-10">
                     <p class="ps-5 pb-2 mt-4"><?= $row['nama_reward'] ?></p>
                     <p class="ps-5 pb-2" style="font-size: 12px; margin-top: -15px;"><?= $row['total_point'] ?> point</p>
                  </div>
               </div>
            </a>
         </div>
      </div>
   <?php endforeach ?>



   <div id="hidden-submit" class="reedem-submit-end hidden-button col-sm-11 ms-3 mt-4 pb-5 pt-3">
      <h1 class="text-center" style="color: rgb(0, 0, 0);">Apakah anda yakin ingin melakukan reedem?</h1>
      <div class="container">
         <div class="row">
            <div class="col-sm-6">
               <div class="d-grid gap-2 ms- mt-5">
                  <button class="btn btn-primary btn-lg submit-button" type="submit">Ya</button>
               </div>
            </div>
            <div class="col-sm-6">
               <div class="d-grid gap-2 ms-2 mt-5">
                  <button class="btn btn-lg submit-button-no" type="submit">Tidak</button>
               </div>
            </div>
         </div>
      </div>
   </div>


   <?php foreach ($rewards as $row) : ?>
      <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <?php echo form_open_multipart('master/addReedem/', ['class' => 'form-validate', 'autocomplete' => 'off']); ?>
            <div class="modal-content">
               <div class="modal-header">
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                  <h1 class="modal-title fs-6 text-center" id="exampleModalLabel">Apakah anda yakin ingin melakukan reedem?<br><span class="text-primary"><?= $row['nama_reward'] ?><br><span class="text-success"><?= $row['total_point'] ?> Point</span></h1>
                  <input type="hidden" name="itemName" value="<?= $row['nama_reward'] ?>">
                  <input type="hidden" name="itemPoint" value="<?= $row['total_point'] ?>">
                  <input type="hidden" name="idItem" value="<?= $row['id'] ?>">
               </div>
               <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Tidak</button>
                  <button type="submit" class="btn btn-primary btn-lg">Ya</button>
               </div>
            </div>
            <?php echo form_close(); ?>
         </div>
      </div>
   <?php endforeach ?>