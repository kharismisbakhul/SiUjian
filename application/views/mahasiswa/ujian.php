<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-10 ">
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> - <?= $user_login['nama']  ?>(<?= $user_login['nim']  ?>)</h1>
        </div>
        <div class="col-xl-2">
            <?php if ($user_login['jenjang'] == 'S3' && $user_login['jurusankode'] == 1 && $jumlah_ujian < 12) :  ?>
                <form action="<?= base_url('mahasiswa/tambahUjian/') . $user_login['nim']  ?>">
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
                                    <th scope="col">Tanggal Ujian</th>
                                    <th scope="col">Jenis Ujian</th>

                                    <th scope="col">Status Ujian</th>
                                    <th scope="col">Validate</th>
                                    <th scope="col">Nilai</th>
                                    <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                                        <?php if ($user_login['jenjang'] == 'S3' && $user_login['jurusankode'] == 1) : ?>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Nilai Angka</th>
                                            <th scope="col">Angka Mutu (%)</th>
                                            <th scope="col">Angka Mutu x Nilai</th>
                                        <?php else : ?>

                                            <th scope="col">Angka Mutu (%)</th>
                                            <th scope="col">Angka Mutu x Nilai</th>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($ujian as $u) :  ?>
                                    <tr>
                                        <th class="align-middle" scope="row"><?= $i++;  ?></th>
                                        <td class="align-middle"><small><?= $u['tgl_ujian']  ?></small></td>
                                        <td class="align-middle"><?= $u['nama_ujian']  ?></td>

                                        <!-- status Ujian -->
                                        <?php if ($u['statusUjian'] == 1) { ?>
                                            <td class="align-middle"><span class="badge badge-pill badge-success">Lulus</span></td>
                                        <?php } elseif ($u['statusUjian'] == 2) { ?>
                                            <td class="align-middle"><span class="badge badge-pill badge-primary">Proses</span></td>
                                        <?php } else { ?>
                                            <td class="align-middle"><span class="badge badge-pill badge-danger">Tidak Lulus</span></td>
                                        <?php } ?>

                                        <!-- valid ujian -->
                                        <?php if ($u['valid'] == 1) { ?>
                                            <td class="align-middle"><span class="badge badge-pill badge-success">Valid</span></td>
                                        <?php } elseif ($u['valid'] == 2) { ?>
                                            <td class="align-middle"><span class="badge badge-pill badge-primary">Proses</span></td>
                                        <?php } else { ?>
                                            <td class="align-middle"><span class="badge badge-pill badge-danger">Tidak Valid</span></td>
                                        <?php } ?>
                                        <td class="align-middle"><?= $u['nilai_akhir']  ?></td>
                                        <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                                            <?php if ($user_login['jenjang'] == 'S3' && $user_login['jurusankode'] == 1) : ?>
                                                <th scope="col" class="align-middle"><?= $u['bobot_nilai'] * 100 ?>%</th>
                                                <?php if ($u['kode'] == 5 || $u['kode'] == 7) : ?>
                                                    <th class="align-middle" scope="col" rowspan="2"><?= $u['nilai_akhir_angka'] ?></th>
                                                    <td class="align-middle" scope="col" rowspan="2"><?= $u['angka_mutu'] ?></td>
                                                    <td class="align-middle" scope="col" rowspan="2"><?= $u['angka_mutu_x_nilai'] ?></td>
                                                <?php elseif ($u['kode'] == 9) : ?>
                                                    <th scope="col" class="align-middle" rowspan="4"><?= $u['nilai_akhir_angka'] ?></th>
                                                    <td scope="col" class="align-middle" rowspan="4"><?= $u['angka_mutu'] ?></td>
                                                    <td scope="col" class="align-middle" rowspan="4"><?= $u['angka_mutu_x_nilai'] ?></td>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <td class="align-middle" scope="col"><?= $u['angka_mutu'] ?></td>
                                                <td class="align-middle" scope="col"><?= $u['angka_mutu_x_nilai'] ?></td>
                                            <?php endif; ?>
                                        <?php endif; ?>
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
                            <tfoot>
                                <tr>
                                    <?php if ($this->session->userdata('user_profile_kode') != 5) : ?>
                                        <?php if ($user_login['jenjang'] == 'S3' && $user_login['jurusankode'] == 1) : ?>
                                            <td colspan="8">Jumlah</td>
                                            <td>1.0</td>
                                            <td class="font-weight-bold"><?= $user_login['nilaiTA'] ?> (<?= $user_login['nilai_huruf'] ?>)</td>
                                        <?php else : ?>
                                            <td colspan="6">Jumlah</td>
                                            <td>1.0</td>
                                            <td class="font-weight-bold"><?= $user_login['nilaiTA'] ?> (<?= $user_login['nilai_huruf'] ?>)</td>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <?php if ($user_login['jenjang'] == 'S3' && $user_login['jurusankode'] == 1) : ?>
                                            <td colspan="5">Jumlah</td>
                                            <td class="font-weight-bold"><?= $user_login['nilaiTA'] ?> (<?= $user_login['nilai_huruf'] ?>)</td>
                                        <?php else : ?>
                                            <td colspan="5">Jumlah</td>
                                            <td class="font-weight-bold"><?= $user_login['nilaiTA'] ?> (<?= $user_login['nilai_huruf'] ?>)</td>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tr>
                            </tfoot>
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
                <div class="modal-body transisi">
                    <div class="table-responsive test col-lg-11">
                        <div class="card">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <td>Jenis Ujian&nbsp;&nbsp;</td>
                                        <td id="nama_ujian"></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Ujian&nbsp;&nbsp;</td>
                                        <td id="tgl_ujian"></td>
                                    </tr>
                                    <tr>
                                        <td>Nilai&nbsp;&nbsp;</td>
                                        <td id="nilai"></td>
                                    </tr>
                                    <tr>
                                        <td>Bobot&nbsp;&nbsp;</td>
                                        <td id="bobot"></td>
                                    </tr>
                                    <tr>
                                        <td>Status Ujian&nbsp;&nbsp;</td>
                                        <td>:&nbsp;<span class="statusUjian"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Validate&nbsp;&nbsp;</td>
                                        <td>:&nbsp;<span class="valid"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Bukti&nbsp;&nbsp;</td>
                                        <td id="bukti"></td>
                                    </tr>
                                    <tr>
                                        <td>Komentar&nbsp;&nbsp;</td>
                                        <td id="komentar"></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <table class="table table-sm  table-striped text-center" cellspacing="0" style="font-size: 16px">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary cls" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</div>