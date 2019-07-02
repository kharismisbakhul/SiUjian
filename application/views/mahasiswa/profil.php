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
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['nama'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nim</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['nim'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jurusan</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $fakultas['nama_jurusan'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Prodi</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $fakultas['nama_prodi'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Angkatan</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['angkatan'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Konsentrasi</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['konsentrasi'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['alamat'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No.Telepon</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['noTelp'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Asal Studi</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['asalStudi'];  ?></span>
              </div>
            </div>

            <div class="form-group row  mb-1">
              <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Mulai Tugas Akhir</label>
              <div class="col-sm-10">
                <span>:</span>
                <span><?= $user['tglMulaiTA'];  ?></span>
              </div>
            </div>


            <div class="row">
              <h4 class="col-sm-6 mt-2 ">Daftar Dosen Pendamping</h4>
            </div>

            <div class=" row ml-1 mr-1">

              <table class="table table-hover">
                <thead>
                  <tr>
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


          </form>

        </div>
      </div>
    </div>




  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->