<div class="container forgot-layout">
  <h1 class="forgot-title mt-3">Forgot Your Password?</h1>
  <?php if (isset($message)) : ?>
    <p class="alert alert-<?php echo $message_type ?>"><?php echo $message ?></p>
  <?php endif; ?>

  <?php if (!empty($this->session->flashdata('alert'))) : ?>
    <p class="alert alert-<?php echo $this->session->flashdata('alert-type') ?>"><?php echo $this->session->flashdata('alert') ?></p>
  <?php endif; ?>

  <p class="login-box-msg text-white text-center">Anda lupa kata sandi? Di sini Anda dapat dengan mudah menganti kata sandi baru</p>
  <?php echo form_open('/login/reset_password', ['method' => 'POST', 'autocomplete' => 'off']); ?>
  <div class="input-group mt-5">
    <div class="form-outline col-11" style="padding-left: 8%;">
      <input type="text" class="form-control search-forgot form-control-lg" placeholder="<?php echo lang('username_or_email') ?>" value="<?php echo !empty(post('username')) ? post('username') : get('username')  ?>" name="username" autofocus />
      <?php echo form_error('username', '<span style="display:block" class="error invalid-feedback">', '</span>'); ?>
    </div>
    <div class="input-group mt-5">
      <div class="d-grid gap-2 col-11 mx-auto mt-4">
        <button type="submit" class="btn btn-primary btn-lg mt-2  sign-in">Send</a>
      </div>
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <a href="<?= url('/halaman-login') ?>" class="back-login">Back to login page</a>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close(); ?>