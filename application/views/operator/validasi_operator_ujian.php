<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

	<!-- Main Content -->
	<div id="content">

		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-3">
				<h1 class="title h3 text-gray-800"><?= $title;  ?></h1>
				<div class="tanggal">
					<div class="text-s mb-0 font-weight-bold text-gray-400">
						<span><i class="fas fa-calendar-day text-gray-400"></i></span> 4 July 2019
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<?= $this->session->flashdata('message');  ?>
				</div>
			</div>

			<!-- Content Row -->
			<div class="row">

				<div class="d-none d-lg-block col-md-10 mb-4">
					<div class="shadow mb-1">
						<a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
							<div class="d-sm-flex align-items-center justify-content-between">
								<h6 class=" m-0 font-weight-bold clr-white">Tentang Validasi</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
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

				<div class="col-lg-12 col-sm-12 col-md-12">
					<!-- Content Row -->
					<div class="row">

						<div class="col-lg-10 col-md-12 col-sm-12 mb-4">
							<!-- Approach -->
							<div class="card shadow mb-4">
								<div class="card-header py-3 bg-blue">
									<h6 class="m-0 font-weight-bold text-capitalize clr-white">Permintaan
										Validasi - Ujian</h6>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto;">
											<form action="<?= base_url('operator/validasiUjian/') . $ujian['id']  ?>" method="post">
												<div class="form-group row">
													<label for="namaMahasiswa" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="namaMahasiswa" value="<?= $ujian['nama']  ?>" readonly>
													</div>
												</div>
												<div class="form-group row">
													<label for="nomorInduk" class="col-sm-3 col-form-label">NIM</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="nomorInduk" value="<?= $ujian['nim']  ?>" readonly>
													</div>
												</div>
												<div class="form-group row">
													<label for="judulTesis" class="col-sm-3 col-form-label">Judul Tesis</label>
													<div class="col-sm-9">
														<textarea type="text" class="form-control" id="judulTesis" readonly><?= $ujian['judulAkhir']  ?></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="jenisUjian" class="col-sm-3 col-form-label">Ujian</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" id="jenisUjian" value="<?= $ujian['nama_ujian']  ?>" readonly>
													</div>
												</div>
												<div class="form-group row">
													<label for="tanggalUjian" class="col-sm-3 col-form-label">Tanggal Ujian</label>
													<div class="col-sm-9">
														<input type="date" class="form-control" id="tanggalUjian" value="<?= $ujian['tgl_ujian']  ?>" name="tgl_ujian">
													</div>
												</div>
												<div class="form-group row">
													<label for="buktiUjian" class="col-sm-3 col-form-label">Bukti Ujian</label>
													<div class="col-sm-9 pt-1">
														<a href="<?= base_url('assets/ujian/') . $ujian['bukti']  ?>" class="text-decoration-none" id="buktiUjian">
															<p><?= $ujian['bukti']  ?></p>
														</a>
													</div>
												</div>
												<div class="form-group row">
													<label for="buktiUjian" class="col-sm-3 col-form-label">Validate</label>
													<div class="col-sm-9 pt-1">
														<?php if ($ujian['valid'] == 1) : ?>
														<p class="text-success font-weight-bold">VALID</p>
														<?php elseif ($ujian['valid'] == 2) : ?>
														<p class="text-primary font-weight-bold">PROSES</p>
														<?php else : ?>
														<p class="text-danger font-weight-bold">TIDAK VALID</p>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="buktiUjian" class="col-sm-3 col-form-label">Status Ujian</label>
													<div class="col-sm-9 pt-1">
														<?php if ($ujian['statusUjian'] == 1) : ?>
														<span class="badge badge-pill badge-success">Lulus</span>
														<?php elseif ($ujian['statusUjian'] == 2) : ?>
														<span class="badge badge-pill badge-primary">Proses</span>
														<?php else : ?>
														<span class="badge badge-pill badge-danger">Tidak Lulus</span>
														<?php endif; ?>
													</div>
												</div>
												<div class="form-group row">
													<label for="komentarRevisi" class="col-sm-3 col-form-label">Komentar
														(Revisi)</label>
													<div class="col-sm-9">
														<textarea name="komentar" type="text" class="form-control" id="komentarRevisi"><?= $ujian['komentar']  ?></textarea>
													</div>
												</div>
												<div class="form-group row mt-2" style="float:right;">
													<div class="col-lg-6 col-md-6 col-sm-6 mb-1">
														<button type="submit" name="valid" class="btn btn-success setuju" value="1">Setuju</button>
													</div>
												</div>
												<div class="form-group row mt-2 mr-1" style="float:right;">
													<div class="col-lg-6 col-md-6 col-sm-6 mb-1 haha">
														<button type="submit" name="valid" class="btn btn-danger tolak" value="3">Tolak</button>
													</div>
												</div>
												<div class="form-group row mt-2 mr-1" style="float:right;">
													<div class="col-lg-6 col-md-6 col-sm-6 mb-1 haha">
														<a href="<?= base_url('operator/ujian')  ?>" class="btn btn-dark kembali">Kembali</a>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 mb-4">
							<!-- Approach -->
							<div class="row">
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="card shadow mb-4">
										<div class="card-header py-3 bg-blue">
											<h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Penguji</h6>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto;">
													<button type="button" class="tambahPenguji btn btn-success block mb-4 pb-2 btn-sm " data-toggle="modal" data-target="#tambahPenguji" style="float:right;" data-id="<?= $this->uri->segment(3); ?>">Tambah Penguji <i class="fas fa-plus-circle"></i></button>
													<button class="btn btn-warning btn-icon-split btn-sm input-nilai mr-2" style="float:right;" data-toggle="modal" data-target="#ModalInputNilai">
														<span class="icon text-white-50">
															<i class="fas fa-pen-square"></i>
														</span>
														<span class="text">Nilai</span>
													</button>

													<table class="table table-bordered text-center" width="100%" cellspacing="0">
														<thead>
															<tr>
																<th>#</th>
																<th>Nama Dosen</th>
																<th>Status</th>
																<th>Nilai</th>
																<th>Action</th>
															</tr>
														</thead>
														<form class="table-responsive" action="<?= base_url('operator/hapusPenguji') ?>" method="post">
															<tbody>
																<?php $i = 1;
																foreach ($penguji as $pngj) : ?>
																<tr>
																	<td><?= $i++  ?></td>
																	<td><?= $pngj['nama_dosen']  ?></td>
																	<td><?= $pngj['status_dosen']  ?></td>
																	<td><?= $pngj['nilai'] ?></td>
																	<td><button type="submit" class="btn btn-danger btn-sm text-white" name="id_penguji" placeholder="hapus" value="<?= $pngj['id']; ?>">hapus</button>
																		<input type="hidden" value="<?= $this->uri->segment(3); ?>" name="id_ujian" id="id_ujian">


																	</td>
																</tr>
																<?php endforeach; ?>
															</tbody>
														</form>
														<tfoot>
															<tr>
																<td colspan="3">Nilai Akhir</td>
																<td colspan="1"><?= $ujian['nilai_akhir']  ?></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="5">
																	<form action="<?= base_url('operator/validasiUjian/') . $ujian['id']  ?>" method="post">
																		<button type="submit" class="btn btn-success btn-icon-split btn-sm input-nilai mr-2" style="float:center;" name="statusUjian" value=1>
																			<span class="icon text-white-50">
																				<i class="fas fa-fw fa-laugh-beam"></i>
																			</span>
																			<span class="text">Lulus</span>
																		</button>
																		<button type="submit" class="btn btn-danger btn-icon-split btn-sm input-nilai mr-2" style="float:center;" name="statusUjian" value=3>
																			<span class="icon text-white-50">
																				<i class="fas fa-fw fa-sad-cry"></i>
																			</span>
																			<span class="text">Tidak Lulus</span>
																		</button>
																	</form>
																</td>
															</tr>

														</tfoot>
													</table>

												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-12 col-sm-12">
									<div class="card shadow mb-4">
										<div class="card-header py-3 bg-blue">
											<h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Pembimbing</h6>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12" style="margin: 0 auto;">
													<div class="table-responsive">
														<table class="table table-bordered text-center" width="100%" cellspacing="0">
															<thead>
																<tr>
																	<th>#</th>
																	<th>Nama Dosen</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1;
																foreach ($pembimbing as $pmb) : ?>
																<tr>
																	<td><?= $i++  ?></td>
																	<td><?= $pmb['nama_dosen']; ?></td>
																	<td><?= $pmb['status_dosen']  ?></td>
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

<div class="modal fade" id="tambahPenguji" tabindex="-1" role="dialog" aria-labelledby="tambahPenguji" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-blue">
				<h5 class="modal-title clr-white" id="exampleModalLabel">Tambah Penguji untuk Ujian</h5>
				<button type="button" class="close clr-white cls" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('operator/tambahPenguji/') . $this->uri->segment(3);  ?>" class="table-responsive" method="post">
				<div class="container">
					<div class="modal-body" style="height: 35rem;">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-xs-12 ml-2 mx-auto">
								<table class="table table-bordered text-center" id="dataTable" cellspacing="0">
									<thead>
										<tr>
											<th scope="row">#</th>
											<th scope="row">Nama Dosen</th>
											<th scope="row">Nip</th>
											<th style="width: 50%">Action</th>
										</tr>
									</thead>
									<tbody id="pop-dosen">
										<?php foreach ($dosen as $dsn) :  ?>
										<tr>
											<td></td>
											<td><?= $dsn['nama_dosen'];  ?></td>
											<td><?= $dsn['nip'] ?></td>
											<td>
												<input type="radio" name="nip" value="<?= $dsn['nip']  ?>">
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

						</div>

					</div>
				</div>
				<div class="container">
					<div class="modal-footer">
						<div class="input-group" style="width: 50%;">
							<div class="input-group-prepend">
								<label class="input-group-text" for="inputGroupSelect01">Status Penguji</label>
							</div>
							<select class="custom-select" id="inputGroupSelect01" name="statuspenguji">
								<?php foreach ($posisiPenguji as $pngj) : ?>
								<option value="<?= $pngj['id'] ?>"><?= $pngj['status_dosen'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<button type="button" class="btn btn-secondary cls" data-dismiss="modal">Tutup</button>
						<button ype="submit" class="btn btn-success cls"> Tambah
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End of Detail Profile modal -->


<!-- Input Nilai -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ModalInputNilai">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nilai Ujian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="table-responsive" action="<?= base_url('operator/ubahNilai') ?>" method="post">
				<div class="modal-body">
					<table class="table table-bordered text-center" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Dosen</th>
								<th>Status</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1;
							foreach ($penguji as $pngj) : ?>
							<tr>
								<td><?= $i++  ?></td>
								<td><?= $pngj['nama_dosen']  ?></td>
								<td><?= $pngj['status_dosen']  ?></td>
								<td><input type="text" class="form-control" placeholder="Nilai..." value="<?= $pngj['nilai'] ?>" name="<?= $pngj['id']; ?>">
									<input type="hidden" value="<?= $pngj['Ujianid'] ?>" name="idujian">
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Akhir Input Nilai -->