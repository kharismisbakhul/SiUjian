<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-10 ">
            <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
        </div>
        <div class="col-xl-2">
            <?php if ($jumlah_ujian < 4) :  ?>
                <form action="<?= base_url('mahasiswa')  ?>/tambahUjian">
                    <button type="submit" class="btn btn-primary float-right mb-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-plus-circle"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </button>
                </form>
            <?php else : ?>
                <button type="submit" class="btn btn-secondary float-right mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-fw fa-plus-circle"></i>
                    </span>
                    <span class="text">Tambah</span>
                </button>
            <?php endif; ?>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message');  ?>

        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12">
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
                                <?php $i = 1;
                                foreach ($ujian as $u) :  ?>
                                    <tr>
                                        <th scope="row"><?= $i++;  ?></th>
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
                                        <td>
                                            <a href="<?= base_url('mahasiswa')  ?>/hapusUjian/<?= $u['id'];  ?>" class="badge badge-danger badge-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-fw fa-trash-alt"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a>

                                            <a href="<?= base_url('mahasiswa')  ?>/editUjian/<?= $u['id'];  ?>" class="badge badge-primary badge-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-fw fa-trash-alt"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>


                                            <button type="button" class="badge badge-info badge-icon-split" data-toggle="modal" data-target="#ModalDetailUjian">
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
<div class="modal fade bd-example-modal-xl" id="ModalDetailUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>