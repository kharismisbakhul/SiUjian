<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message');  ?>
        </div>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Profil Admin</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body box">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <img src="<?= base_url('/assets/') ?>img/logo-ub-removebg-preview.png" alt="" id="profile_picture" style="width: 180px; padding: 20px;">
                            </div>
                            <div class="col-md-8 mt-4">
                                <div class="card-body">
                                    <h5 class="card-title"><span><?= $user['nama']; ?></span></h5>
                                    <p class="card-text"> <i class="fas fa-fw fa-user-alt"></i>
                                        <span>Username <?= $user['username'] ?></span></p>
                                    <?php
                                    $newDate = date("d M Y", strtotime($user['date_created']));
                                    ?>
                                    <p class="card-text"><small class="text-muted">date created <?= $newDate  ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->