<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                <div class="tanggal">
                    <div class="text-s mb-0 font-weight-bold text-gray-400">
                        <span><i class="fas fa-calendar-day text-gray-400"></i></span> <?= date('d M Y'); ?>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <div class="d-none d-lg-block col-md-12 mb-4">
                    <div class="shadow mb-1">
                        <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class=" m-0 font-weight-bold clr-white">Tentang Laporan Dosen</h6>
                                <i><i class="fas fa-chevron-down clr-white"></i></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body pb-4">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quibusdam
                                excepturi non ipsam
                                deserunt hic placeat odio voluptas vitae odit enim a, veritatis at totam eaque
                                consequuntur quae sit
                                possimus!
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 
                <div class="col-lg-12 d-sm-flex align-items-center justify-content-between mb-3">
                    <h1 class="h5 mb-0 text-gray-800">List Dosen</h1>
                </div> -->

                <div class="col-lg-12">
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12 col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Nama Dosen</h6>
                                </div>
                                <div class="card-body">
                                    <form style="float: right;">
                                        <div class="form-row mb-3">
                                            <!-- Isi Form AutoComplete nya disini -->
                                            <!-- <div class="md-form">
                                                <input type="text" id="dosenSearch" name="dosenSearch" placeholder="Nama Dosen" value="">
                                            </div> -->
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Dosen</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1;
                                                foreach ($dosen as $d) : ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i; ?></td>
                                                        <td><?= $d['nama_dosen']; ?></td>
                                                        <td class="text-center">
                                                            <button class="btn btn-info btn-icon-split btn-sm modalDetailBimbingan" data-toggle="modal" data-target=".modalBimbingan" data-id="<?= $d['nip']; ?>">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-eye"></i>
                                                                </span>
                                                                <span class="text">See Detail</span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php $i++;
                                                endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    <!-- Detail Bimbingan Dosen modal -->
    <div class="modal fade bd-example-modal-lg modalBimbingan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title clr-white ml-4" id="exampleModalLabel">Mahasiswa Bimbingan - <span class="nama_dosen"></span></h5>
                    <button type="button" class="close clr-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- End of Detail Profile modal -->