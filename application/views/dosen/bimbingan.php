<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-3">
                <h1 class="h3 mb-0 text-gray-800">
                    <?= $title; ?>
                </h1>
                <div class="tanggal">
                    <div class="text-s mb-0 font-weight-bold text-gray-400">
                        <span><i class="fas fa-calendar-day text-gray-400"></i></span> <?= date('d M Y') ?>
                    </div>

                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="d-none d-lg-block col-md-12 mb-4">
                    <div class="shadow mb-1">
                        <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class=" m-0 font-weight-bold clr-white">Tentang Bimbingan</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
                            </div>
                        </a>
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body pb-4">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quibusdam excepturi non ipsam deserunt hic placeat odio voluptas vitae odit enim a, veritatis at totam eaque consequuntur quae sit possimus!
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #273C75; color: white; text-align: center">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Hai
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

                <div class="col-lg-12">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-blue">
                                    <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Mahasiswa Bimbingan</h6>
                                </div>
                                <div class="card-body">
                                    <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                                        <form action="<?= base_url('operator/dosen/bimbingan/') . $this->uri->segment(4) ?>" method="post">
                                        <?php else : ?>
                                            <form action="<?= base_url('dosen/bimbingan') ?>" method="post">
                                            <?php endif; ?>
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <small>Mulai Periode</small>
                                                    <?php if ($star_date != null) : ?>
                                                        <small> <?= $star_date ?></small>
                                                    <?php endif; ?>
                                                    <input type="date" class="form-control" name="star_date">
                                                </div>
                                                <div class="col-md-3">
                                                    <small>Akhir Periode</small>
                                                    <?php if ($end_date != null) : ?>
                                                        <small><?= $end_date ?></small>
                                                    <?php endif; ?>
                                                    <div class="input-group mb-3">
                                                        <input type="hidden" name="cek" value="1">
                                                        <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="end_date">
                                                        <div class="input-group-append">
                                                            <input type="submit" class="btn btn-primary" name="submit" value="cari" id="basic-addon2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTableBimbingan" width="100%" cellspacing="0">
                                                <thead style="text-align: center">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tanggal Menjadi Pembimbing</th>
                                                        <th>Nama Mahasiswa</th>
                                                        <th>Jenjang</th>
                                                        <th>Program Studi</th>
                                                        <th>Status 1</th>
                                                        <th>Status 2</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($bimbingan as $b) : ?>
                                                        <tr>
                                                            <td><?= $i; ?></td>
                                                            <td><?= $b['tgl_tambah_pembimbing'] ?></td>
                                                            <td><?= $b['nama'] ?></td>
                                                            <td><?= $b['jenjang'] ?></td>
                                                            <td><?= $b['nama_prodi']  ?></td>
                                                            <?php if ($b['statusKelulusan'] == 1) : ?>
                                                                <td>Lulus</td>
                                                                <td>-</td>
                                                            <?php elseif ($b['nama_ujian'] == null) : ?>
                                                                <td>Baru Mulai</td>
                                                                <td></td>
                                                            <?php else : ?>
                                                                <td><?= $b['nama_ujian']  ?></td>
                                                                <?php if ($b['statusUjian'] == 1) : ?>
                                                                    <td>Lulus</td>
                                                                <?php elseif ($b['statusUjian'] == 2) :  ?>
                                                                    <td>Proses</td>
                                                                <?php else :  ?>
                                                                    <td>Tidak Lulus</td>
                                                                <?php endif;  ?>
                                                            <?php endif; ?>

                                                            <td class="text-center">
                                                                <a href="#" class="btn btn-info btn-icon-split btn-sm info-bimbingan" data-toggle="modal" data-target=".modalDetailMahasiswa" data-nim="<?= $b['mahasiswanim'] ?>">
                                                                    <span class="icon text-white-50">
                                                                        <i class="fas fa-eye"></i>
                                                                    </span>
                                                                    <span class="text">Info</span>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>Jenjang</th>
                                                        <th>Program Studi</th>
                                                        <th>Status 1</th>
                                                        <th>Status 2</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
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

    <!-- Detail profile modal -->
    <div class="modal fade bd-example-modal-lg modalDetailMahasiswa" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-blue">
                    <h5 class="modal-title clr-white ml-4" id="exampleModalLabel">Mahasiswa Bimbingan - <span id="nama-bimbingan"></span></h5>
                    <button type="button" class="close clr-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3 ml-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-ujian" role="tab" aria-controls="pills-home" aria-selected="true">Ujian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-publikasi" role="tab" aria-controls="pills-publikasi" aria-selected="false">Publikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-isian-mhs" role="tab" aria-controls="pills-isian-mhs" aria-selected="false">Isian Mahasiswa</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-ujian" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 mb-4">
                                        <!-- Approach -->
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Jenis Ujian</th>
                                                                <th>Tanggal</th>
                                                                <th>Status</th>
                                                                <th>Bobot</th>
                                                                <th>Nilai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="ujian">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal - Profile -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 mb-4">
                                        <!-- Approach -->
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <form>
                                                        <div class="form-group row mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="nama"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nim</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="nim"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Jurusan</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="nama_jurusan"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Prodi</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="nama_prodi"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Angkatan</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="angkatan"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Konsentrasi</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="konsentrasi"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="alamat"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">No.Telepon</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="noTelp"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Asal Studi</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="asalStudi"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row  mb-1">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Mulai Tugas Akhir</label>
                                                            <div class="col-sm-9">
                                                                <span>:</span>
                                                                <span id="tglMulaiTA"></span>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <h5 class="col-sm-6 mt-2 ">Daftar Dosen Pendamping</h5>
                                                        </div>

                                                        <div class=" row ml-1 mr-1">

                                                            <table class="table table-bordered table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Status</th>
                                                                        <th scope="col">Nama Dosen</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="pembimbing">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal - Publikasi -->
                        <div class="tab-pane fade" id="pills-publikasi" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 mb-4">
                                        <!-- Approach -->
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Judul Artikel</th>
                                                                <th>Status Jurnal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="publikasi">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-isian-mhs" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6 mb-4">
                                        <!-- Approach -->
                                        <div class="card shadow mb-4">
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Judul Tugas Akhir</label>
                                                        <div class="col-sm-1">
                                                            <p>:</p>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Paradigma</label>
                                                        <div class="col-sm-1">
                                                            <p>:</p>
                                                        </div>
                                                        <div class="col-sm-8">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kata Kunci</label>
                                                        <div class="col-sm-1">
                                                            <p>:</p>
                                                        </div>
                                                        <div class="col-sm-8">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tujuan Penlitian</label>
                                                        <div class="col-sm-1">
                                                            <p>:</p>
                                                        </div>
                                                        <div class="col-sm-8">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Metode Penelitian 1</label>
                                                        <div class="col-sm-1">
                                                            <p>:</p>
                                                        </div>
                                                        <div class="col-sm-8">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Metode Penelitian 2</label>
                                                        <div class="col-sm-1">
                                                            <p>:</p>
                                                        </div>
                                                        <div class="col-sm-8">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Temuan</label>
                                                        <div class="col-sm-1">
                                                            <p>:</p>
                                                        </div>
                                                        <div class="col-sm-8">

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Detail Profile modal -->