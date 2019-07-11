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
                    <div class="col-lg-8">
                        <?= $this->session->flashdata('message');  ?>
                    </div>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <div class="d-none d-lg-block col-md-12 mb-4">
                        <div class="shadow mb-1">
                            <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <h6 class=" m-0 font-weight-bold clr-white">Tentang Manajemen User</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
                                </div>
                            </a>
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body pb-4">
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quibusdam excepturi non ipsam deserunt hic placeat odio voluptas vitae odit enim a, veritatis at totam eaque consequuntur quae sit possimus!
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
                                            <div class="col-lg-12 text-right mb-2">
                                                <button type="button" class="btn btn-success">
                                                    <a href="<?= base_url('admin/adduserview'); ?>" style="text-decoration: none; color: white;"><i class="fas fa-fw fa-plus"></i> Tambah User</a></button>
                                            </div>
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead style="text-align: center">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Privileges</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
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
                                                                echo "<td class='text-success'>Aktif</td>";
                                                            } else {
                                                                echo "<td class='text-danger'>Tidak Aktif</td>";
                                                            }
                                                            ?>
                                                            <td class="text-center">
                                                                <button type="button" class="badge badge-pill badge-danger userdelete">
                                                                    <a href="<?= base_url('admin/deleteuser/') . $lu['id']; ?>" style="text-decoration: none; color: white;">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-fw fa-trash-alt"></i>
                                                                        </span>
                                                                        <span class="text">Delete</span>
                                                                    </a>
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