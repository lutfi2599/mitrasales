<h1 class="sign-up-title mt-3 mb-5">Sign Up</h1>
<?php echo form_open('/registration/saveRegis', ['method' => 'POST', 'autocomplete' => 'off']); ?>

<div class="input-group mt-4">
   <div class="form-outline col-11" style="padding-left: 8%;">
      <input type="text" id="username" class="form-control search form-control-lg" placeholder="username" name="username" value="<?php echo post('username') ?>" required />
      <div class="text-danger" style="margin-left: 10px;"><?= form_error('username') ?></div>
   </div>
   <div class="input-group mt-5">
      <div class="form-outline col-11" style="padding-left: 8%;">
         <input type="password" id="password" class="form-control search form-control-lg" placeholder="Password" name="password" value="<?php echo post('password') ?>" required />
         <div class="text-danger" style="margin-left: 10px;"><?= form_error('password') ?></div>
      </div>
      <div class="input-group mt-5">
         <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="hp" class="form-control search form-control-lg" placeholder="No Hp" name="hp" value="<?php echo post('hp') ?>" required />
            <div class="text-danger" style="margin-left: 10px;"><?= form_error('hp') ?></div>
         </div>
         <div class="input-group mt-5">
            <div class="form-outline col-11" style="padding-left: 8%;">
               <input type="text" id="nama_lengkap" class="form-control search form-control-lg" placeholder="Nama Lengkap" name="nama_lengkap" value="<?php echo post('nama_lengkap') ?>" required />
               <div class="text-danger" style="margin-left: 10px;"><?= form_error('nama_lengkap') ?></div>
            </div>
            <div class="input-group mt-5">
               <div class="form-outline col-11" style="padding-left: 8%;">
                  <input type="text" id="email" class="form-control search form-control-lg" placeholder="Email" name="email" value="<?php echo post('email') ?>" required />
                  <div class="text-danger" style="margin-left: 10px;"><?= form_error('email') ?></div>
               </div>
               <div class="input-group mt-5">
                  <div class="form-outline col-11" style="padding-left: 8%;">
                     <input type="text" id="alamat" class="form-control search form-control-lg" placeholder="Alamat" name="alamat" value="<?php echo post('alamat') ?>" required />
                     <div class="text-danger" style="margin-left: 10px;"><?= form_error('alamat') ?></div>
                  </div>
                  <div class="input-group mt-5">
                     <div class="form-outline col-11" style="padding-left: 8%;">
                        <input type="text" id="kendaraan" class="form-control search form-control-lg" placeholder="Mobil yang dibeli" name="kendaraan" value="<?php echo post('kendaraan') ?>" required />
                        <div class="text-danger" style="margin-left: 10px;"><?= form_error('kendaraan') ?></div>
                     </div>
                     <div class="input-group mt-5">
                        <div class="form-outline col-11" style="padding-left: 8%;">
                           <input type="text" id="salesman" class="form-control search form-control-lg" placeholder="Salesman" name="salesman" value="<?php echo post('salesman') ?>" required />
                           <div class="text-danger" style="margin-left: 10px;"><?= form_error('salesman') ?></div>
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