<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah User</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url('admin/adduser') ?>" method="post">
                        <div class="form-group row">
                            <label for="usernameadd" class="col-sm-4 col-form-label">Nomor Induk</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="usernameadd" name="usernameadd" placeholder="Nomor Induk">
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
                            <label for="passwordadd" class="col-sm-4 col-form-label">Masukkan Ulang Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="namaadd" id="namaadd" placeholder="Nama">
                                <?= form_error('namaadd', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="privileges" class="col-sm-4 col-form-label">Privileges</label>
                            <div class="col-sm-8">
                                <select class="form-control privileges" name="privileges" id="privileges">
                                    <?php foreach ($privileges as $p) : ?>
                                        <option><?= $p['jenisUser'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="a">

                        </div>
                        <div class="b">
                            
                        </div>
                        <div class="c">

                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status" id="status">
                                    <option>Aktif</option>
                                    <option>Tidak Aktif</option>
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
                                    <i class="fas fa-fw fa-plus"></i>Tambah User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->