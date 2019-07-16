<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="tanggal">
          <div class="text-s mb-0 font-weight-bold text-gray-400">
            <span><i class="fas fa-calendar-day text-gray-400"></i></span> <?= date('d M Y') ?>
          </div>

        </div>
      </div>

      <!-- Content Row -->
      <div class="row">
        <div class="d-none d-lg-block col-md-12 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col ml-auto">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">Selamat Datang di
                    Si-Ujian, <span id="user_name" class="text-gray-900 font-weight-bolder"><?= $user['nama']; ?></span></div>
                  <div class="text-s font-weight-normal text-gray-800 mt-2"></div>
                </div>
                <div class="col-auto mr-3">
                  <i class="far fa-smile-beam fa-3x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="row">
            <!-- <div class="col-xl-12 col-md-6 col-lg-4 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Jumlah Mahasiswa Ujian Hari Ini</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3">
                        <span><?= $jumlah_ujian_hari_ini; ?></span> Mahasiswa</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-graduation-cap fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Jadwal Ujian Selanjutnya -->
            <div class="col-xl-12 col-md-6 col-lg-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Ujian Hari Ini</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3"><?= $jumlah_ujian_hari_ini; ?> Ujian
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-alt fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Jadwal Ujian Selanjutnya -->
            <div class="col-xl-12 col-md-6 col-lg-4 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah Penguji Ujian Hari Ini</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3"><?= $jumlah_penguji_hari_ini; ?> Penguji
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-alt fa-4x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-8">
          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-12 col-md-6 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-blue-ocean">
                  <h6 class="m-0 font-weight-bold text-capitalize clr-white">update permintaan
                    validasi hari ini</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Mahasiswa</th>
                          <th>Program Studi</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($valid_ujian as $v) : ?>
                          <tr>
                            <td><?= $i++;  ?></td>
                            <td><?= $v['nama']  ?></td>
                            <td><?= $v['nama_prodi']  ?></td>
                            <td><?= $v['nama_ujian']  ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-xs pt-3 pb-3 see-more font-weight-normal"><a href="<?= base_url('operator/validasi') ?>">lihat selengkapnya</a></div>
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