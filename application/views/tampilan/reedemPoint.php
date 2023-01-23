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
      <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
   </div>

   <div class="container">
      <div class="row">
         <div class="col-4 mt-4">
            <a class="back-button ps-3 pe-3 pt-2 pb-2" href="main"><img src="assets/img/images/panah.png" alt=""></a>
         </div>
         <div class="col-4 mt-4">
            <p class="prospect-title">Reedem Point</p>
         </div>
         <div class="col-4 mt-3">
            <a href=""><img src="assets/img/images/hasbulla2.jpg" alt="" class="user-picture mb-3"></a>
         </div>
      </div>
   </div>



   <?php echo form_open('/master/rewardlist', ['method' => 'GET', 'autocomplete' => 'off']); ?> 
   <div class="col-4">
      <p class="all-button ps-3 pe-4 pt-2 pb-2">Point:120</p>
   </div>


   <div class="col-10 mt-2 reedem-item" onclick="hide()">
      <div class="container">
         <div class="row">
            <div class="col-2">
               <img src="assets/img/images/iphone.jpg" alt="" class="reedem-picture mt-3">
            </div>
            <div class="col-2">
               <p class="ps-5 pb-2 mt-4"><?php  ?></p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-10 mt-2 reedem-item" onclick="hide()">
      <div class="container">
         <div class="row">
            <div class="col-2">
               <img src="assets/img/images/uang-tunai.jpg" alt="" class="reedem-picture mt-4">
            </div>
            <div class="col-2">
               <p class="ps-5 pb-2 mt-4">Uang Tunai</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-10 mt-2 reedem-item" onclick="hide()">
      <div class="container">
         <div class="row">
            <div class="col-2">
               <img src="assets/img/images/ipad.jpg" alt="" class="reedem-picture mt-3">
            </div>
            <div class="col-2">
               <p class="ps-5 pb-2 mt-4">Ipad</p>
            </div>
         </div>
      </div>
   </div>
   <div class="col-10 mt-2 reedem-item" onclick="hide()">
      <div class="container">
         <div class="row">
            <div class="col-2">
               <img src="assets/img/images/service.jpg" alt="" class="reedem-picture mt-4">
            </div>
            <div class="col-2">
               <p class="ps-5 pb-2 mt-4">Voucher Service</p>
            </div>
         </div>
      </div>
   </div>



   <div id="hidden-submit" class="reedem-submit-end hidden-button col-11 ms-3 mt-4 pb-5 pt-3">
      <h1 class="text-center" style="color: rgb(0, 0, 0);">Apakah anda yakin ingin melakukan reedem?</h1>
      <div class="container">
         <div class="row">
            <div class="col-6">
               <div class="d-grid gap-2 ms- mt-5">
                  <button class="btn btn-primary btn-lg submit-button" type="submit">Ya</button>
               </div>
            </div>
            <div class="col-6">
               <div class="d-grid gap-2 ms-2 mt-5">
                  <button class="btn btn-lg submit-button-no" type="submit">Tidak</button>
               </div>
            </div>
         </div>
      </div>
   </div>

  