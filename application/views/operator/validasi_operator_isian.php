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
  <link href="<?= base_url('/assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('/assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url('/assets/') ?>css/custom/operator.css" rel="stylesheet">

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
            <h1 class="h3 mb-0 text-gray-800">Validasi</h1>
            <div class="tanggal">
              <div class="text-s mb-0 font-weight-bold text-gray-400">
                <span><i class="fas fa-calendar-day text-gray-400"></i></span> 4 July 2019
              </div>

            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="d-none d-lg-block col-md-8 mb-4">
              <div class="shadow mb-1">
                <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none"
                  data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <div class="d-sm-flex align-items-center justify-content-between">
                    <h6 class=" m-0 font-weight-bold clr-white">Tentang Validasi</h6> <i><i
                        class="fas fa-chevron-down clr-white"></i></i>
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

            <div class="col-lg-12 col-sm-12 col-md-12">
              <!-- Content Row -->
              <div class="row">

                <div class="col-lg-10 col-md-12 col-sm-12 mb-4">
                  <!-- Approach -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-blue">
                      <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Permintaan Validasi - Isian Mahasiswa</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto;">
                                <form class="">
                                        <div class="form-group row">
                                            <label for="judulAkhir" class="col-sm-3 col-form-label">Judul Akhir</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="judulAkhir">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="paradigma" class="col-sm-3 col-form-label">Paradigma</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="paradigma">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tujuanPenelitian" class="col-sm-3 col-form-label">Tujuan Penelitian</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="tujuanPenelitian">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kataKunci" class="col-sm-3 col-form-label">Kate Kunci</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="kataKunci">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="metode-1" class="col-sm-3 col-form-label">Metode Penelitian 1</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="metode-1">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="metode-2" class="col-sm-3 col-form-label">Metode Penelitian 2</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="metode-2">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="temuan" class="col-sm-3 col-form-label">Temuan</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="temuan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kontribusi_implikasi" class="col-sm-3 col-form-label">Kontribusi & Implikasi</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" id="kontribusi_implikasi"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="komentarRevisi" class="col-sm-3 col-form-label">Komentar (Revisi)</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" id="komentarRevisi"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-2" style="float:right;" >
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                                                <button type="button" class="btn btn-success setuju">Setuju</button>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-2 mr-1" style="float:right;" >
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-1 haha">
                                                <button type="button" class="btn btn-danger tolak">Tolak</button>
                                            </div>
                                        </div>
                                        <div class="form-group row mt-2 mr-1" style="float:right;" >
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-1 haha">
                                                <button type="button" class="btn btn-dark kembali">Kembali</button>
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

  <!-- End of Detail Profile modal -->

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