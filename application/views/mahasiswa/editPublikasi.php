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
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Publikasi</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?= form_open_multipart('mahasiswa/editPublikasi/' . $jurnal['idJurnal']); ?>
                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Judul Artikel</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="judulArtikel" id="judulArtikel" placeholder="Masukkan judul artikel..." value="<?= $jurnal['judulArtikel']  ?>">
                            <?= form_error('judulArtikel', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Nama Jurnal</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="namaJurnal" id="namaJurnal" placeholder="Masukkan nama jurnal..." value="<?= $jurnal['namaJurnal'] ?>">
                            <?= form_error('namaJurnal', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Volume dan No terbitan</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="volumDanNo" id="volumDanNo" placeholder="(exp:10/2)..." value="<?= $jurnal['volumeDanNoTerbitan'] ?>">
                            <?= form_error('volumDanNo', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Status jurnal</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="statusJurnal" name="statusJurnal">
                                <?php foreach ($statusJurnal as $j) : ?>
                                <?php if ($jurnal['statusJurnal'] == $j) : ?>
                                <option value="<?= $j; ?>" selected><?= $j ?> </option>
                                <?php else : ?>
                                <option value="<?= $j; ?>"><?= $j; ?></option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bukti</label>
                        <div class="col-sm-4">
                            <div class="input-group mb-2">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="buktiPublikasi" name="buktiPublikasi">
                                    <label class="custom-file-label" for="customFile">Chose file..</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <a href="<?= base_url('assets/') ?>publikasi/<?= $jurnal['bukti'] ?>">
                                <?= $jurnal['bukti'];  ?></a><br>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Kategori Jurnal</label>
                        <div class="col-sm-4">
                            <!-- apabila user sebagai mhs,dosen,pimpinan -->
                            <?php if ($this->session->userdata('user_profile_kode') == 5  || $this->session->userdata('user_profile_kode') == 4 || $this->session->userdata('user_profile_kode') == 3) { ?>
                            <input type="text" class="form-control" name="kategoriJurnal" id="kategoriJurnal" placeholder="Di isikan operator..." value="<?= $jurnal['kategoriJurnal'] ?>" readonly>
                            <?php } else { ?>
                            <!-- apabila user sebagai admin,operator -->
                            <input type="text" class="form-control" name="kategoriJurnal" id="kategoriJurnal" placeholder="Di isikan operator..." value="<?= $jurnal['kategoriJurnal'] ?>">
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-11">
                            <button type="submit" class="btn btn-primary btn-icon-split float-right">
                                <span class="icon text-white-50">
                                    <i class="fas fa-pencil-alt"></i>
                                </span>
                                <span class="text">Edit</span>
                            </button>
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