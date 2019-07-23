<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-xl-10">
            <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?> - <?= $user_login['nama'] ?> (<?= $user_login['nim'] ?>) </h1>
        </div>
        <div class="col-xl-2 ">
            <?php if ($jumlah_publikasi < 2) : ?>
                <form action="<?= base_url('mahasiswa/tambahPublikasi/') . $user_login['nim'] ?>">
                    <button type="submit" class="btn btn-success float-right mb-2 tombol">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-plus-circle"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </button>
                </form>
            <?php else : ?>
                <button type="submit" class="btn btn-secondary float-right mb-2 tombol">
                    <span class="icon text-white-50">
                        <i class="fas fa-fw fa-plus-circle"></i>
                    </span>
                    <span class="text">Tambah</span>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?= $this->session->flashdata('message');  ?>
            <div class="card shadow mb-3 box border-left-success">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Dosen Pembimbing</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <?php foreach ($pembimbing as $pmb) : ?>
                            <p><?= $pmb['nama_dosen'] ?> - <span><?= $pmb['status_dosen'] ?></span></p>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12">
            <div class="card shadow mb-4 box border-left-success">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">Daftar Publikasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body ">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar row ml-1 mr-1 ">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr style="background-color: 	#f8f8f8; color: #101010">
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Judul Artikel</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($publikasi as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++  ?></th>
                                        <td><?= $p['tanggal']  ?></td>
                                        <td><?= $p['judulArtikel'] ?></td>
                                        <?php if ($p['valid'] == 1) {  ?>
                                            <td><span class="badge badge-pill badge-success">Valid</span></td>
                                        <?php } elseif ($p['valid'] == 2) { ?>
                                            <td><span class="badge badge-pill badge-primary">Proses</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge badge-pill badge-danger">Tidak Valid</span></td>
                                        <?php } ?>

                                        <td>
                                            <?php if ($p['valid'] == 2 || $p['valid'] == 3) :  ?>
                                                <a href="<?= base_url(); ?>mahasiswa/hapusPublikasi/<?= $p['idJurnal']  ?>" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-trash-alt"></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </a>
                                                <a href="<?= base_url(); ?>mahasiswa/editPublikasi/<?= $p['idJurnal']  ?>" class="btn btn-primary btn-icon-split btn-sm" id="editPublikasi">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-pencil-alt"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                            <?php else : ?>
                                                <a class="btn btn-secondary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-trash-alt"></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </a>
                                                <a class="btn btn-secondary btn-icon-split btn-sm" id="editPublikasi">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-pencil-alt"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                            <?php endif; ?>
                                            <button type="button" class=" detail btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target="#modalDetail" data-id="<?= $p['idJurnal'] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-fw fa-eye"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </button>
                                        </td>


                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Publikasi <img class="loader" style="width: 80px; height: 40px;"></h5>

                <button type="button" class="close cls" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-2">
                        <p>Tanggal</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="tanggal" name="tanggal" class="tanggal"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <p>Judul Artikel</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="judulArtikel" name="judulArtikel" class="judulArtikel"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <p>Nama Jurnal</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="namaJurnal" name="namaJurnal" class="namaJurnal"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <p>Volume dan No terbitan</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="volumeDanNoTerbitan" name="volumeDanNoTerbitan" class="volumeDanNoTerbitan"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <p>Status Jurnal</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="statusJurnal" name="judulArtikel" class="judulArtikel"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <p>Kategori Jurnal</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="col-lg-8">
                        <p id="kategoriJurnal" name="kategoriJurnal" class="kategoriJurnal"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <p>Bukti</p>
                    </div>
                    <div class="col-lg-1">
                        <p>:</p>
                    </div>
                    <div class="bukti col-lg-8">
                        <a id="bukti" name="bukti" class="bukti"></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cls" id="cls" name="cls" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal Detail -->