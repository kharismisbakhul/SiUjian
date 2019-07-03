<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-7">
            <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>
        </div>
        <div class="col-lg-5 float-right ">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalProfil">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-plus-circle"></i>
                </span>
                <span class="text">Tambah</span>
            </button>
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
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar row ml-1 mr-1 ">

                        <table class="table mb-0 table-sm">
                            <thead>
                                <tr style="background-color: 	#f8f8f8; color: #101010">
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Judul Artikel</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>12 Mei 2019</td>
                                    <td>Ini contoh artikel</td>
                                    <td>VALID</td>

                                    <td>
                                        <button type="button" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                        <button type="button" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-pencil-alt"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </button>
                                        <button type="button" class="badge badge-pill badge-info" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-eye"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </button>
                                    </td>


                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>12 Mei 2019</td>
                                    <td>Ujian Komisi Persiapan Proposal</td>
                                    <td>12 Mei</td>
                                    <td>
                                        <button type="button" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>

                                        <button type="button" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-pencil-alt"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </button>
                                        <button type="button" class="badge badge-pill badge-info" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-eye"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </button>
                                    </td>


                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>12 Mei 2019</td>
                                    <td>Ujian Komisi Persiapan Proposal</td>
                                    <td>12 Mei</td>
                                    <td>
                                        <button type="button" class="badge badge-pill badge-danger" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-trash-alt"></i>
                                            </span>
                                            <span class="text">Delete</span>
                                        </button>
                                        <button type="button" class="badge badge-pill badge-primary" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-pencil-alt"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </button>
                                        <button type="button" class="badge badge-pill badge-info" data-toggle="modal" data-target="#ModalProfil">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-fw fa-eye"></i>
                                            </span>
                                            <span class="text">Detail</span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->