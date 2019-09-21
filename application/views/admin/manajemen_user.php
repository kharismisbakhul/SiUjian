    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-3">
                    <h1 class="h3 mb-0 text-gray-800">Manajemen User</h1>
                    <div class="tanggal">
                        <div class="text-s mb-0 font-weight-bold text-gray-400">
                            <span><i class="fas fa-calendar-day text-gray-400"></i></span> <?= date('d M Y') ?>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <?= $this->session->flashdata('message');  ?>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row box">
                    <div class="d-none d-lg-block col-md-8 mb-4">
                        <div class="shadow mb-1">
                            <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h6 class=" m-0 font-weight-bold clr-white">Tentang Manajemen User</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
                                </div>
                            </a>
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body pb-4">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        <span class="font-weight-bold">Manajemen User</span>, memberikan akses kepada admin untuk menambahkan, menghapus, dan mengedit pengguna yang menggunakan SiUjian serta fungsi-fungsi pendukung lainnya
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
                                        <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar User</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div class="col-lg-12 text-right mb-2 ">
                                                <button type="button" class="btn btn-primary btn-icon-split btn-sm mb-2" data-toggle="modal" data-target="#ModalTemplateData" data-id="">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-file-excel"></i>
                                                    </span>
                                                    <span class="text"> Download Template Excel</span>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-icon-split btn-sm mb-2" data-toggle="modal" data-target="#ModalImportData" data-id="">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-user-alt"></i>
                                                    </span>
                                                    <span class="text"> Import Data User</span>
                                                </button>
                                                <a href="<?= base_url('admin/adduserview'); ?>" class="btn btn-success btn-icon-split btn-sm mb-2">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-plus"></i>
                                                    </span>
                                                    <span class="text">Tambah User</span>
                                                </a>
                                            </div>
                                            <table class="table table-striped table-hover text-left text-nowrap table-sm" id="dataTable" width="100%" cellspacing="0">
                                                <thead style="background-color: #2980b9;color:#ecf0f1 ">
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Privileges</th>
                                                        <th>Nama</th>
                                                        <th class='text-center'>Status User</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($list_user as $lu) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i; ?></td>
                                                        <td><?= $lu['jenisUser']; ?></td>
                                                        <td><?= $lu['nama']; ?></td>
                                                        <?php
                                                            if ($lu['is_active'] == 1) {
                                                                echo "<td class='text-center'> <span class='badge badge-pill badge-success'>Aktif</span></td>";
                                                            } else {
                                                                echo "<td class='text-center' >span class='badge badge-pill badge-danger'>Tidak Aktif</span></td>";
                                                            }
                                                            ?>
                                                        <td>
                                                            <button type="button" class="badge badge-pill badge-danger text-white delete-user" value="<?= $lu['id']; ?>">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-fw fa-trash-alt"></i>
                                                                </span>
                                                                <span class="text">Hapus</span>
                                                            </button>
                                                            <button type="button" class="badge badge-pill badge-primary">
                                                                <a href="<?= base_url('admin/edituserview/') . $lu['id']; ?>" style="text-decoration: none; color: white;">
                                                                    <span class=" icon text-white-50">
                                                                        <i class="fas fa-fw fa-pencil-alt"></i>
                                                                    </span>
                                                                    <span class="text">Edit</span>
                                                                </a>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Table -->

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Alert Delete User -->
        <!-- End Alert Delete User -->


        <!-- Modal Import Data-->
        <div class="modal fade" id="ModalImportData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-blue text-white">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Import Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="formImport" enctype="multipart/form-data" action="<?= base_url('admin/importDataUser') ?>" method="post">
                        <div class="table-responsive">
                            <div class="modal-body ">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Pilih File</label>
                                            <div class="col-sm-8">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="import-data" name="import-data">
                                                    <label class="custom-file-label" for="customFile">Pilih file</label id="import-data" name="import-data">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenisUser" class="col-sm-4 col-form-label">Jenis User</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="jenisUser" name="jenisUser">
                                                    <option value="Mahasiswa">Mahasiswa</option>
                                                    <option value="Dosen">Dosen</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary tombolImport">Import Data User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Import Data -->

        <!-- Modal Template Data-->
        <div class="modal fade" id="ModalTemplateData" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-blue text-white">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Donwload Template Data User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <div class="modal-body">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="form-group row mb-0">
                                        <a href="<?= base_url('assets/template/Dosen.xls') ?>" class="btn btn-primary text-center col-sm-5">Dosen</a>
                                        <div class="col-sm-1"></div>
                                        <a href="<?= base_url('assets/template/Mahasiswa.xls') ?>" class="btn btn-primary text-center col-sm-6">Mahasiswa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Template Data -->