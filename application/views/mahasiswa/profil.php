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
      <div class="col-xl-8 col-lg-7">

         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Profil Mahasiswa</h6>
               <div class="dropdown no-arrow">
               </div>
            </div>

            <!-- Card Body -->
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


                  <div class="row">
                     <h5 class="col-sm-6 mt-2 ">Daftar Dosen Pendamping</h5>
                  </div>

                  <div class=" row ml-1 mr-1">

                     <table class="table table-sm ">
                        <thead>
                           <tr style="background-color: 	#C0C0C0; color: #101010">
                              <th scope="col">#</th>
                              <th scope="col">Status</th>
                              <th scope="col">Nama Dosen</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <th scope="row">1</th>
                              <td>Bambang Pamungkas</td>
                              <td>Dosen Pembimbing 1</td>

                           </tr>
                           <tr>
                              <th scope="row">2</th>
                              <td>Ely Eboy</td>
                              <td>Dosem Pembimbing 2</td>

                           </tr>
                           <tr>
                              <th scope="row">2</th>
                              <td>Markus Horison</td>
                              <td>Dosen Pembimbing 3</td>


                           </tr>
                        </tbody>
                     </table>
                  </div>

                  <div class="row float-right mr-3">
                     <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#ModalProfil">
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

      <!-- Area Chart -->
      <div class="col-xl-4 col-lg-5">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <h6 class="m-0 font-weight-bold text-primary">Status Kelulus</h6>
               <div class="dropdown no-arrow">
               </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
               <form>
                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kelulusan</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <?php if ($user['statusKelulusan'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Wisuda</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <?php if ($user['statusWisuda'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">TOEFL</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <?php if ($user['statusTOEFL'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>

                  <div class="form-group row  mb-1">
                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">TPA</label>
                     <div class="col-sm-9">
                        <span>:</span>
                        <?php if ($user['statusTPA'] == 0) { ?>
                           <span class="text-danger font-weight-bold">BELUM LULUS</span><?php } else { ?>
                           <span class="text-success font-weight-bold">LULUS</span><?php } ?>
                     </div>
                  </div>
               </form>

            </div>
         </div>
      </div>

   </div>
   <!-- /.container-fluid -->


   <!-- Isian mahaiswa -->
   <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-8 col-lg-7">
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


<!-- Modal Edit Profil-->
<div class="modal fade" id="ModalProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            ...
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>


<!-- Modal Edit Isian Mahasiswa-->
<div class="modal fade" id="ModalIsianMahasiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            ...
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
         </div>
      </div>
   </div>
</div>