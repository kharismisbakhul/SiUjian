    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <div class="d-none d-lg-block col-md-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col ml-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Selamat Datang di Si-Ujian, <span id="user_name" class="text-gray-900 font-weight-bolder"><?= $user['nama']; ?></span></div>
                      <div class="text-s font-weight-normal text-gray-800 mt-2"></div>
                    </div>
                    <div class="col-auto mr-3">
                      <i class="far fa-smile-beam fa-3x"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Ujian Selanjutnya -->
            <div class="col-xl-4 col-md-6 col-lg-4 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">jumlah mahasiswa bimbingan</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3">
                        <span>
                          <?php
                          if ($bimbingan_jumlah < 10) {
                            echo "0" . $bimbingan_jumlah;
                          } else {
                            echo $bimbingan_jumlah;
                          };
                          ?>
                        </span> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-graduation-cap fa-4x text-gray-300"></i>
                    </div>
                  </div>
                  <div class="text-xs pt-2 see-more not-dosen font-weight-normal"><a href="<?= base_url('dosen/bimbingan') ?>">lihat selengkapnya</a></div>
                </div>
              </div>
            </div>

            <!-- Jadwal Ujian Selanjutnya -->
            <div class="col-xl-4 col-md-6 col-lg-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jadwal Ujian Selanjutnya (Penguji)</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-alt fa-4x text-gray-300"></i>
                    </div>
                  </div>
                  <!-- <div class="text-xs pt-2 see-more not-dosen font-weight-normal">lihat selengkapnya</div> -->
                </div>
              </div>
            </div>

            <!-- Dosen Penguji Ujian -->
            <div class="col-xl-4 col-md-6 col-lg-4 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jadwal Ujian Hari ini (penguji)</div>
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chalkboard-teacher fa-4x text-gray-300"></i>
                    </div>
                  </div>
                  <!-- <div class="text-xs pt-2 see-more not-dosen font-weight-normal">lihat selengkapnya</div> -->
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-12 col-md-6 mb-4">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-blue-ocean">
                  <h6 class="m-0 font-weight-bold text-capitalize clr-white">update jadwal ujian mahasiswa hari ini</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Mahasiswa</th>
                          <th>Jenis Ujian</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($ujian_hari_ini as $uhi) : ?>
                        <tr>
                          <td><?= $i++; ?></td>
                          <td><?= $uhi['nama'] ?></td>
                          <td><?= $uhi['nama_ujian'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="text-xs pt-3 pb-3 see-more font-weight-normal"><a href="<?= base_url('dosen/bimbingan'); ?>">lihat selengkapnya</a></div>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->