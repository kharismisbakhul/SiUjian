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
 						<span><i class="fas fa-calendar-day text-gray-400"></i></span>
 						<?php
							date_default_timezone_set("Asia/Jakarta");
							echo date('d M Y'); ?>
 					</div>
 				</div>
 			</div>
 			<div style="width: 400px">
 				<?= $this->session->flashdata('message');  ?>
 			</div>


 			<!-- Content Row -->
 			<div class="row">
 				<div class="d-none d-lg-block col-md-12 mb-4">
 					<div class="shadow mb-1">
 						<a href="#collapseCardExample" class="d-block card-header py-3 bg-blue-ocean text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
 							<div class="d-sm-flex align-items-center justify-content-between">
 								<h6 class=" m-0 font-weight-bold clr-white">Tentang Input Nilai</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
 							</div>
 						</a>
 						<div class="collapse show" id="collapseCardExample">
 							<div class="card-body pb-4">
 								Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quibusdam excepturi non ipsam deserunt hic placeat odio voluptas vitae odit enim a, veritatis at totam eaque consequuntur quae sit possimus!
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
 								<div class="card-header py-3 bg-blue-ocean">
 									<h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Ujian Mahasiswa</h6>
 								</div>
 								<div class="card-body">
 									<div class="table-responsive">
 										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 											<thead style="text-align: center">
 												<tr>
 													<th>#</th>
 													<th>Nama Mahasiswa</th>
 													<th>Jenis Ujian</th>
 													<th>Tanggal Ujian</th>
 													<th>Nilai Akhir</th>
 													<th>Action</th>
 												</tr>
 											</thead>
 											<tbody>
 												<?php $i = 1;
													foreach ($ujian as $u) : ?>
 													<tr>
 														<td><?= $i++; ?></td>
 														<td><?= $u['nama'] ?></td>
 														<td><?= $u['nama_ujian'] ?></td>
 														<td><?= $u['tgl_ujian'] ?></td>
 														<td><?= $u['nilai_akhir'] ?></td>
 														<td class="text-center">
 															<button data-id="<?= $u['id'] ?>" class="btn btn-warning btn-icon-split btn-sm input-nilai" data-toggle="modal" data-target=".modalDetailMahasiswa">
 																<span class="icon text-white-50">
 																	<i class="fas fa-pen-square"></i>
 																</span>
 																<span class="text">Nilai</span>
 															</button>
 															<input type="hidden" class="nip" id="nip" value="<?= $user['username'] ?>">
 														</td>
 													</tr>
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

 	<!-- Detail Ujian modal -->
 	<div class="modal fade bd-example-modal-xl modalDetailMahasiswa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-dialog-scrollable modal-xl">
 			<div class="modal-content">
 				<div class="modal-header bg-blue">
 					<h5 class="modal-title clr-white ml-4">Detail Mahasiswa - <span class="namaMahasiswa"></span>
 					</h5>
 					<button type="button" class="close clr-white" data-dismiss="modal" aria-label="Close">
 						<span aria-hidden="true">&times;</span>
 					</button>
 				</div>
 				<div class="modal-body">
 					<div class="container">
 						<div class="row">
 							<div class="col-lg-12 col-md-6 mb-4">
 								<!-- Approach -->
 								<div class="card my-3">
 									<div class="card-body">
 										<form class="" action="<?= base_url('dosen/inputNilai') ?>" method="post">
 											<fieldset disabled>
 												<div class="form-group row">
 													<label for="namaMahasiswa" class="col-sm-3 col-xs-4 col-form-label">Nama Mahasiswa</label>
 													<div class="col-lg-1 col-xs-4 d-none d-lg-block">
 														<p>:</p>
 													</div>
 													<div class="col-sm-8 col-xs-4">
 														<input type="text" class="form-control namaMahasiswa" placeholder="nama">
 													</div>
 												</div>
 												<div class="form-group row">
 													<label for="nomorInduk" class="col-sm-3" col-form-label">NIM</label>
 													<div class="col-sm-1 d-none d-lg-block">
 														<p>:</p>
 													</div>
 													<div class="col-sm-8">
 														<input type="text" class="form-control" id="nomorInduk" placeholder="nim">
 													</div>
 												</div>
 												<div class="form-group row">
 													<label for="judulTesis" class="col-sm-3" col-form-label ">Judul Tesis</label>
                          <div class=" col-sm-1 d-none d-lg-block">
 														<p>:</p>
 												</div>
 												<div class="col-sm-8 col-xs-7">
 													<textarea name="" id="judulTA" class="form-control" placeholder="judul tugas akhir" cols="60" rows="5" style="border-radius:.35rem; background-color: #eaecf4; border:1px solid #d1d3e2; padding: 0 .7rem;"></textarea>
 												</div>
 									</div>
 									<div class="form-group row">
 										<label for="jenisUjian" class="col-sm-3" col-form-label">Ujian</label>
 										<div class="col-sm-1 d-none d-lg-block">
 											<p>:</p>
 										</div>
 										<div class="col-sm-8">
 											<input type="text" class="form-control" id="jenisUjian" placeholder="Ujian Komisi">

 										</div>
 									</div>
 									<div class=" form-group row">
 										<label for="tanggalUjian" class="col-sm-3" col-form-label">Tanggal</label>
 										<div class="col-sm-1 d-none d-lg-block">
 											<p>:</p>
 										</div>
 										<div class="col-sm-8">
 											<input type="text" class="form-control" id="tanggalUjian" placeholder="20 Juli 2019">
 										</div>
 									</div>
 									</fieldset>
 									<div class="form-group row">
 										<label for="inputNilai" class="col-sm-3" col-form-label">Nilai</label>
 										<div class="col-sm-1 d-none d-lg-block">
 											<p>:</p>
 										</div>
 										<div class="col-sm-8">
 											<input type="text" class="form-control inputNilai" id="inputNilai" name="inputNilai" placeholder="">
 											<?= form_error('nilai', '<small class="text-danger pl-3">', '</small>'); ?>
 										</div>
 									</div>
 									<fieldset disabled="disabled">
 										<div class="form-group row">
 											<label for="bobotNilai" class="col-sm-3" col-form-label">Bobot</label>
 											<div class="col-sm-1 d-none d-lg-block">
 												<p>:</p>
 											</div>
 											<div class="col-sm-8">
 												<input type="text" class="form-control" id="bobotNilai" placeholder="4.0">
 											</div>
 										</div>
 									</fieldset>
 									<input type="hidden" id="idPenguji" name="idPenguji" value="0">
 									<input type="hidden" id="ujian" name="ujian" value="0">
 									<button type="submit" class="btn btn-primary" id="simpan" style="float: right;"> Simpan
 									</button>
 									<input type="hidden" id="operator-nip" name="nip" value="">
 									</form>
 								</div>
 							</div>
 							<div class="col-lg-12">
 								<div class="row">
 									<div class="col-lg-7">
 										<div class="table-responsive">
 											<h4 class="mt-2 mb-3 font-weight-bold text-capitalize" style="color:black">Daftar Dosen Penguji</h4>

 											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-left:-.10em;">
 												<thead>
 													<tr>
 														<th>#</th>
 														<th>Status Penguji</th>
 														<th>Nama Dosen</th>
 														<th>Nilai</th>
 													</tr>
 												</thead>
 												<tbody class="penguji">

 												</tbody>
 												<tfoot>
 													<tr>
 														<th>Nilai Akhir </th>
 														<th></th>
 														<th></th>
 														<th id="nilai_akhir"></th>
 													</tr>
 												</tfoot>
 											</table>
 										</div>
 									</div>
 									<div class="col-lg-5 ml-0">
 										<div class="table-responsive">
 											<h4 class="mt-2 mb-3 font-weight-bold text-capitalize" style="color:black">Daftar Dosen Pembimbing</h4>
 											<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="margin-left:-.10em;">
 												<thead>
 													<tr>
 														<th>#</th>
 														<th>Status Pembimbing</th>
 														<th>Nama Dosen</th>
 													</tr>
 												</thead>
 												<tbody class="pembimbing">
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
 		</div>
 	</div>
 </div>
 </div>
 </div>

 <!-- End of Detail Profile modal -->