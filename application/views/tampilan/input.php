<!-- <div class="loader" id="loader">
      <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
   </div> -->

<div class="container">
   <div class="row">
      <div class="col-4 mt-4">
         <a class="back-button ps-3 pe-3 pt-2 pb-2" href="<?= url('master/viewProspect'); ?>"><img src="<?php echo base_url() ?>assets/img/images/panah.png" alt=""></a>
      </div>
      <div class="col-4 mt-4">
         <p class="input-title">Input Referensi Prospect</p>
      </div>
      <div class="col-4 mt-3">
         <a href="<?= url('users/viewEditUser/' . logged('id')) ?>"><img src="<?= base_url('uploads/users/' . logged('id') . '.png'); ?>" alt="" class="user-picture mb-5"></a>
      </div>
   </div>
</div>
<!-- end of heading -->

<!-- search -->

<?php echo form_open('master/addProspect', ['method' => 'POST', 'autocomplete' => 'off']); ?>
<div class="input-group mt-4">
   <div class="form-outline col-11" style="padding-left: 8%;">
      <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Nama Customer" name="nama_customer" value="<?= $this->input->post('nama_customer'); ?>" />
      <div class="text-danger" style="margin-left: 10px;"><?= form_error('nama_customer') ?></div>
   </div>
   <div class="input-group mt-5">
      <div class="form-outline col-11" style="padding-left: 8%;">
         <input type="text" id="form1" class="form-control search form-control-lg" placeholder="No Hp" name="telp" value="<?= $this->input->post('telp'); ?>" />
         <div class="text-danger" style="margin-left: 10px;"><?= form_error('telp') ?></div>
      </div>
      <div class="input-group mt-5">
         <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Alamat" name="alamat" value="<?= $this->input->post('alamat'); ?>" />
            <div class="text-danger" style="margin-left: 10px;"><?= form_error('alamat') ?></div>
         </div>
         <div class="input-group mt-5">
            <div class="form-outline col-11" style="padding-left: 8%;">
               <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Mobil yang diminati" name="unit_minat" value="<?= $this->input->post('unit_minat'); ?>" />
               <div class="text-danger" style="margin-left: 10px;"><?= form_error('unit_minat') ?></div>
            </div>



            <!-- end of search -->
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="d-grid gap-2 ms-2 mt-5">
                        <button class="btn btn-primary btn-lg submit-button" type="submit">Kirim</button>
                     </div>
                  </div>
               </div>
            </div>

            <?php echo form_close(); ?>