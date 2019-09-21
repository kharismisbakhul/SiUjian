<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
                <div class="tanggal">
                    <div class="text-s mb-0 font-weight-bold text-gray-400">
                        <span><i class="fas fa-fw fa-calendar-day text-gray-400"></i></span><?= date('d M Y') ?>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');  ?>"></div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row box">

                <div class="d-none d-lg-block col-md-8 mb-4">
                    <div class="shadow mb-1">
                        <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class=" m-0 font-weight-bold clr-white">Tentang Validasi</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body pb-4">
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quibusdam excepturi non ipsam
                                    deserunt hic placeat odio voluptas vitae odit enim a, veritatis at totam eaque consequuntur quae sit
                                    possimus!
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 col-md-12">
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Permintaan Validasi - Publikasi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto;">
                                            <form action="<?= base_url('operator/validasi_publikasi/') . $publikasi['idJurnal'] ?>" method="post">
                                                <div class="form-group row">
                                                    <label for="judulArtikel" class="col-sm-3 col-form-label">Judul Artikel</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="judulArtikel" value="<?= $publikasi['judulArtikel'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="namaJurnal" class="col-sm-3 col-form-label">Nama Jurnal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="namaJurnal" value="<?= $publikasi['namaJurnal'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="volumeNoTerbit" class="col-sm-3 col-form-label">Volume dan No Terbit</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="volumeNoTerbit" value="<?= $publikasi['volumeDanNoTerbitan'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="kategoriJurnal" class="col-sm-3 col-form-label">Kategori Jurnal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="kategoriJurnal" value="<?= $publikasi['kategoriJurnal'] ?>" name="kategoriJurnal">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="statusJurnal" class="col-sm-3 col-form-label">Status Jurnal</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="statusJurnal" value="<?= $publikasi['statusJurnal'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="buktiJurnal" class="col-sm-3 col-form-label">Bukti</label>
                                                    <div class="col-sm-9">
                                                        <a href="<?= base_url('assets/publikasi/') . $publikasi['bukti'] ?>" id="buktiJurnal" class="text-decoration-none"><?= $publikasi['bukti'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="komentarRevisi" class="col-sm-3 col-form-label">Valid</label>
                                                    <div class="col-sm-9">
                                                        <?php if ($publikasi['valid'] == 1) : ?>
                                                        <span class="badge badge-pill badge-success">Valid</span>
                                                        <?php elseif ($publikasi['valid'] == 2) : ?>
                                                        <span class="badge badge-pill badge-primary">Proses</span>
                                                        <?php else : ?>
                                                        <span class="badge badge-pill badge-danger">Tidak Valid</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2" style="float:right;">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                                                        <button type="submit" class="btn btn-success" value="1" name="valid">Setuju </button>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2 mr-0" style="float:right;">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                                                        <button type="submit" class="btn btn-danger" value="3" name="valid">Tolak</button>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2 mr-2" style="float:right;">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                                                        <a href="<?= base_url('operator/publikasi')  ?>" class="btn btn-secondary">Kembali</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
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