<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-9">
            <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
        </div>

    </div>



    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message');  ?>

        </div>
    </div>
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-10 col-lg-7">
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Ujian</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- detail mahasiswa -->
                    <form action="" method="">
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                            <div class="col-sm-4">
                                <!-- apabila user sebagai mhs,dosen,pimpinan -->
                                <?php if ($this->session->userdata('user_profile_kode') == 5  || $this->session->userdata('user_profile_kode') == 4 || $this->session->userdata('user_profile_kode') == 3) { ?>

                                    <input type="email" class="form-control" name="nama" id="nama" placeholder="Nama mahasiswa..." readonly value="<?= $user['nama'] ?>">
                                <?php } else { ?>
                                    <!-- apabila user sebagai admin,operator -->
                                    <input type="email" class="form-control" name="nama" id="nama" placeholder="Nama mahasiswa..." value="<?= $user['nama'] ?>">
                                <?php } ?>

                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">NIM</label>
                            <div class="col-sm-3">
                                <!-- apabila user sebagai mhs,dosen,pimpinan -->
                                <?php if ($this->session->userdata('user_profile_kode') == 5  || $this->session->userdata('user_profile_kode') == 4 || $this->session->userdata('user_profile_kode') == 3) { ?>

                                    <input type="email" class="form-control" name="nim" id="nim" placeholder="Nim.." readonly value="<?= $user['nama'] ?>">
                                <?php } else { ?>
                                    <!-- apabila user sebagai admin,operator -->
                                    <input type="email" class="form-control" name="nim" id="nim" placeholder="Nim.." value="<?= $user['nama'] ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Judul Tugas Akhir</label>
                            <div class="col-sm-9">
                                <!-- apabila user sebagai mhs,dosen,pimpinan -->
                                <?php if ($this->session->userdata('user_profile_kode') == 5  || $this->session->userdata('user_profile_kode') == 4 || $this->session->userdata('user_profile_kode') == 3) { ?>
                                    <textarea type="text" class="form-control" id="judulTA" placeholder="Tugas Akhir..." readonly name="judulTA" id="" cols="10" rows="2"><?= $user['judulTugasAkhir'] ?>
                                                                                                                                                    </textarea>
                                <?php } else { ?>
                                    <!-- apabila user sebagai admin,operator -->
                                    <textarea type="text" class="form-control" id="judulTA" placeholder="Tugas Akhir..." name="judulTA" id="" cols="10" rows="2"><?= $user['judulTugasAkhir'] ?>
                                                                                                                                                     </textarea>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Ujian</label>
                            <div class="col-sm-4">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <?php foreach ($ujian as $u) : ?>
                                        <option value="<?= $u['nama_ujian'] ?>"><?= $u['nama_ujian'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal ujian</label>
                            <div class="col-sm-2">
                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nilai</label>
                            <div class="col-sm-2">
                                <!-- apabila user sebagai mhs,dosen,pimpinan -->
                                <?php if ($this->session->userdata('user_profile_kode') == 5  || $this->session->userdata('user_profile_kode') == 4 || $this->session->userdata('user_profile_kode') == 3) { ?>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai..." readonly>
                                <?php } else { ?>
                                    <!-- apabila user sebagai admin,operator -->
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai...">
                                <?php } ?>

                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bobot</label>
                            <div class="col-sm-2">
                                <!-- apabila user sebagai mhs,dosen,pimpinan -->
                                <?php if ($this->session->userdata('user_profile_kode') == 5  || $this->session->userdata('user_profile_kode') == 4 || $this->session->userdata('user_profile_kode') == 3) { ?>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bobot..." readonly value="">
                                <?php } else { ?>
                                    <!-- apabila user sebagai admin,operator -->
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bobot..." value="">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bukti</label>
                            <div class="col-sm-4">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col-sm-7">
                                <h5>Daftar Dosen Penguji</h5>
                                <div class="table-wrapper-scroll-y my-custom-scrollbar row ml-1 mr-1 ">
                                    <table class="table mb-0 table-sm" style="color: #101010">
                                        <thead>
                                            <tr style="background-color: #f8f8f8; color: #101010">
                                                <th scope="col">#</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Nama Dosen</th>
                                                <th scope="col">Nilai</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>12 Mei 2019</td>
                                                <td>Ujian Komisi Persiapan Proposal</td>
                                                <td>12 Mei</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>12 Mei 2019</td>
                                                <td>Ujian Komisi Persiapan Proposal</td>
                                                <td>12 Mei</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>12 Mei 2019</td>
                                                <td>Ujian Komisi Persiapan Proposal</td>
                                                <td>12 Mei</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <th>Nilai akhir</th>
                                            <td></td>
                                            <td></td>
                                            <td>99</td>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <!-- Dosen Pembimbing -->
                            <div class="col-sm-5">
                                <h5>Daftar Dosen Pendamping</h5>

                                <table class="table mb-0 table-sm" style="color: #101010">
                                    <thead>
                                        <tr style="background-color: #f8f8f8; color: #101010">
                                            <th scope="col">#</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Nama Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>12 Mei 2019</td>
                                            <td>Ujian Komisi Persiapan Proposal</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>12 Mei 2019</td>
                                            <td>Ujian Komisi Persiapan Proposal</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>12 Mei 2019</td>
                                            <td>Ujian Komisi Persiapan Proposal</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group row mb-1 mt-3">
                            <div class="col-lg-12 ">
                                <button type="submit" class="btn btn-primary float-right">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-fw fa-plus-circle"></i>
                                    </span>
                                    <span class="text">Tambah</span>
                                </button>
                            </div>
                        </div>

                    </form>
                    <!-- akhir detail mahasiswa -->

                </div>


            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->