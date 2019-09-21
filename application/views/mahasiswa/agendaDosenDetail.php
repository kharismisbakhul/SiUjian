<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 col-lg-2"><?= $title;  ?> </h1>
    </div>

    <!-- Start Card Agenda Dosen -->
    <div class="row box">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $user_login['nama_dosen']; ?> - <?= $user_login['nip']; ?></h6>
                    <input type="hidden" id="nip_dosen" value="<?= $user_login['nip']; ?>">
                    <div class="dropdown no-arrow">
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="row mt-2 mb-1 m-0">
                        <h2 class="col-lg-6 monthYear">

                        </h2>
                    </div>
                    <div class="row mb-4 m-0">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="date" name="calendarSpesifik" id="tanggalSpesifik">
                        </div>
                    </div>
                    <div class="row m-0 col-lg-12">
                        <div id="calendar" style="margin: 0 auto;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Agenda Dosen -->
    <!-- /.container-fluid -->

</div>