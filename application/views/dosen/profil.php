<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message');  ?>"></div>
            <div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error');  ?>"></div>
        </div>
    </div>

    <!-- Card Profil -->
    <div class="row box">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Profil Dosen</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <form>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">NIP</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['nip']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['nama_dosen']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['jenisKelamin']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status PNS</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['statusPNS']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Posisi</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['posisi']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Prodi Dosen</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login_prodi['nama_prodi']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status Aktif</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <?php if ($user_login['statusAktif'] == 1) : ?>
                                    <span class="badge badge-pill badge-success">Aktif</span>
                                <?php else : ?>
                                    <span class="badge badge-pill badge-secondary">Tidak Aktif</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jenjang</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['jenjang']; ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No Hp</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['noTlpnDosen'] ?></span>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                            <div class="col-sm-10">
                                <span>:</span>
                                <span><?= $user_login['AlamatDosen'] ?></span>
                            </div>
                        </div>
                        <div class="row float-right mr-3">
                            <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#ModalProfilEdit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pencil-alt"></i>
                                </span>
                                <span class="text">Edit</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Card Profil -->

</div>
<!-- End of Main Content -->
<div class="modal fade" id="ModalProfilEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dosen/profil/') . $user_login['nip'] ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">No.HP:</label>
                        <input type="text" class="form-control" id="notlpn" name="notlpn" value="<?= $user_login['noTlpnDosen'] ?>">
                        <?= form_error('notlpn', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?= $user_login['AlamatDosen'] ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <input type="hidden" id="nip" name="nip" value="<?= $user_login['nip']; ?>">
                </div>
            </form>
        </div>
    </div>
</div>