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
                                <h6 class=" m-0 font-weight-bold clr-white">Tentang Rekapitulasi Laporan Dosen</h6>
                                <i><i class="fas fa-chevron-down clr-white"></i></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body pb-4">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="font-weight-bold">Rekap Dosen</span> adalah rekapan keselurahan informasi detail dosen selama menjadi pembimbing maupun penguji mahasiswa
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

                        <div class="col-lg-12 col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Rekapitulasi Laporan Dosen</h6>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('pimpinan/rekapDosen/') . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5); ?>" method="post">
                                        <div class="row mb-2">
                                            <div class="col-md-3">
                                                <small>Mulai Periode</small>
                                                <?php if ($star_date != null) : ?>
                                                    <small class="str"> <?= $star_date ?></small>
                                                <?php endif; ?>
                                                <input type="date" class="form-control" name="star_date">
                                            </div>
                                            <div class="col-md-3">
                                                <small>Akhir Periode</small>
                                                <?php if ($end_date != null) : ?>
                                                    <small class="end"> <?= $end_date ?></small>
                                                <?php endif; ?>
                                                <div class="input-group mb-3">
                                                    <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="end_date">
                                                    <div class="input-group-append">
                                                        <input type="submit" class="btn btn-primary submit" name="submit" value="cari" id="basic-addon2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center table-striped" id="dataTable" width="100%" cellspacing="0">
                                            <thead style="background-color: #2980b9;color:#ecf0f1 ">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Dosen</th>
                                                    <th>Pembimbing</th>
                                                    <th>Penguji</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($rekap_dosen as $rd) : ?>
                                                    <tr>
                                                        <td><?= $i; ?></td>
                                                        <td class="text-left"><?= $rd['nama_dosen']; ?></td>
                                                        <td><?= $rd['jumlah_mahasiswa_bimbingan']; ?></td>
                                                        <td><?= $rd['jumlah_menguji']; ?></td>
                                                        <td class="text-center">
                                                            <button href="#" class="btn btn-info btn-icon-split btn-sm modalRekap" data-toggle="modal" data-target=".modalDetailRekap" data-id="<?= $rd['nip']; ?>">
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
                                        </table>
                                    </div>
                                    <div class="text-xs pt-3 pb-3 see-more font-weight-normal"></div>
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
    <div class="modal fade bd-example-modal-lg modalDetailRekap" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title clr-white ml-4" id="exampleModalLabel">Detail Rekapitulasi Dosen - <span class="nama-dosennya"></span></h5>
                    <button type="button" class="close clr-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <!-- Start jumlah pembimbing -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Pembimbing</h6>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Pembimbing Ketua</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPembimbingKetua"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Pembimbing 1</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPembimbing1"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Pembimbing 2</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPembimbing2"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Promotor</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPromotor"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Co Promotor 1</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jCoPromotor1"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Co Promotor 2</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jCoPromotor2"></h6>
                                            </div>
                                        </div>
                                        <br class="mt-1">
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Jumlah</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold jTotalPembimbing"></h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Jumlah pembimbing -->

                        <!-- Start jumlah penguji -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Penguji</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji Ketua</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPengujiKetua"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji 1</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPenguji1"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji 2</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPenguji2"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji 3</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPenguji3"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji Tamu 1</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPengujiTamu1"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji Tamu 2</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="jPengujiTamu2"></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Jumlah</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold jTotalPenguji"></h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Jumlah Penguji -->

                        <!-- Start Jumlah Ujian -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Status Mahasiswa Bimbingan S2</h6>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Tahap Komisi</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="statusKomisi"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Proposal Ujian</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="statusProposal"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Seminar Hasil</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="statusSemhas"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Ujian Tesis</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="statusTesis"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Wisuda</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="statusWisuda"></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Jumlah</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold statusTotalUjian"></h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Jumlah Ujian -->
                        <!-- Start Jumlah Ujian -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Status Mahasiswa Bimbingan S3</h6>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Makalah 1</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="makalah1"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Makalah 2</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="makalah2"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Seminar Proposal</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="seminarProposal"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Proposal</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="proposal"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Ujian Proposal</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="ujianProposal"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Pelaksanaan Penelitian</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="pelaksanaanPenelitian"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Persentasi 3</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="persentasi3"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Seminar Hasil</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="seminarHasil"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Eksternal Review</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="ekternalReview"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Ujian Disertai</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="ujianDisertasi"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Wisuda</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="wisudas3"></h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Jumlah</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold totalUjian"></h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Jumlah Ujian -->

                        <!-- Start Jumlah Kelulusan -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Jumlah Kelulusan Mahasiswa Bimbingan</h6>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <br>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Belum Lulus</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="statusBelumLulus"></h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Lulus</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="statusLulus"></h6>
                                            </div>
                                        </div>
                                        <br>
                                        <br class="mt-2">
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Jumlah Kelulusan / Belum</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold statusTotalLulusTidak"></h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Jumlah Kelulusan -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Detail Profile modal -->