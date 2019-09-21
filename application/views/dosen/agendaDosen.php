<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message');  ?>
        </div>
    </div>

    <!-- Start Card Agenda Dosen -->
    <div class="row box">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $user_login['nama_dosen'] . ' - ' . $user_login['nip'] ?></h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="row mt-2 mb-1 m-0">
                        <h2 class="col-lg-6 monthYear">

                        </h2>
                        <div class="col-lg-4"></div>
                        <button class="col-lg-2 btn btn-primary" data-toggle="modal" data-target="#ModalAgendaDosen">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Agenda</span>
                        </button>
                    </div>
                    <div class="row mb-4 m-0">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="date" name="calendarSpesifik" id="tanggalSpesifik">
                        </div>
                        <!-- <div class="form-group col-lg-1">
                            <select class="form-control" id="tahunAgenda">
                                <option>Tahun</option>
                            </select>
                        </div> -->
                    </div>
                    <div class="row m-0 col-lg-12">
                        <div id="calendar" style="margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Agenda Dosen -->
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Agenda -->
<div class="modal fade" id="ModalAgendaDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Agenda Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('agendaDosen/tambahAgenda/') . $user_login['nip'] ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <p class="col-lg-9"></p>
                        <p class="btn btn-success templateBimbingan col-lg-3">Bimbingan</p>
                    </div>
                    <div class="form-group">
                        <label for="namaAgenda" class="col-form-label">Nama Agenda</label>
                        <textarea class="form-control" id="namaAgenda" name="namaAgenda" placeholder="Nama Agenda" style="resize:none; max-height: 100px;"></textarea>
                        <?= form_error('namaAgenda', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kategoriAgenda" class="col-form-label">Kategori Agenda</label>
                        <select class="form-control" id="kategoriAgenda" name="kategoriAgenda" placeholder="Kategori Agenda">
                            <option value="0" disabled selected hidden>Pilih Kategori Agenda</option>
                            <option value="1">1 hari</option>
                            <option value="2">Lebih dari 1 hari</option>
                            <option value="3">Repetitif</option>
                            <option value="4">Agenda 1 Semester</option>
                        </select>
                        <?= form_error('kategoriAgenda', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <input type="hidden" id="nip" name="nip" value="<?= $user_login['nip']; ?>">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Event Clicked -->
<div class="modal fade" id="ModalEventClicked" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Opsi Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body col-lg-12">
                <div class="card-body">
                    <div class="row">
                        <button class="btn btn-primary col-lg-5 editAgenda">Edit Agenda</button>
                        <p class="col-lg-1"></p>
                        <button class="btn btn-danger col-lg-6 hapusAgenda">Hapus Agenda</button>
                    </div>
                    <input type="hidden" id="nip_dosen_modal" value="">
                    <input type="hidden" id="id_agenda_modal" value="">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Agenda -->
<div class="modal fade" id="ModalEditAgendaDosenOperator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('agendaDosen/editAgenda/') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaAgendaEdit" class="col-form-label">Nama Agenda</label>
                        <textarea class="form-control" id="namaAgendaEdit" name="namaAgendaEdit" style="resize:none; max-height: 100px;" value=""></textarea>
                    </div>
                    <input type="hidden" id="nip_modal_edit" name="nip_modal_edit" value="">
                    <input type="hidden" id="id_agenda_edit" name="id_agenda_edit" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>