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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
  <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
  <script>
    $(document).ready(function() {
      var $modal = $('#modal_crop');
      var crop_image = document.getElementById('sample_image');
      var cropper;
      $('#upload_image').change(function(event) {
        var files = event.target.files;
        var done = function(url) {
          crop_image.src = url;
          $modal.modal('show');
        };
        if (files && files.length > 0) {
          reader = new FileReader();
          reader.onload = function(event) {
            done(reader.result);
          };
          reader.readAsDataURL(files[0]);
        }
      });
      $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(crop_image, {
          aspectRatio: 1,
          viewMode: 3,
          preview: '.preview'
        });
      }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
      });
      $('#crop_and_upload').click(function() {
        canvas = cropper.getCroppedCanvas({
          width: 400,
          height: 400
        });
        canvas.toBlob(function(blob) {
          url = URL.createObjectURL(blob);
          var reader = new FileReader();
          reader.readAsDataURL(blob);
          reader.onloadend = function() {
            var base64data = reader.result;
            $.ajax({
              url: '<?= base_url('/users/crop') ?>',
              method: 'POST',
              data: {
                crop_image: base64data
              },
              success: function(data) {
                $modal.modal('hide');
                location.reload();
              }
            });
          };
        });
      });
    });
  </script>
  <style>
    .imgx {
      display: block;
      max-width: 100%;
    }

    .preview {
      overflow: hidden;
      width: 160px;
      height: 160px;
      margin: 10px;
      border: 1px solid red;
    }

    .modal-lg {
      max-width: 1000px !important;
    }
  </style>
</head>

<body class="bg-dark">

  <div class="loader" id="loader">
    <img id="loader-gif" src="assets/img/images/loader2.gif" alt="">
  </div>

  <div class="input-group mt-5" style="position: absolute; top: 100px">
    <div class="form-outline col-11" style="padding-left: 59%;">
      <form method="post">
        <label for="upload_image" class="btn btn-light btn-sm"><span class="fas fa-image"></span></label>
        <input type="file" name="crop_image" class="form-control search form-control-xs crop_image" id="upload_image" style="display:none" />
      </form>
    </div>
  </div>
  <br>

  <div class="text-center mt-4">
    <img src="<?= base_url('uploads/users/' . $User[0]['id'] . '.png'); ?>" alt="" class="profile-picture">
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


  <div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center">Crop Gambar</h5>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-md-8">
                <img class="imgx" src="" id="sample_image" />
              </div>
              <div class="col-md-4">
                <div class="preview"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="crop_and_upload" class="btn btn-primary btn-lg submit-button">Crop</button>
          <button type="button" class="btn btn-danger btn-lg submit-button mt-2" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>