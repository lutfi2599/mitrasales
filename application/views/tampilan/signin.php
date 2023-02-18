<body>

  <div class="container forgot-layout">
    <h1 class="forgot-title mt-3">Sign In</h1>
    <?php if (isset($message)) : ?>
      <p class="alert alert-<?php echo $message_type ?>"><?php echo $message ?></p>
    <?php endif; ?>

    <?php if (!empty($this->session->flashdata('alert'))) : ?>
      <p class="alert alert-<?php echo $this->session->flashdata('alert-type'); ?>"><?php echo $this->session->flashdata('alert') ?></p>
    <?php endif; ?>

    <form action="<?php echo base_url('login/check') ?>" method="post">
      <div class="input-group mt-5">
        <div class="form-outline col-11" style="padding-left: 8%;">
          <input type="text" id="form1" class="form-control search-forgot form-control-lg" placeholder="Username" name="username" value="<?php echo post('username') ?>" />
          <div class="mt-1">
            <small class="text-danger"><?= form_error('username'); ?></small>
          </div>
        </div>
        <div class="input-group mt-5">
          <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="password" id="form1" class="form-control search-forgot form-control-lg" placeholder="Password" name="password" />
            <div class="mt-1">
              <small class="text-danger"><?= form_error('password'); ?></small>
            </div>
          </div>
          <div class="d-grid gap-2 col-11 mx-auto mt-4">
            <button type="submit" class="btn btn-primary btn-lg mt-2  sign-in">Sign In</button>
          </div>
          <div class="container">
            <div class="row">
              <div class="col text-center">
                <a href="<?= url('/halaman-login') ?>" class="back-login">Back to login page</a>
              </div>
            </div>
          </div>
        </div>
    </form>