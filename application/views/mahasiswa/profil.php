<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

   <div class="row">
      <div class="col-lg-6">
         <?= $this->session->flashdata('message');  ?>

      </div>
   </div>



   <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-7 col-lg-7">
         <div class="card shadow mb-4 box">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Profil Mahasiswa</h6>
               <div class="dropdown no-arrow">
               </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
               <div class="card" style="width:100%;">
                  <div class="card-body">
                     <form>

                        <div class="form-group row mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['nama'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nim</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['nim'];  ?></span>
                           </div>
                        </div>
                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal terdaftar</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['tglMasuk'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Jurusan</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $fakultas['nama_jurusan'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Prodi</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $fakultas['nama_prodi'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Angkatan</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['angkatan'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Konsentrasi</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['konsentrasi'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Alamat</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['alamat'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">No.Telepon</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['noTelp'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Asal Studi</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['asalStudi'];  ?></span>
                           </div>
                        </div>

                        <div class="form-group row  mb-1">
                           <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal Mulai Tugas Akhir</label>
                           <div class="col-sm-9">
                              <span>:</span>
                              <span><?= $user['tglMulaiTA'];  ?></span>
                           </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#ModalMahasiswa">
                           <span class="icon text-white-50">
                              <i class="fas fa-pencil-alt"></i>
                           </span>
                           <span class="text">Edit</span>
                        </button>
                     </form>
                  </div>
               </div>

               <div class="card mt-2" style="width: 100%;">
                  <div class="card-body">
                     <h5 class="card-title">Dosen Pembimbing</h5>
                     <div class="row ml-1 mr-1">
                        <div class="table-responsive">
                           <table class="table table-bordered text-center" width="30%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Nama Dosen</th>
                                    <th>Status</th>
                                    <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                                       <th>Action</th>
                                    <?php endif; ?>
                                 </tr>
                              </thead>
                              <tbody>
                                 <form action="<?= base_url('operator/hapusPembimbing/') . $this->uri->segment(4);  ?>" method="post">
                                    <?php $i = 1;
                                    foreach ($pembimbing as $pmb) : ?>
                                       <tr>
                                          <td><?= $i++  ?></td>
                                          <td><?= $pmb['nama_dosen']; ?></td>
                                          <td><?= $pmb['status_dosen']  ?></td>
                                          <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                                             <td>
                                                <button type="submit" class="btn btn-danger btn-sm text-white" name="pembimbing" value="<?= $pmb['id']; ?>">hapus</button>
                                             </td>
                                          <?php endif; ?>
                                       </tr>
                                    <?php endforeach; ?>
                                 </form>
                              </tbody>
                           </table>
                           <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                              <button type="button" class="btn btn-success btn-icon-split tambah-dosbing" data-toggle="modal" data-target="#ModalProfil" data-nim="<?= $user['nim'] ?>">
                                 <span class="icon text-white-50">
                                    <i class="fas fa-pencil-alt"></i>
                                 </span>

                                 <span class="text">Tambah Dosbing</span>

                              </button>
                           <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
         </div>
      </div>

      <!-- Area Chart -->
      <div class="col-xl-4 col-lg-5">
         <div class="card shadow mb-4 box2">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Status Kelulusan</h6>
               <div class="dropdown no-arrow">
               </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
               <form>
                  <div class="form-group row mb-1">
                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Kelulusan</label>
                     <div class="col-sm-8">
                        <span>:</span>
                        <?php if ($user['statusKelulusan'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Wisuda</label>
                     <div class="col-sm-8">
                        <span>:</span>
                        <?php if ($user['statusWisuda'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">TOEFL</label>
                     <div class="col-sm-8">
                        <span>:</span>
                        <?php if ($user['statusTOEFL'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">TPA</label>
                     <div class="col-sm-8">
                        <span>:</span>
                        <?php if ($user['statusTPA'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>
               </form>
               <?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                  <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#ModalStatus">
                     <span class="icon text-white-50">
                        <i class="fas fa-pencil-alt"></i>
                     </span>
                     <span class="text">Edit</span>
                  </button>
               <?php endif; ?>
            </div>
         </div>
      </div>


   </div>
   <!-- /.container-fluid -->



   <!-- Isian mahaiswa -->
   <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-7 col-lg-7">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Isian Mahasiswa</h6>
               <div class="dropdown no-arrow">
               </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
               <form>
                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Judul Tugas Akhir</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <span><?= $user['tglMulaiTA'];  ?></span>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Paradigma</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <span><?= $user['tglMulaiTA'];  ?></span>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kata Kunci</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <span><?= $user['tglMulaiTA'];  ?></span>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tujuan Penelitian</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <span><?= $user['tglMulaiTA'];  ?></span>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Metode Penelitian 1</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <span><?= $user['tglMulaiTA'];  ?></span>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Metode Penelitian 2</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <span><?= $user['tglMulaiTA'];  ?></span>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Temuan</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <span><?= $user['tglMulaiTA'];  ?></span>
                     </div>
                  </div>

                  <div class="row float-right mr-3">
                     <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#ModalIsianMahasiswa">
                        <span class="icon text-white-50">
                           <i class="fas fa-pencil-alt"></i>
                        </span>
                        <span class="text">Edit</span>
                     </button>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
   <!-- akhir isian mahasiswa -->

</div>
<!-- End of Main Content -->

<?php if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
   <!-- Modal Edit Profil-->
   <div class="modal fade" id="ModalProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalScrollableTitle">Daftar Dosen</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="<?= base_url('operator/tambahPembimbing/') . $this->uri->segment(4);  ?>" method="post">
               <div class="modal-body">
                  <div class="table-responsive pembimbing">
                     <table class="table table-bordered text-left" cellspacing="0" id="dataTable">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Nama Dosen</th>
                              <th>NIP</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1;
                           foreach ($dosen as $pmb) : ?>
                              <tr>
                                 <td><?= $i++  ?></td>
                                 <td><?= $pmb['nama_dosen']; ?></td>
                                 <td><?= $pmb['nip']  ?></td>
                                 <td><input type="radio" name="nip" value="<?= $pmb['nip'] ?>"></td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="modal-footer">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <label class="input-group-text" for="pembimbing">Status</label>
                     </div>
                     <select class="custom-select" id="pembimbing" name="pembimbing">
                        <?php foreach ($posisiPembimbing as $posisi) : ?>
                           <option value="<?= $posisi['id'] ?>"><?= $posisi['status_dosen']  ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>

   <!-- Modal Edit Kelulusan -->
   <div class="modal fade" id="ModalStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Status Kelulusan</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="<?= base_url('operator/updateStatusMahasiswa/') . $this->uri->segment(4); ?>" method="post">
               <div class="modal-body">
                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3  font-weight-bold">STATUS</label>
                     <div class="col-sm-5">
                        <span></span>
                        <span class="font-weight-bold">KETERANGAN</span>
                     </div>
                     <div class="col-sm-3 font-weight-bold">
                        <span>L /</span>
                        <span>BL</span>
                     </div>
                     <hr>
                  </div>
                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kelulusan</label>
                     <div class="col-sm-5">
                        <span>:</span>
                        <?php if ($user['statusKelulusan'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                     <div class="col-sm-3">
                        <?php if ($user['statusKelulusan'] == 0) : ?>
                           <input type="radio" id="check-statusKelulusan" name="cekStatusKelulusan" value=1>
                           <input type="radio" id="check-statusKelulusan" name="cekStatusKelulusan" value=0 checked>
                        <?php else : ?>
                           <input type="radio" id="check-statusKelulusan" name="cekStatusKelulusan" value=1 checked>
                           <input type="radio" id="check-statusKelulusan" name="cekStatusKelulusan" value=0>
                        <?php endif; ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Wisuda</label>
                     <div class="col-sm-5">
                        <span>:</span>
                        <?php if ($user['statusWisuda'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                     <div class="col-sm-3">
                        <?php if ($user['statusWisuda'] == 0) : ?>
                           <input type="radio" id="check-statusWisuda" name="cekstatusWisuda" value=1>
                           <input type="radio" id="check-statusWisuda" name="cekstatusWisuda" value=0 checked>
                        <?php else : ?>
                           <input type="radio" id="check-statusWisuda" name="cekstatusWisuda" value=1 checked>
                           <input type="radio" id="check-statusWisuda" name="cekstatusWisuda" value=0>
                        <?php endif; ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">TOEFL</label>
                     <div class="col-sm-5">
                        <span>:</span>
                        <?php if ($user['statusTOEFL'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                     <div class="col-sm-3">
                        <?php if ($user['statusTOEFL'] == 0) : ?>
                           <input type="radio" id="check-statusTOEFL" name="cekstatusTOEFL" value=1>
                           <input type="radio" id="check-statusTOEFL" name="cekstatusTOEFL" value=0 checked>
                        <?php else : ?>
                           <input type="radio" id="check-statusTOEFL" name="cekstatusTOEFL" value=1 checked>
                           <input type="radio" id="check-statusTOEFL" name="cekstatusTOEFL" value=0>
                        <?php endif; ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">TPA</label>
                     <div class="col-sm-5">
                        <span>:</span>
                        <?php if ($user['statusTPA'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                     <div class="col-sm-3">
                        <?php if ($user['statusTPA'] == 0) : ?>
                           <input type="radio" id="check-statusTPA" name="cekstatusTPA" value="1">
                           <input type="radio" id="check-statusTPA" name="cekstatusTPA" value="0" checked>
                        <?php else : ?>
                           <input type="radio" id="check-statusTPA" name="cekstatusTPA" value="1" checked>
                           <input type="radio" id="check-statusTPA" name="cekstatusTPA" value="0">
                        <?php endif; ?>
                     </div>
                  </div>

               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!-- Akhir Modal Kelulusan -->
<?php endif; ?>

<!-- Modal Mahasiswa -->
<div class="modal fade" id="ModalMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('mahasiswa/profil') ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">No Telepon:</label>
                  <input type="text" class="form-control" id="noTelp" name="noTelp" value="<?= $user['noTelp'] ?>">
               </div>
               <div class="form-group">
                  <label for="message-text" class="col-form-label">Alamat:</label>
                  <textarea class="form-control" id="alamat" name="alamat"><?= $user['alamat'] ?></textarea>
               </div>
               <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Tanggal Mulai Tugas Akhir</label>
                  <input type="date" class="form-control" id="tglMulaiTA" name="tglMulaiTA" value="<?= $user['tglMulaiTA'] ?>">
                  <input type="hidden" name="nim" value="<?= $user['nim']; ?>">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-success">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- Akhir Mulai Profil -->