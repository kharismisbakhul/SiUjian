<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Si-Ujian</title>
    <!-- Custom fonts for this template-->

    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/custom/login.css">
</head>
<body>
    
<body>

  <div class="container mt-5">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="width: 60%; height:100%;">

      <div class="col-xl-12 col-sm-12 col-lg-12 col-md-9" >

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-5 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6 col-sm-12 mx-auto">
                <div class="py-4">
                  <div class="text-center div-title">
                    <h1 class="h2 title mb-3 font-weight-bold" style="color:black;">Login</h1>
                    <h5 class="h5 sub-title mb-3 font-weight-normal">Please sign in with your SIAM / SIADO account</h5>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nomor Induk" style="border-radius:10px;">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" style="border-radius:10px;">
                    </div>
                    <a href="#" class="forget text-decoration-none">Forgot password?</a>
                    <hr>
                    <a href="dashboard.php" class="btn btn-primary btn-user btn-block" style="font-size: 1rem; border-radius:10px;">
                      Login
                    </a>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <p class="text-center" style="margin-top: -30px; font-size: .7rem; color: white;">Copyright © 2019 PSIK FEB UB. All Rights Reserved. </p>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

</body>

</body>
</html>