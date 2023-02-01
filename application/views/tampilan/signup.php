<div class="loader" id="loader">
   <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
</div>

<!-- <iframe width="300" height="150" src="https://www.youtube.com/embed/zwNWeJW2Sro" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->

<h1 class="sign-up-title mt-3 mb-5">Sign Up</h1>
<?php echo form_open('/registration/saveRegis', ['method' => 'POST', 'autocomplete' => 'off']); ?>

<div class="input-group mt-4">
   <div class="form-outline col-11" style="padding-left: 8%;">
      <input type="text" id="form1" class="form-control search form-control-lg" placeholder="username" name="username" required />
   </div>
   <div class="input-group mt-5">
      <div class="form-outline col-11" style="padding-left: 8%;">
         <input type="password" id="form1" class="form-control search form-control-lg" placeholder="Password" name="password" required />
      </div>
      <div class="input-group mt-5">
         <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="No Hp" name="telepon" required />
         </div>
         <div class="input-group mt-5">
            <div class="form-outline col-11" style="padding-left: 8%;">
               <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Nama Lengkap" name="nama" required />
            </div>
            <div class="input-group mt-5">
               <div class="form-outline col-11" style="padding-left: 8%;">
                  <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Email" name="email" required />
               </div>
               <div class="input-group mt-5">
                  <div class="form-outline col-11" style="padding-left: 8%;">
                     <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Alamat" name="alamat" required />
                  </div>
                  <div class="input-group mt-5">
                     <div class="form-outline col-11" style="padding-left: 8%;">
                        <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Mobil yang dibeli" name="mobil" required />
                     </div>
                     <div class="input-group mt-5">
                        <div class="form-outline col-11" style="padding-left: 8%;">
                           <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Salesman" name="sales" required />
                        </div>
                        <div class="d-grid gap-2 col-11 mx-auto mt-4">
                           <button type="submit" class="btn btn-primary btn-lg mt-2  sign-in">Register</a>
                        </div>
                     </div>
                     <?php echo form_close(); ?>
                     <div class="container">
                        <div class="row">
                           <div class="col text-center">
                              <a href="<?= url('/halaman-login') ?>" class="back-login">Back to login page</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>