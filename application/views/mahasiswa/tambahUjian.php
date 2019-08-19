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
        <div class="col-xl-10 col-lg-10">
            <div class="card shadow mb-3">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Ujian</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- detail mahasiswa -->
                    <?= form_open_multipart('mahasiswa/tambahUjian/' . $user_login['nim']); ?>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama mahasiswa..." readonly value="<?= $user_login['nama'] ?>">
                            <input type="hidden" name="nim" value="<?= $user_login['nim'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">NIM</label>
                        <div class="col-sm-3">
                            <input type="email" class="form-control" name="nim" id="nim" placeholder="Nim.." readonly value="<?= $user_login['nim'] ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Judul Tugas Akhir</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="judulTA" placeholder="Tugas Akhir..." readonly name="judulTA" id="" cols="10" rows="2"><?= $user_login['judulAkhir'] ?> </textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Ujian</label>
                        <div class="col-sm-4">
                            <select class="custom-select" id="kodeUjian" name="kodeUjian">
                                <?php foreach ($belumUjian as $u) : ?>
                                <option value="<?= $u['kode'] ?>"><?= $u['nama_ujian'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('kodeUjian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tanggal ujian</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" id="tanggalUjian" name="tanggalUjian" placeholder="Enter email">
                            <?= form_error('tanggalUjian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bukti</label>
                        <div class="col-sm-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="buktiUjian" name="buktiUjian">
                                <label class="custom-file-label" for="customFile">Choose file</label id="buktiUjian" name="buktiUjian">
                            </div>
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