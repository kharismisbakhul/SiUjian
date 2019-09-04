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
      <div class="row box">

        <div class="d-none d-lg-block col-md-8 mb-4">
          <div class="shadow mb-1">
            <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class=" m-0 font-weight-bold clr-white">Tentang Daftar Mahasiswa</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
              </div>
            </a>
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body pb-4">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <span class="font-weight-bold">Daftar Mahasiswa</span>, adalah berisikan daftar mahasiswa S2 dan S3 aktif Fakultas Ekonomi dan Bisnis. Memiliki fungsi profil, ujian dan publikasi yang merujuk ke akun mahasiswa.
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

            <div class="col-lg-12 col-md-12 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-blue">
                  <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Mahasiswa</h6>
                </div>
                <div class="card-body">
                  <form action="<?= base_url('operator/mahasiswa/list') ?>" method="post">
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
                        <small> <?= $end_date ?></small>
                        <?php endif; ?>
                        <div class="input-group mb-3">
                          <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="end_date">
                          <div class="input-group-append">
                            <input type="submit" class="btn btn-primary" name="submit" value="cari" id="basic-addon2">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover text-left text-nowrap table-sm" id="dataTableMhsOperator" cellspacing="0">
                      <thead style="background-color: #2980b9;color:#ecf0f1 ">
                        <tr>
                          <th>#</th>
                          <th>Tanggal Mulai Tugas Akhir</th>
                          <th>Nama Mahasiswa</th>
                          <th>Nim</th>
                          <th>Jenjang</th>
                          <th>Program Studi</th>
                          <th>Status 1</th>
                          <th>Status 2</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($mahasiswa as $m) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <th><?= $m['tglMulaiTA'] ?></th>
                          <td><?= $m['nama']; ?></td>
                          <td><?= $m['nim']; ?></td>
                          <td><?= $m['jenjang']; ?></td>
                          <td><?= $m['nama_prodi']; ?></td>
                          <?php if ($m['statusKelulusan'] == 1) : ?>
                          <td>Lulus</td>
                          <td>-</td>
                          <?php elseif ($m['nama_ujian'] != null) : ?>
                          <td><?= $m['nama_ujian']  ?></td>
                          <?php if ($m['statusUjian'] == 1) : ?>
                          <td class="text-success font-weight-bold">Lulus</td>
                          <?php elseif ($m['statusUjian'] == 2) : ?>
                          <td class="text-primary font-weight-bold">Proses</td>
                          <?php else : ?>
                          <td class="text-danger font-weight-bold">Tidak Lulus</td>
                          <?php endif; ?>
                          <?php elseif ($m['nama_ujian'] == null) : ?>
                          <td>Baru Mulai</td>
                          <td>-</td>
                          <?php endif; ?>
                          <td class="text-center">
                            <a href="<?= base_url('operator/mahasiswa/profile/') . $m['nim']; ?>" class="btn btn-info btn-icon-split btn-sm">
                              <span class="icon text-white-50">
                                <i class="fas fa-eye"></i>
                              </span>
                              <span class="text">Profile</span>
                            </a>
                            <a href="<?= base_url('operator/mahasiswa/ujian/') . $m['nim']; ?>" class="btn btn-ujian btn-icon-split btn-sm">
                              <span class="icon text-white-50">
                                <i class="fas fa-paste"></i>
                              </span>
                              <span class="text clr-white">Ujian</span>
                            </a>
                            <a href="<?= base_url('operator/mahasiswa/publikasi/') . $m['nim']; ?>" class="btn btn-publikasi btn-icon-split btn-sm">
                              <span class="icon text-white-50">
                                <i class="fas fa-book"></i>
                              </span>
                              <span class="text clr-white">Publikasi</span>
                            </a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="4"></th>
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
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->