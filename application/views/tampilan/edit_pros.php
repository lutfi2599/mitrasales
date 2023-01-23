<!-- <div class="loader" id="loader">
      <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
   </div> -->

<div class="container">
    <div class="row">
        <div class="col-4 mt-4">
            <a class="back-button ps-3 pe-3 pt-2 pb-2" href="<?= url('master/viewProspect'); ?>"><img src="<?php echo base_url() ?>assets/img/images/panah.png" alt=""></a>
        </div>
        <div class="col-4 mt-4">
            <p class="input-title">Edit Referensi Prospect</p>
        </div>
        <div class="col-4 mt-3">
            <a href=""><img src="<?php echo base_url() ?>assets/img/images/hasbulla2.jpg" alt="" class="user-picture mb-5"></a>
        </div>
    </div>
</div>
<!-- end of heading -->

<!-- search -->
<?php echo form_open_multipart('master/editProspect/' . $user[0]['id'], ['class' => 'form-validate', 'autocomplete' => 'off']); ?>
<div class="input-group mt-4">
    <div class="form-outline col-11" style="padding-left: 8%;">
        <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Nama Customer" name="nama_customer" value="<?= $user[0]['nama_customer']; ?>" />
    </div>
    <div class="input-group mt-5">
        <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="No Hp" name="telepon" value="<?= $user[0]['telp']; ?>" />
        </div>
        <div class="input-group mt-5">
            <div class="form-outline col-11" style="padding-left: 8%;">
                <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Alamat" name="alamat" value="<?= $user[0]['alamat']; ?>" />
            </div>
            <div class="input-group mt-5">
                <div class="form-outline col-11" style="padding-left: 8%;">
                    <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Mobil yang diminati" name="mobil" value="<?= $user[0]['unit_minat']; ?>" />
                </div>



                <!-- end of search -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2 ms-2 mt-5">
                                <button class="btn btn-primary btn-lg submit-button" type="submit">Kirim</button>
<?php echo form_close(); ?>
                                <a href="<?php echo url('master/deleteProspect/' . $user[0]['id']) ?>" class="btn btn-danger btn-lg submit-button mt-2" type="submit">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>