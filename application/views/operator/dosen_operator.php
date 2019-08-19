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

        <div class="d-none d-lg-block col-md-10 mb-4">
          <div class="shadow mb-1">
            <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class=" m-0 font-weight-bold clr-white">Tentang Daftar Dosen</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
              </div>
            </a>
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body pb-4 clr-black">
              <span class="font-weight-bold">Daftar Dosen</span>, adalah berisikan daftar Dosen aktif Fakultas Ekonomi dan Bisnis. Memiliki fungsi profil, ujian dan bimbingan yang merujuk ke akun dosen. 
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
                  <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Dosen</h6>
                </div>
                <div class="card-body">
                  <form action="<?= base_url('operator/dosen/list') ?>" method="post">
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
                          <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="end_date">
                          <div class="input-group-append">
                            <input type="submit" class="btn btn-primary" name="submit" value="cari" id="basic-addon2">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table class="table table-striped table-hover text-left text-nowrap table-sm" id="dataTableDosen" cellspacing="0">
                      <thead style="background-color: #2980b9;color:#ecf0f1 ">
                        <tr>
                          <th>#</th>
                          <th>Nama Dosen</th>
                          <th>NIP</th>
                          <th>Status Aktif</th>
                          <th>Jumlah Bimbingan</th>
                          <th>Action</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php $i = 1;
                          foreach ($dosen as $d) : ?>
                          <td><?= $i; ?></td>
                          <td><?= $d['nama_dosen'] ?></td>
                          <td><?= $d['nip'] ?></td>
                          <td>
                            <?php if ($d['statusAktif'] == 1) : ?>
                            Aktif
                            <?php else : ?>
                            Tidak Aktif
                            <?php endif; ?>
                          </td>
                          <td><?= $d['jumlah_bimbingan'] ?></td>
                          <td class="text-center">
                            <a href="<?= base_url('operator/dosen/profile/') . $d['nip']; ?>" class="btn btn-info btn-icon-split btn-sm">
                              <span class="icon text-white-50">
                                <i class="fas fa-eye"></i>
                              </span>
                              <span class="text">Profil</span>
                            </a>
                            <a href="<?= base_url('operator/dosen/ujian/') . $d['nip']; ?>" class="btn btn-ujian btn-icon-split btn-sm">
                              <span class="icon text-white-50">
                                <i class="fas fa-paste"></i>
                              </span>
                              <span class="text clr-white">Ujian</span>
                            </a>
                          </td>
                          <td>
                            <form action="<?= base_url('operator/dosen/bimbingan/') . $d['nip']; ?>" method="post">
                              <input type="hidden" name="tglMulai" value="<?= $star_date ?>">
                              <input type="hidden" name="tglAkhir" value="<?= $end_date ?>">
                              <button type="submit" class="btn btn-bimbingan btn-icon-split btn-sm" name="bimbingan">
                                <span class="icon text-white-50">
                                  <i class="fas fa-book"></i>
                                </span>
                                <span class="text clr-white">Bimbingan</span>
                              </button>
                            </form>
                          </td>
                        </tr>
                        <?php $i++;
                        endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Nama Dosen</th>
                          <th></th>
                          <th>Status Aktif</th>
                          <th>Jumlah Bimbingan</th>
                          <th></th>
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