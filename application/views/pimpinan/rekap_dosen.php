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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('/assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('/assets/') ?>css/custom/dosen.css" rel="stylesheet">

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
						<h1 class="h3 mb-0 text-gray-800">Rekapitulasi Laporan Dosen</h1>
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
								<a href="#collapseCardExample"
									class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse"
									role="button" aria-expanded="true" aria-controls="collapseCardExample">
									<div class="d-sm-flex align-items-center justify-content-between">
										<h6 class=" m-0 font-weight-bold clr-white">Tentang Rekapitulasi Laporan Dosen</h6>
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
											<h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Rekapitulasi Laporan Dosen</h6>
										</div>
										<div class="card-body">
                                        <form style="float: right;">
                                            <div class="form-row mb-5">
                                                <!-- Isi Form AutoComplete nya disini -->
                                            </div>
                                        </form>
											<div class="table-responsive">
												<table class="table table-bordered text-center" id="dataTable"
													width="100%" cellspacing="0">
													<thead>
														<tr>
															<th>#</th>
															<th>Nama Dosen</th>
															<th>Pembimbing</th>
                                                            <th>Penguji</th>
															<th>Status 1</th>
															<th>Bimbingan Lulus</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>Bayu Priambada</td>
															<td>10</td>
                                                            <td>8</td>
                                                            <td>10</td>
															<td>5</td>
															<td class="text-center">
																<button href="#"
																	class="btn btn-info btn-icon-split btn-sm"
																	data-toggle="modal"
																	data-target=".modalDetailMahasiswa">
																	<span class="icon text-white-50">
																		<i class="fas fa-eye"></i>
																	</span>
																	<span class="text">Info</span>
																</button>
															</td>
														</tr>
														<tr>
                                                            <td>2</td>
															<td>Denny Sagita</td>
															<td>10</td>
                                                            <td>8</td>
                                                            <td>10</td>
															<td>5</td>
															<td class="text-center">
																<button href="#"
																	class="btn btn-info btn-icon-split btn-sm"
																	data-toggle="modal"
																	data-target=".modalDetailMahasiswa">
																	<span class="icon text-white-50">
																		<i class="fas fa-eye"></i>
																	</span>
																	<span class="text">Info</span>
																</button>
															</td>
														</tr>
														<tr>
                                                            <td>3</td>
															<td>Tri Astoto Kurniawan</td>
															<td>10</td>
                                                            <td>8</td>
                                                            <td>10</td>
															<td>5</td>
															<td class="text-center">
																<button href="#"
																	class="btn btn-info btn-icon-split btn-sm"
																	data-toggle="modal"
																	data-target=".modalDetailMahasiswa">
																	<span class="icon text-white-50">
																		<i class="fas fa-eye"></i>
																	</span>
																	<span class="text">Info</span>
																</button>
															</td>
														</tr>
														<tr>
                                                            <td>4</td>
															<td>Nurudin Santoso</td>
															<td>10</td>
                                                            <td>8</td>
                                                            <td>10</td>
															<td>5</td>
															<td class="text-center">
																<button href="#"
																	class="btn btn-info btn-icon-split btn-sm"
																	data-toggle="modal"
																	data-target=".modalDetailMahasiswa">
																	<span class="icon text-white-50">
																		<i class="fas fa-eye"></i>
																	</span>
																	<span class="text">Info</span>
																</button>
															</td>
														</tr>
														<tr>
                                                            <td>5</td>
															<td>Fajar Pradana</td>
															<td>10</td>
                                                            <td>8</td>
                                                            <td>10</td>
															<td>5</td>
															<td class="text-center">
																<button href="#"
																	class="btn btn-info btn-icon-split btn-sm"
																	data-toggle="modal"
																	data-target=".modalDetailMahasiswa">
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

	<!-- Detail profile modal -->
	<div class="modal fade bd-example-modal-lg modalDetailMahasiswa" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-blue">
					<h5 class="modal-title clr-white ml-4" id="exampleModalLabel">Detail Rekapitulasi Dosen - <span>Bayu Priambada</span></h5>
					<button type="button" class="close clr-white" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Pembimbing</h6>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Pembimbing 1</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>5</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Pembimbing 2</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>5</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Jumlah</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold">10</h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Penguji</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji 1</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>4</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji 2</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>4</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="">Penguji 3</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>0</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-5">
                                                <h6 class="font-weight-bold">Jumlah</h6>
                                            </div>
                                            <div class="col-3">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold">8</h6>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-capitalize">Status Mahasiswa Bimbingan</h6>
                                </div>
                                <div class="card-body">
                                    <form action="">
                                        
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="">Tahap Komisi</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>2</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="">Proposal Ujian</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>2</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="">Seminar Hasil</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>2</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="">Ujian Tesis</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>2</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="">Wisuda</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>2</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="">Belum Lulus</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>2</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="">Lulus</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6>2</h6>
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-row">
                                            <div class="col-7">
                                                <h6 class="font-weight-bold">Jumlah</h6>
                                            </div>
                                            <div class="col-1">
                                                <h6>:</h6>
                                            </div>
                                            <div class="col-4">
                                                <h6 class="font-weight-bold">10</h6>
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

	<!-- End of Detail Profile modal -->

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>

    <script src="<?= base_url('assets/') ?>js/script.js"></script>
    

</body>

</html>