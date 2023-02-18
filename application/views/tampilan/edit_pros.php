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
            <a href="<?= url('users/viewEditUser/' . logged('id')) ?>"><img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" class="user-picture mb-5"></a>
        </div>
    </div>
</div>
<!-- end of heading -->

<!-- search -->
<?php echo form_open_multipart('master/updateProspect/' . $user[0]['id'], ['class' => 'form-validate', 'autocomplete' => 'off']); ?>
<div class="input-group mt-4">
    <div class="form-outline col-11" style="padding-left: 8%;">
        <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Nama Customer" name="nama_customer" value="<?= $user[0]['nama_customer']; ?>" />
        <div class="text-danger" style="margin-left: 10px;"><?= form_error('nama_customer') ?></div>
    </div>
    <div class="input-group mt-5">
        <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="No Hp" name="telp" value="<?= $user[0]['telp']; ?>" />
            <div class="text-danger" style="margin-left: 10px;"><?= form_error('telp') ?></div>
        </div>
        <div class="input-group mt-5">
            <div class="form-outline col-11" style="padding-left: 8%;">
                <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Alamat" name="alamat" value="<?= $user[0]['alamat']; ?>" />
                <div class="text-danger" style="margin-left: 10px;"><?= form_error('alamat') ?></div>
            </div>
            <div class="input-group mt-5">
                <div class="form-outline col-11" style="padding-left: 8%;">
                    <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Mobil yang diminati" name="unit_minat" value="<?= $user[0]['unit_minat']; ?>" />
                    <div class="text-danger" style="margin-left: 10px;"><?= form_error('unit_minat') ?></div>
                </div>



                <!-- end of search -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-grid gap-2 ms-2 mt-5">
                                <?php if ($user[0]['sts'] == 'Waiting') : ?>
                                    <button class="btn btn-primary btn-lg submit-button" type="submit">Kirim</button>
                                    <a class="btn btn-danger btn-lg submit-button mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</a>
                                <?php endif; ?>
                                <?php if ($user[0]['sts'] == 'Deal') : ?>
                                    <span class="badge badge-success text-success" style="font-size: 24px;">Status : Deal</span>
                                <?php endif; ?>
                                <?php if ($user[0]['sts'] == 'Lost') : ?>
                                    <span class="badge badge-danger text-danger" style="font-size: 24px;">Status : Lost</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>



                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="container">
                                    <h1 class="modal-title fs-6 text-center" id="exampleModalLabel">Apakah anda yakin ingin Data Ini?</h1>
                                </div>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-danger btn-lg submit-button mt-2" data-bs-dismiss="modal">Tidak</button>
                                <a href="<?php echo url('master/deleteProspect/' . $user[0]['id']) ?>" class="btn btn-success btn-lg submit-button mt-2" type="submit">Ya, hapus</a>
                            </div>
                        </div>
                    </div>
                </div>