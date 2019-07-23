<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit User</h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message');  ?>
        </div>
    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <?= form_open_multipart(base_url('admin/edituser/') . $id_temp); ?>

                    <div class="form-group row">
                        <label for="usernameadd" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="usernameadd" name="usernameadd" placeholder="Username" value="<?= $detailUser['username']; ?>">
                            <?= form_error('usernameadd', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="passwordadd" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="passwordadd" name="passwordadd" placeholder="Password">
                            <?= form_error('passwordadd', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password2" class="col-sm-4 col-form-label">Masukkan Ulang Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="namaadd" name="namaadd" placeholder="Nama" value="<?= $detailUser['nama']; ?>">
                            <?= form_error('namaadd', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Privileges -->
                    <div class="form-group row">
                        <label for="privileges" class="col-sm-4 col-form-label">Privileges</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="privileges" id="privileges">
                                <option><?= $privileges_user['jenisUser']; ?></option>
                                <?php foreach ($another_privileges as $ap) : ?>
                                    <option><?= $ap ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            Gambar Profil
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="status" id="status">
                                <?php
                                if ($detailUser['is_active'] == 1) {
                                    echo "<option>Aktif</option>
                                    <option>Tidak Aktif</option>";
                                } else {
                                    echo "<option>Tidak Aktif</option>
                                    <option>Aktif</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg action text-right mt-2 mb-0">
                            <button class="btn btn-danger">
                                <a href="<?= base_url('admin/manajemenUser'); ?>" style="text-decoration: none; color: white;">
                                    <i class="fas fa-fw fa-times"></i>Cancel
                                </a>
                            </button>
                            <button type="submit" class="btn btn-success tambah-user">
                                <i class="fas fa-fw fa-plus"></i>Edit User
                            </button>
                        </div>
                    </div>
                    </>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->