

  <div class="container forgot-layout">
    <h1 class="forgot-title mt-3">Forgot Your Password?</h1>


 <?php echo form_open('/login/reset_password', ['method' => 'POST', 'autocomplete' => 'off']); ?> 
    <div class="input-group mt-5">
      <div class="form-outline col-11" style="padding-left: 8%;">
        <input type="text" id="form1" class="form-control search-forgot form-control-lg" placeholder="No Hp" name="telepon"/>
      </div>
      <div class="input-group mt-5">
        <div class="form-outline col-11" style="padding-left: 8%;">
          <input type="text" id="form1" class="form-control search-forgot form-control-lg" placeholder="Email" name="email"/>
        </div>
        <div class="d-grid gap-2 col-11 mx-auto mt-4">
          <button type="submit" class="btn btn-primary btn-lg mt-2  sign-in">Send</a>
        </div>
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <a href="home" class="back-login">Back to login page</a>
            </div>
          </div>
        </div>
      </div>
   <?php echo form_close(); ?>

    