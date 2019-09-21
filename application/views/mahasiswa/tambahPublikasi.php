<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-xl-10 col-sm-1">
            <h1 class="title h3 mb-4 text-gray-800"><?= $title;  ?></h1>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message');  ?>

        </div>

    </div>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Publikasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) {
                        echo form_open_multipart('mahasiswa/tambahPublikasi/' . $this->uri->segment(3));
                    } else {
                        echo form_open_multipart('mahasiswa/tambahPublikasi/' . $user_login['nim']);
                    } ?>
                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Judul Artikel</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="judulArtikel" id="judulArtikel" placeholder="Masukkan judul artikel...">
                            <?= form_error('judulArtikel', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama Jurnal</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="namaJurnal" id="namaJurnal" placeholder="Masukkan nama jurnal...">
                            <?= form_error('namaJurnal', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Volume dan No terbitan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="volumDanNo" id="volumDanNo" placeholder="(exp:10/2)...">
                            <?= form_error('volumDanNo', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Status jurnal</label>
                        <div class="col-sm-12">
                            <select class="custom-select" id="statusJurnal" name="statusJurnal">
                                <option value="Internasional Bereputasi">Internasional Bereputasi</option>
                                <option value="Internasional">Internasional</option>
                                <option value="Nasional Terakreditasi">Nasional Terakreditasi</option>
                                <option value="Nasional">Nasional</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bukti</label>
                        <div class="col-sm-12">
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="buktiPublikasi" name="buktiPublikasi">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kategori Jurnal</label>
                        <div class="col-sm-12">
                            <!-- apabila user sebagai mhs,dosen,pimpinan -->
                            <?php if ($this->session->userdata('user_profile_kode') == 5  || $this->session->userdata('user_profile_kode') == 4 || $this->session->userdata('user_profile_kode') == 3) { ?>
                            <input type="text" class="form-control" name="kategoriJurnal" id="kategoriJurnal" placeholder="Di isikan operator..." value="" readonly>
                            <?php } else { ?>
                            <!-- apabila user sebagai admin,operator -->
                            <input type="text" class="form-control" name="kategoriJurnal" id="kategoriJurnal" placeholder="Di isikan operator..." value="">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary btn-icon-split float-right ml-2">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Publikasi</span>
                            </button>
                            <?php
                            if ($this->session->userdata('user_profile_kode') == 1 || $this->session->userdata('user_profile_kode') == 2) : ?>
                            <a href="<?= base_url('operator/mahasiswa/publikasi/') . $this->uri->segment(3) ?>" class="btn btn-secondary float-right">Kembali</a>
                            <?php else : ?>
                            <a href="<?= base_url('mahasiswa') ?>/publikasi" class="btn btn-secondary float-right">Kembali</a>
                            <?php endif; ?>

                        </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->