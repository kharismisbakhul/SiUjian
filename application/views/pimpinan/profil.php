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
                    <h6 class="m-0 font-weight-bold text-primary">Profil Pimpinan</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <form>
                        <div class="form-group row mb-1">
                            <img src="<?= base_url('/assets/') ?>img/logo-ub-removebg-preview.png" alt="" id="profile_picture" style="max-width:10em; max-height:10em;">
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user['nama']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Posisi</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span>Pimpinan</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->