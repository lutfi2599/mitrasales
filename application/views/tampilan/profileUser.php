<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-dark">

  <div class="loader" id="loader">
    <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
  </div>

  <div class="text-center mt-4">
    <img src="https://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png" alt="" class="profile-picture">
    <h1 style="color: white;" class="profile-name"><?= $User[0]['nama_lengkap'] ?></h1>
    <h6 style="color: white;" class="profile-email"><?= $User[0]['email'] ?></h6>
  </div>
  <br>

  <?php echo form_open_multipart('users/updateDataUser/' . $User[0]['id'], ['class' => 'form-validate', 'autocomplete' => 'off']); ?>
  <div class="input-group mt-4">
    <div class="form-outline col-11" style="padding-left: 8%;">
      <input type="text" id="form1" class="form-control search form-control-lg" placeholder="username" name="username" value="<?= $User[0]['username'] ?>" required />
    </div>
    <div class="input-group mt-5">
      <div class="form-outline col-11" style="padding-left: 8%;">
        <input type="text" id="form1" class="form-control search form-control-lg" placeholder="nama lengkap" name="nama_lengkap" value="<?= $User[0]['nama_lengkap'] ?>" required />
      </div>
      <div class="input-group mt-5">
        <div class="form-outline col-11" style="padding-left: 8%;">
          <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Alamat" name="alamat" value="<?= $User[0]['alamat'] ?>" required />
        </div>
        <div class="input-group mt-5">
          <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="Hp" name="hp" value="<?= $User[0]['hp'] ?>" required />
          </div>
        </div>
        <div class="input-group mt-5">
          <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="email" name="email" value="<?= $User[0]['email'] ?>" required />
          </div>
        </div>
        <div class="input-group mt-5">
          <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="kendaraan" name="kendaraan" value="<?= $User[0]['kendaraan'] ?>" required />
          </div>
        </div>
        <div class="input-group mt-5">
          <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="salesman" name="salesman" value="<?= $User[0]['salesman'] ?>" required />
          </div>
        </div>
        <div class="input-group mt-5">
          <div class="form-outline col-11" style="padding-left: 8%;">
            <input type="text" id="form1" class="form-control search form-control-lg" placeholder="password" name="password" />
            <div>
              <small class="text-danger">kosongkan kolom password jika tidak mengubah password!</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="d-grid gap-2 col-11 mx-auto">
    <button type="submit" class="btn btn-primary btn-lg mt-2 sign-in">Update</button>
  </div>
  <?php echo form_close(); ?>
  <div class="d-grid gap-2 col-11 mx-auto mt-3">
    <a href="<?= url('/') ?>" class="btn btn-danger btn-lg mt-2" style="border-radius: 20px">Kembali Ke Home</a>
  </div>
  <div class="d-grid gap-2 col-11 mx-auto mt-3">
    <a href="<?= url('logout') ?>" class="btn btn-dark btn-lg mt-2 log-out">Log Out</a>
  </div>