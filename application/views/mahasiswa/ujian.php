<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 ">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> - <?= $user['nama']  ?>(<?= $user['nim']  ?>)</h1>
        </div>
        <div class="col-xl-2">
            <?php if ($jumlah_ujian < 4) :  ?>
                <form action="<?= base_url('mahasiswa/tambahUjian/') . $user['nim']  ?>">
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
                    <span class="text">Tambah Ujian</span>
                </button>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <?= $this->session->flashdata('message');  ?>
            <div class="card shadow mb-3 box border-left-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Dosen Pembimbing</h6>
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
            <div class="card shadow mb-3 box border-left-primary">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Ujian</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr style="background-color: 	#f8f8f8; color: #101010">
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal Tambah Ujian</th>
                                    <th scope="col">Jenis Ujian</th>
                                    <th scope="col">Tanggal Ujian</th>
                                    <th scope="col">Status Ujian</th>
                                    <th scope="col">Validate</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($ujian as $u) :  ?>
                                    <tr>
                                        <th scope="row"><?= $i++;  ?></th>
                                        <td><?= $u['tgl_tambah_ujian']  ?></td>
                                        <td><?= $u['nama_ujian']  ?></td>
                                        <td><?= $u['tgl_ujian']  ?></td>
                                        <!-- status Ujian -->
                                        <?php if ($u['statusUjian'] == 1) { ?>
                                            <td><span class="badge badge-pill badge-success">Lulus</span></td>
                                        <?php } elseif ($u['statusUjian'] == 2) { ?>
                                            <td><span class="badge badge-pill badge-primary">Proses</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge badge-pill badge-danger">Tidak Lulus</span></td>
                                        <?php } ?>

                                        <!-- valid ujian -->
                                        <?php if ($u['valid'] == 1) { ?>
                                            <td><span class="badge badge-pill badge-success">Valid</span></td>
                                        <?php } elseif ($u['valid'] == 2) { ?>
                                            <td><span class="badge badge-pill badge-primary">Proses</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge badge-pill badge-danger">Tidak Valid</span></td>
                                        <?php } ?>
                                        <td><?= $u['nilai_akhir']  ?></td>
                                        <td>
                                            <?php if ($u['valid'] == 1) :  ?>
                                                <button class="btn btn-secondary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-trash-alt"></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </button>
                                            <?php else : ?>
                                                <a href="<?= base_url('mahasiswa')  ?>/hapusUjian/<?= $u['id'];  ?>" class="btn btn-danger btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-trash-alt"></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </a>
                                            <?php endif; ?>

                                            <?php if ($u['valid'] == 1) :  ?>
                                                <button class="btn btn-secondary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-pencil-alt"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </button>
                                            <?php else : ?>
                                                <a href="<?= base_url('mahasiswa')  ?>/editUjian/<?= $u['id'];  ?>" class="btn btn-primary btn-icon-split btn-sm">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-fw fa-pencil-alt"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                            <?php endif; ?>


                                            <button type="button" class="btn btn-info btn-icon-split detail-ujian btn-sm" data-toggle="modal" data-target="#ModalDetailUjian" data-id="<?= $u['id']  ?>">
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


<!-- Modal -->
<div class="container">


    <div class="modal fade bd-example-modal-xl" id="ModalDetailUjian" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Detail Ujian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  transisi">
                    <div class="table-responsive test">
                        <div class="form-group row">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Nama Ujian</label>
                            <div class="col-sm-9">
                                <p id="nama_ujian"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Tanggal Ujian</label>
                            <div class="col-sm-9">
                                <p id="tgl_ujian"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-9">
                                <p id="nilai"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Bobot</label>
                            <div class="col-sm-9">
                                <p id="bobot"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Status Ujian</label>
                            <div class="col-sm-9">
                                <span class="statusUjian"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Validate</label>
                            <div class="col-sm-9">
                                <span class="valid"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Bukti</label>
                            <div class="col-sm-9">
                                <a id="bukti"></a>
                            </div>
                        </div>
                        <div class="form-group row cls">
                            <label for="nomorInduk" class="col-sm-3 col-form-label">Komentar</label>
                            <div class="col-sm-9">
                                <p id="komentar"></p>
                            </div>
                        </div>
                        <table class="table table-bordered text-center" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Nama Dosen</th>
                                    <th scope="col">Status Dosen</th>
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="penguji">

                            </tbody>
                            <tfoot>
                                <th>Nilai akhir</th>
                                <td></td>
                                <td></td>
                                <td id="nilai-akhir"></td>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cls" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>