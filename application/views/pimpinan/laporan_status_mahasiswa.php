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

                <div class="d-none d-lg-block col-md-8 mb-4">
                    <div class="shadow mb-1">
                        <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class=" m-0 font-weight-bold clr-white">Tentang Mahasiswa Keseluruhan</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body pb-4">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Laporan Status Mahasiswa adalah informasi detail mahasiswa yang berisi tahapan terbaru yang sedang dikerjakan oleh mahasiswa
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
                    <div class="row ">

                        <div class="col-lg-12 col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Mahasiswa Keseluruhan</h6>
                                </div>
                                <div class="card-body">
                                    <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                                        <form action="<?= base_url('pimpinan/laporanStatusMahasiswa/') . $this->uri->segment(3) . '/' . $this->uri->segment(4); ?>" method="post">
                                        <?php else : ?>
                                            <form action="<?= base_url('pimpinan/laporanStatusMahasiswa') ?>" method="post">
                                            <?php endif; ?>
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <small>Mulai Periode</small>
                                                    <?php if ($star_date != null) : ?>
                                                        <small> <?= $star_date ?></small>
                                                    <?php endif; ?>
                                                    <input type="date" class="form-control" name="star_date">
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Akhir Periode</small>
                                                    <?php if ($end_date != null) : ?>
                                                        <small> <?= $end_date ?></small>
                                                    <?php endif; ?>
                                                    <div class="input-group mb-3">
                                                        <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="end_date">
                                                        <div class="input-group-append">
                                                            <input type="submit" class="btn btn-primary" name="submit" value="cari" id="basic-addon2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="posisi" value="<?= $this->uri->segment(3); ?>">
                                            <input type="hidden" name="prodi" value="<?= $this->uri->segment(4); ?>">
                                            </form>
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center table-striped" id="dataTableLaporanMhs" width="100%" cellspacing="0">
                                                    <thead style="background-color: #2980b9;color:#ecf0f1 ">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tanggal Mulai Tugas Akhir</th>
                                                            <th>Nama Mahasiswa</th>
                                                            <th>Nim</th>
                                                            <th>Jenjang</th>
                                                            <th>Program Studi</th>
                                                            <th>Status 1</th>
                                                            <th>Status 2</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1;
                                                        foreach ($mahasiswa as $m) : ?>
                                                            <tr>
                                                                <td><?= $i; ?></td>
                                                                <td><?= $m['tglMulaiTA'] ?></td>
                                                                <td><?= $m['nama']; ?></td>
                                                                <td><?= $m['nim']; ?></td>
                                                                <td><?= $m['jenjang']; ?></td>
                                                                <td><?= $m['nama_prodi']; ?></td>
                                                                <?php if ($m['nama_ujian']) : ?>
                                                                    <td><?= $m['nama_ujian']; ?></td>
                                                                <?php else : ?>
                                                                    <td>Belum Mulai</td>
                                                                <?php endif; ?>
                                                                <?php if ($m['statusUjian'] == 1) : ?>
                                                                    <td class="text-success font-weight-bold">Lulus</td>
                                                                <?php elseif ($m['statusUjian'] == 2) : ?>
                                                                    <td class="text-primary font-weight-bold">Proses</td>
                                                                <?php elseif ($m['statusUjian'] == 3) : ?>
                                                                    <td class="text-danger font-weight-bold">Tidak Lulus</td>
                                                                <?php else : ?>
                                                                    <td>-</td>
                                                                <?php endif; ?>
                                                                <td class="text-center">
                                                                    <button class="btn btn-info btn-icon-split btn-sm modalDetail" data-toggle="modal" data-target=".modalDetailMahasiswa" data-id="<?= $m['nim']; ?>">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-eye"></i>
                                                                        </span>
                                                                        <span class="text">Info</span>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php $i++;
                                                        endforeach; ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th colspan="4"></th>
                                                            <th>Jenjang</th>
                                                            <th>Program Studi</th>
                                                            <th>Status 1</th>
                                                            <th>Status 2</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
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

    <!-- Detail profile modal -->
    <div class="modal fade bd-example-modal-lg modalDetailMahasiswa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title clr-white ml-4" id="exampleModalLabel">Detail Mahasiswa - <span class="nama_mahasiswa"></span></h5>
                    <button type="button" class="close clr-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-capitalize">Detail Mahasiswa</h6>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Detail Profile modal -->