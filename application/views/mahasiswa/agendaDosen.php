<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                <div class="tanggal">
                    <div class="text-s mb-0 font-weight-bold text-gray-400">
                        <span><i class="fas fa-calendar-day text-gray-400"></i></span> <?= date('d M Y'); ?>
                    </div>
                </div>
            </div>
            <!-- Content Row -->
            <div class="row box">

                <div class="d-none d-lg-block col-md-12 mb-4">
                    <div class="shadow mb-1">
                        <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class=" m-0 font-weight-bold clr-white">Tentang Agenda Dosen</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body pb-4">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="font-weight-bold">Agenda Dosen</span>, berisikan list agenda dari Dosen aktif Fakultas Ekonomi dan Bisnis.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12 col-md-12 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Dosen</h6>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover text-left text-nowrap table-sm" id="dataTableDosen" cellspacing="0">
                                            <thead style="background-color: #2980b9;color:#ecf0f1 ">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Dosen</th>
                                                    <th>NIP</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php $i = 1;
                                                    foreach ($dosen as $d) : ?>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $d['nama_dosen'] ?></td>
                                                        <td><?= $d['nip'] ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('mahasiswa/agendaDosen/') . $d['nip']; ?>" class="btn btn-info btn-icon-split btn-sm">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-eye"></i>
                                                                </span>
                                                                <span class="text">Lihat Agenda</span>
                                                            </a>
                                                        </td>

                                                </tr>
                                            <?php $i++;
                                            endforeach; ?>
                                            </tbody>
                                        </table>
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