<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SiUjian - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/') ?>css/dashboard.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mt-5 mb-3">
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="d-none d-lg-block col-md-12 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col ml-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Selamat Datang di Si-Ujian, <span id="user_name" class="text-gray-900 font-weight-bolder">Bayu Priambada</span></div>
                      <div class="text-s font-weight-normal text-gray-800 mt-2">Silahkan untuk mengecek Jadwal Penguji selanjutnya dan memberi Nilai Ujian :)</div>
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
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3"><span>20</span> Orang</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-graduation-cap fa-4x text-gray-300"></i>
                    </div>
                  </div>
                  <div class="text-xs pt-2 see-more not-dosen font-weight-normal">lihat selengkapnya</div>
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
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3">22 Juli 2019</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar-alt fa-4x text-gray-300"></i>
                    </div>
                  </div>
                  <div class="text-xs pt-2 see-more not-dosen font-weight-normal">lihat selengkapnya</div>
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
                      <div class="h4 mb-0 font-weight-bold text-gray-800 mt-3">5 Ujian</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chalkboard-teacher fa-4x text-gray-300"></i>
                    </div>
                  </div>
                  <div class="text-xs pt-2 see-more not-dosen font-weight-normal">lihat selengkapnya</div>
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
                        <th>Tanggal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>Reynald Daffa</td>
                        <td>Ujian Komisi</td>
                        <td>20 Juli 2019</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Misbakhul Kharis</td>
                        <td>Seminar Proposal</td>
                        <td>20 Juli 2019</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Aditiya Yusril</td>
                        <td>Ujian Tesis</td>
                        <td>20 Juli 2019</td>
                    </tr>
                  </tbody>
                </table>
              </div>
                    <div class="text-xs pt-3 pb-3 see-more font-weight-normal">lihat selengkapnya</div>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; AKD 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

</body>

</html>
