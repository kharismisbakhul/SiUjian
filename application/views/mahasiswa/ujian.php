<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
        </div>
        <div class="col-lg-2 float-right mb-2">
            <form action="<?= base_url('mahasiswa')  ?>/tambahUjian">
                <button type="submit" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fas fa-fw fa-plus-circle"></i>
                    </span>
                    <span class="text">Tambah</span>
                </button>
            </form>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message');  ?>

        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-10 col-lg-7">
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Ujian</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar row ml-1 mr-1 ">

                        <table class="table mb-0 table-sm" style="color: #101010">
                            <thead>
                                <tr style="background-color: #f8f8f8; color: #101010">
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jenis Ujian</th>
                                    <th scope="col">Tanggal Ujian</th>
                                    <th scope="col">Status Ujian</th>
                                    <th scope="col">Validate</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ujian as $u) :  ?>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td><?= $u['tgl_tambah_ujian']  ?></td>
                                        <td><?= $u['nama_ujian']  ?></td>
                                        <td><?= $u['tgl_ujian']  ?></td>
                                        <!-- status Ujian -->
                                        <?php if ($u['statusUjian'] == 1) { ?>
                                            <td class="font-weight-bold text-success">LULUS</td>
                                        <?php } elseif ($u['statusUjian'] == 2) { ?>
                                            <td class="font-weight-bold text-primary">PROSES</td>
                                        <?php } else { ?>
                                            <td class="font-weight-bold text-danger">TIDAK LULUS</td>
                                        <?php } ?>

                                        <!-- valid ujian -->
                                        <?php if ($u['valid'] == 1) { ?>
                                            <td class="font-weight-bold text-success">VALID</td>
                                        <?php } elseif ($u['valid'] == 2) { ?>
                                            <td class="font-weight-bold text-primary">PROSES</td>
                                        <?php } else { ?>
                                            <td class="font-weight-bold text-danger">TIDAK VALID</td>
                                        <?php } ?>
                                        <td><?= $u['nilai']  ?></td>
                                        <td><button type="button" class="badge badge-primary badge-icon-split" data-toggle="modal" data-target="#ModalProfil">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-fw fa-pencil-alt"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </button>
                                            <button type="button" class="badge badge-info badge-icon-split" data-toggle="modal" data-target="#ModalProfil">
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
<div class="modal fade bd-example-modal-xl" id="ModalUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="nama" placeholder="Nama mahasiswa..." readonly value="<?= $user['nama'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">NIM</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" id="nim" placeholder="Nim..." readonly value="<?= $user['nim'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Judul Tugas Akhir</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="judulTA" placeholder="Tugas Akhir..." readonly value="<?= $user['judulTugasAkhir'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Ujian</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal</label>
                        <div class="col-sm-2">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nilai</label>
                        <div class="col-sm-2">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bobot</label>
                        <div class="col-sm-2">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bukti</label>
                        <div class="col-sm-9">

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>