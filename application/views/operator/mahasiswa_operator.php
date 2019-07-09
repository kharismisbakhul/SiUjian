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
                <h6 class=" m-0 font-weight-bold clr-white">Tentang Daftar Mahasiswa</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
              </div>
            </a>
            <div class="collapse show" id="collapseCardExample">
              <div class="card-body pb-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quibusdam excepturi non ipsam
                deserunt hic placeat odio voluptas vitae odit enim a, veritatis at totam eaque consequuntur quae sit
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
                  <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Mahasiswa</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
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
                        <?php foreach ($mahasiswa as $m) : ?>
                          <tr>
                            <td><?= $i; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['jenjang']; ?></td>
                            <td><?= $m['nama_prodi']; ?></td>
                            <td></td>
                            <td class="text-success font-weight-bold"></td>
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