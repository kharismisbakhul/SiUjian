<!-- Begin Page Content -->
<div class="container-fluid col-lg-12">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3 mt-3">
        <a href="<?= base_url('agendaDosen/agenda') ?>">
            <i class="fas fa-arrow-left text-gray-800"></i>
        </a>
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div class="tanggal">
            <div class="text-s mb-0 font-weight-bold text-gray-400">
                <span><i class="fas fa-calendar-day text-gray-400"></i></span> <?= date('d M Y'); ?>
            </div>
        </div>
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
                <div class="card-body col-lg-12">
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