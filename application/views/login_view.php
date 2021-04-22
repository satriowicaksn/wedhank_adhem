<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Wedhank Adhem</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="" />
  <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
</head>

<body>
  <div class="container-scroller text-center">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel" style="background: white;">
        <!-- <h2 style="color:white;" class="mt-5">Login</h2>
        <a href="#" class="btn btn-light" style="background-color: white; color: #2cb0d1;">Please login to your account</a> -->

        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">




              <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="background-image:  linear-gradient(to bottom right, #A97B4C, #944300); box-shadow: 2px 2px 2px rgba(0.3,0.4,0,0.3); border: none; border-radius: 20px;">

                <h3 style="color: white;" class="text-center"><span class="fa fa-beer"></span>&nbsp Es Kopi Klasik - Login Page</h3>

                <hr class="col-6">
                <p class="text-info">* Please login with your account</p>
                <?php echo $this->session->flashdata('notif'); ?>
                <form class="pt-3" action="<?= base_url(); ?>index.php/auth/cek_auth" method="post">
                  <div class="form-group">
                    <h5 style="color: white;">  <i class="fa fa-user"></i>&nbsp Username </h5>
                    <input style="border-radius: 15px; border-color: white; color: white;" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Username" name="username" required>
                  </div>
                  <div class="form-group">
                    <h5 style="color: white;">  <i class="fa fa-key"></i>&nbsp Password </h5>
                    <input style="border-radius: 15px; border-color: white; color: white;" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Enter Password" name="password" required>
                  </div>
                  <hr class="col-6">
                  <div class="mt-2">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="background: white; color:#4D2E07; border:none; border-radius: 15px;">SIGN IN</button>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>

      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="<?= base_url(); ?>assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>assets/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
