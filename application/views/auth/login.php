<div class="container mt-5" style="width: 100%; height: 100%;">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12 mt-5">
      <div class="card o-hidden border-0 shadow-lg my-5" style="width: 100%;">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-5 d-none d-lg-block haha text-center ml-2 clr-white">
              <img src="<?= base_url('assets/') ?>img/profile/default.png" class="rounded mx-auto d-block mt-4 " alt="" style="width: 50%;">
              <h1 class="h2 title mt-3 font-weight-bold" style="color:white;">Si-Ujian</h1>
              <h6 class="h6 title mt-5 ml-2 font-weight-bold" style="color:white;">Fakultas Ekonomi dan Bisnis</h6>
              <h6 class="h6 title mt-0 ml-2 font-weight-bold" style="color:white;">Universitas Brawijaya</h6>
            </div>
            <div class="col-lg-6 col-sm-12 mx-auto gatau">
              <div class="py-4">
                <div class="text-center div-title">
                  <h1 class="h4 title mb-3 font-weight-bold" style="color:black;">Login</h1>
                  <h6 class="sub-title mb-4 font-weight-normal" style="font-size: 0.8rem;">Please sign in with your SIAM / SIADO account</h6>
                </div>
                <?= $this->session->flashdata('message');  ?>
                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Nomor Induk" value="<?= set_value('username'); ?>" style=" border-radius:10px;">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" style="border-radius:10px;">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block" style="font-size: 1rem; border-radius:10px;">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small text-primary text-decoration-none forget" href="<?= base_url('auth/forgotpassword') ?>">Forgot Password?</a>
                  </div>
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