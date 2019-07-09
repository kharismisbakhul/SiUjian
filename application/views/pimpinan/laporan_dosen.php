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

                <div class="d-none d-lg-block col-md-8 mb-4">
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

                <div class="col-lg-12">
                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-12 col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Laporan Dosen</h6>
                                </div>
                                <div class="card-body">
                                    <form style="float: right;">
                                        <div class="form-row mb-3">
                                            <!-- Isi Form AutoComplete nya disini -->
                                            <div class="md-form">
                                                <input type="text" id="dosenSearch" name="dosenSearch" placeholder="Nama Dosen" value="">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Mahasiswa</th>
                                                    <th>Jenjang</th>
                                                    <th>Program Studi</th>
                                                    <th>Posisi Dosen</th>
                                                    <th>Status 1</th>
                                                    <th>Status 2</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataTableBody">
                                                <tr>
                                                    <td>1</td>
                                                    <td>Reynald Daffa</td>
                                                    <td>S2</td>
                                                    <td>Akuntansi</td>
                                                    <td>Pembimbing 1</td>
                                                    <td>Seminar Hasil</td>
                                                    <td class="text-success font-weight-bold">Lulus</td>
                                                    <td class="text-center">
                                                        <button href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target=".modalDetailMahasiswa">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Info</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Misbakhul Kharis</td>
                                                    <td>S2</td>
                                                    <td>Manajemen</td>
                                                    <td>Pembimbing 1</td>
                                                    <td>Ujian Proposal</td>
                                                    <td class="text-success font-weight-bold">Lulus</td>
                                                    <td class="text-center">
                                                        <button href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target=".modalDetailMahasiswa">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Info</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Aditiya Yusril</td>
                                                    <td>S3</td>
                                                    <td>Ekonomi Pembangunan</td>
                                                    <td>Pembimbing 1</td>
                                                    <td>Ujian Tesis</td>
                                                    <td class="text-success font-weight-bold">Lulus</td>
                                                    <td class="text-center">
                                                        <button href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target=".modalDetailMahasiswa">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Info</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Tony Krauk</td>
                                                    <td>S3</td>
                                                    <td>Ekonomi Pembangunan</td>
                                                    <td>Pembimbing 2</td>
                                                    <td>Ujian Tesis</td>
                                                    <td class="text-success font-weight-bold">Lulus</td>
                                                    <td class="text-center">
                                                        <button href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target=".modalDetailMahasiswa">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Info</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Dominic Teroret</td>
                                                    <td>S3</td>
                                                    <td>Manajemen</td>
                                                    <td>Pembimbing 2</td>
                                                    <td>Ujian Tesis</td>
                                                    <td class="text-danger font-weight-bold">Belum Lulus</td>
                                                    <td class="text-center">
                                                        <button href="#" class="btn btn-info btn-icon-split btn-sm" data-toggle="modal" data-target=".modalDetailMahasiswa">
                                                            <span class="icon text-white-50">
                                                                <i class="fas fa-eye"></i>
                                                            </span>
                                                            <span class="text">Info</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-xs pt-3 pb-3 see-more font-weight-normal"></div>
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

    <!-- Detail profile modal -->
    <div class="modal fade bd-example-modal-lg modalDetailMahasiswa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title clr-white ml-4" id="exampleModalLabel">Mahasiswa Bimbingan - <span>Reynald
                            Daffa Pahlevi</span></h5>
                    <button type="button" class="close clr-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-capitalize">Detail Mahasiswa</h6>
                        </div>
                        <div class="card-body">
                            ngambil dari yusril
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Detail Profile modal -->