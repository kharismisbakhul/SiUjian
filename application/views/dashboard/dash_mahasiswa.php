<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

  <div class="row">
    <div class="col-lg-12">
      <?= $this->session->flashdata('message');  ?>
    </div>
  </div>

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



    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 dftr">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ujian Selanjutnya</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ujian_selanjutnya['nama_ujian'] ?></div>
            </div>
            <div class="col-auto">
              <i class="fas  fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 dftr">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tanggal Ujian Selanjutnya</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ujian_selanjutnya['tgl_ujian'] ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4 dftr">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Dosen Penguji</div>
              <?php foreach ($ujian_selanjutnya['dosen_penguji'] as $dp) : ?>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dp['nama_dosen'] ?></div>
              <?php endforeach; ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Area Chart -->
    <div class="col-lg-6 box">
      <div class="card shadow border-bottom-warning">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Ujian yang diselesaikan</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body bClip">
          <i class="fas fa-clipboard-list text-gray-300 rotate-15 clip"></i>
          <div class="col-lg-9">
            <table class="table table-borderless text-left tClip table-hover">
              <thead>
                <tr style="background-color: #f8f8f8; color: #101010">
                  <th scope="col">#</th>
                  <th scope="col">Jenis Ujian</th>
                  <th scope="col">Status Ujian</th>

                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($ujian as $u) :  ?>
                  <tr>
                    <th scope="row"><?= $i++;  ?></th>
                    <td><?= $u['nama_ujian']  ?></td>
                    <!-- status Ujian -->
                    <?php if ($u['statusUjian'] == 1) { ?>
                      <td ><span class="badge badge-pill badge-success">Lulus</span></td>
                    <?php } elseif ($u['statusUjian'] == 2) { ?>
                      <td ><span class="badge badge-pill badge-primary">Proses</span></td>
                    <?php } else { ?>
                      <td ><span class="badge badge-pill badge-danger">Tidak Lulus</span></td>
                    <?php } ?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>




  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->