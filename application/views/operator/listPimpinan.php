<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mb-0 text-gray-800">Daftar Pimpinan</h1>
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
                                <h6 class=" m-0 font-weight-bold clr-white">Tentang Daftar Pimpinan</h6>
                                <i><i class="fas fa-chevron-down clr-white"></i></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body pb-4 clr-black">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="font-weight-bold">Daftar Pimpinan</span>, adalah berisikan daftar Pimpinan Fakultas Ekonomi dan Bisnis. Memiliki fungsi mahasiswa, dosen dan rekap yang merujuk ke akun Pimpinan.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- 
                <div class="col-lg-12 d-sm-flex align-items-center justify-content-between mb-3">
                    <h1 class="h5 mb-0 text-gray-800">List Dosen</h1>
                </div> -->

                <div class="col-lg-12">
                    <!-- Content Row -->
                    <div class="row ">

                        <div class="col-lg-12 col-md-12 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Pimpinan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover text-left text-nowrap table-sm" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="text-center" style="background-color: #2980b9;color:#ecf0f1 ">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Pimpinan</th>
                                                    <th>Nip</th>
                                                    <th>Posisi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($pimpinan as $p) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i; ?></td>
                                                        <td><?= $p['nama_dosen']; ?></td>
                                                        <td><?= $p['nip']; ?></td>
                                                        <?php if ($p['jabatan_pimpinan'] >= 15) : ?>
                                                            <td> <?= $p['status_dosen'] ?> <button type="button" data-target="#ubahPimpinan" class="btn btn-outline-primary btn-circle btn-sm float-right ubahPimpinan" data-toggle="modal" data-nip="<?= $p['nip'] ?>">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </button> </td>
                                                        <?php elseif ($p['jabatan_pimpinan'] == 14) : ?>
                                                            <td><?= $p['status_dosen'] . " " . $p['nama_prodi'] ?> <button data-target="#ubahPimpinan" class="btn btn-outline-primary btn-circle btn-sm float-right ubahPimpinan" data-toggle="modal" data-nip="<?= $p['nip'] ?>">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </button> </td>
                                                        <?php else : ?>
                                                            <td> <?= $p['status_dosen'] . " " . $p['nama_prodi'] . " " . $p['jenjang_prodi']   ?>
                                                                <button data-target="#ubahPimpinan" class="btn btn-outline-primary btn-circle btn-sm float-right ubahPimpinan" data-toggle="modal" data-nip="<?= $p['nip'] ?>">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </button> </td>
                                                        <?php endif; ?>

                                                        <td class="text-center">
                                                            <a href="<?= base_url('pimpinan/laporanStatusMahasiswa/') . $p['jabatan_pimpinan'] . "/" . $p['prodi_dosen'] ?>" class="btn btn-info btn-icon-split btn-sm">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-eye"></i>
                                                                </span>
                                                                <span class="text">Mahasiswa</span>
                                                            </a>
                                                            <a href="<?= base_url('pimpinan/laporanDosen/') . $p['jabatan_pimpinan'] . "/" . $p['prodi_dosen'] . "/" . $p['nip'] ?>" class="btn btn-ujian btn-icon-split btn-sm">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-paste"></i>
                                                                </span>
                                                                <span class="text clr-white">Dosen</span>
                                                            </a>
                                                            <a href="<?= base_url('pimpinan/rekapDosen/') . $p['jabatan_pimpinan'] . "/" . $p['prodi_dosen'] . "/" . $p['nip'] ?>" class="btn btn-publikasi btn-icon-split btn-sm">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-book"></i>
                                                                </span>
                                                                <span class="text clr-white">Rekap</span>
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

    <!-- Modal Ubah Pimpinan -->
    <div class="modal fade" id="ubahPimpinan" tabindex="-1" role="dialog" aria-labelledby="ubahPimpinan" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title clr-white" id="exampleModalLabel">Ubah Pimpinan</h5>
                    <button type="button" class="close clr-white cls" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('operator/ubahPimpinan') ?>" class="table-responsive" method="post">
                    <div class="container">
                        <div class="modal-body" style="height: 35rem;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 ml-2 mx-auto">
                                    <table class="table table-bordered text-center" id="dataTablePimpinan" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="row">#</th>
                                                <th scope="row">Nama Dosen</th>
                                                <th scope="row">Nip</th>
                                                <th style="width: 50%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="pop-dosen">
                                            <?php $i = 1;
                                            foreach ($dosen as $dsn) :  ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td class="text-left"><?= $dsn['nama_dosen'];  ?></td>
                                                    <td><?= $dsn['nip'] ?></td>
                                                    <td>
                                                        <input type="radio" name="nip" value="<?= $dsn['nip']  ?>">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="container">
                        <div class="modal-footer">
                            <div class="input-group input-group-sm ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Jabatan</span>
                                </div>
                                <input type="text" class="form-control jabatan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" id="jabatan" name="p_posisi" readonly>
                                <input type="hidden" name="jurusan" id="jurusan_p">
                                <input type="hidden" name="prodi" id="prodi_p">
                                <input type="hidden" name="jabatan" id="jabatan_p">
                                <input type="hidden" name="nip_pimpinan_old" id="nip_pimpinan_old">
                            </div>
                            <div class="ket">

                            </div>
                            <button type="button" class="btn btn-secondary cls" data-dismiss="modal">Tutup</button>
                            <input type="submit" class="btn btn-success cls" name="ubah" value="ubah">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Ubah Pimpinan -->