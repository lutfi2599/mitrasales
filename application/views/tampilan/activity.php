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
                <p class="prospect-title">Activity Log</p>
            </div>
            <div class="col-4 mt-3">
                <a href="<?= url('users/viewEditUser/' . logged('id')) ?>"><img src="https://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png" alt="" class="user-picture mb-5"></a>
            </div>
        </div>
    </div>
    <!-- end of heading -->

    <!-- search -->
    <!-- <div class="input-group search-jurnal " style="position: absolute"> -->
        <!-- <div class="form-outline col-11" style="padding-left: 8%;">
         <input type="search" id="form1" class="form-control search" placeholder="Search" />
      </div> -->
        <!-- end of search -->
        <div class="container">
            <div class="row">
                <?php foreach ($activity as $row) : ?>
                    <div class="col-10 mt-3 prospect-person">
                        <p style="font-size: 14px;padding: 5px 0 0 0"><?= $row['activity'] ?></p>
                        <p style="font-size: 10px"><?= date('d/m/Y H:i', ($row['create_at'])) ?></p>
                    </div>
                <?php endforeach ?>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>