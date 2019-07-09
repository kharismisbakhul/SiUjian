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
                    <h6 class="m-0 font-weight-bold text-primary">Profil Dosen</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <form>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user['nama']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">NIP</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user['nip']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Posisi</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <?php
                                if ($user['posisi'] == 1) {
                                    echo "<span'>Dosen FEB</span>";
                                } else {
                                    echo "<span'>Dosen Luar</span'>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status Aktif</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <?php
                                if ($user['nip'] == 1) {
                                    echo "<span class='text-primary'>AKTIF</span>>";
                                } else {
                                    echo "<span class='text-danger'>TIDAK AKTIF</span>";
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No Hp</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span></span>
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