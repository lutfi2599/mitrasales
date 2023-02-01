<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-dark">

  <div class="loader" id="loader">
    <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
  </div>

  <img src="assets/img/images/mobil2.jpg" alt="" width="80%" class="main-car">
  <h1 class="main-title">Jadilah Mitra Agung Toyota & Raih Hadiahnya!</h1>

  <div class="d-grid gap-2 col-10 mx-auto">
    <a href="<?= url('/halaman-signin') ?>" class="btn btn-primary btn-lg mt-4 sign-in">Sign In</a>
  </div>

  <div class="container">
    <div class="row">
      <div class="d-grid gap-5 col-6 mx-auto">
        <a href="<?= url('/halaman-signup') ?>" class="btn btn-dark btn-lg mt-4 sign-in side-button sign-up">Sign Up</a>
      </div>
      <div class="d-grid gap-5 col-6 mx-auto">
        <a href="<?= url('/halaman-forgot-password') ?>" class="btn btn-dark btn-lg mt-4 sign-in side-button forgot-password">Forgot Password</a>
      </div>

    </div>
  </div>
  </div>

  <div class="terms-conditions text-center mt-3">
    <p>By continuing you agree to the terms and conditions</p>
  </div>




  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>