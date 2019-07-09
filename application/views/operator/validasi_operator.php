 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

   <!-- Main Content -->
   <div id="content">

     <!-- Begin Page Content -->
     <div class="container-fluid">

       <!-- Page Heading -->
       <div class="d-sm-flex align-items-center justify-content-between mb-3">
         <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
         <div class="tanggal">
           <div class="text-s mb-0 font-weight-bold text-gray-400">
             <span><i class="fas fa-calendar-day text-gray-400"></i></span> <?= date('d M Y'); ?>
           </div>
         </div>
       </div>

       <!-- Content Row -->
       <div class="row">

         <div class="d-none d-lg-block col-md-8 mb-4">
           <div class="shadow mb-1">
             <a href="#collapseCardExample" class="d-block card-header py-3 bg-blue text-decoration-none" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
               <div class="d-sm-flex align-items-center justify-content-between">
                 <h6 class=" m-0 font-weight-bold clr-white">Tentang Validasi</h6> <i><i class="fas fa-chevron-down clr-white"></i></i>
               </div>
             </a>
             <div class="collapse show" id="collapseCardExample">
               <div class="card-body pb-4">
                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa quibusdam excepturi non ipsam
                 deserunt hic placeat odio voluptas vitae odit enim a, veritatis at totam eaque consequuntur quae sit
                 possimus!
               </div>
             </div>
           </div>
         </div>

         <div class="col-lg-12">
           <!-- Content Row -->
           <div class="row">

             <div class="col-lg-12 col-md-6 mb-4">
               <!-- Approach -->
               <div class="card shadow mb-4">
                 <div class="card-header py-3 bg-blue">
                   <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Permintaan Validasi</h6>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                           <th>#</th>
                           <th>Tanggal Masuk</th>
                           <th>Nama Mahasiswa</th>
                           <th>Jenjang</th>
                           <th>Program Studi</th>
                           <th>Keterangan</th>
                           <th>Validate</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                         <tr>
                           <td>1</td>
                           <td>20 Juli 2019</td>
                           <td>Reynald Daffa</td>
                           <td>S2</td>
                           <td>Akuntansi</td>
                           <td>Seminar Hasil</td>
                           <td class="text-success font-weight-bold">Valid</td>
                           <td class="text-center">
                             <button href="#" class="btn btn-secondary btn-icon-split btn-sm">
                               <span class="icon text-white-50">
                                 <i class="fas fa-check-circle"></i>
                               </span>
                               <span class="text">Validasi</span>
                             </button>
                           </td>
                         </tr>
                         <tr>
                           <td>2</td>
                           <td>20 Juli 2019</td>
                           <td>Misbakhul Kharis</td>
                           <td>S2</td>
                           <td>Manajemen</td>
                           <td>Publikasi</td>
                           <td class="text-success font-weight-bold">Valid</td>
                           <td class="text-center">
                             <button href="#" class="btn btn-secondary btn-icon-split btn-sm" disabled>
                               <span class="icon text-white-50">
                                 <i class="fas fa-check-circle"></i>
                               </span>
                               <span class="text">Validasi</span>
                             </button>
                           </td>
                         </tr>
                         <tr>
                           <td>3</td>
                           <td>20 Juli 2019</td>
                           <td>Aditiya Yusril</td>
                           <td>S3</td>
                           <td>Ekonomi Pembangunan</td>
                           <td>Ujian Tesis</td>
                           <td class="text-success font-weight-bold">Valid</td>
                           <td class="text-center">
                             <button href="#" class="btn btn-secondary btn-icon-split btn-sm" disabled>
                               <span class="icon text-white-50">
                                 <i class="fas fa-check-circle"></i>
                               </span>
                               <span class="text">Validasi</span>
                             </button>
                           </td>
                         </tr>
                         <tr>
                           <td>4</td>
                           <td>20 Juli 2019</td>
                           <td>Tony Krauk</td>
                           <td>S3</td>
                           <td>Ekonomi Pembangunan</td>
                           <td>Ujian Tesis</td>
                           <td class="text-info font-weight-bold">Proses</td>
                           <td class="text-center">
                             <button href="#" class="btn btn-success btn-icon-split btn-sm">
                               <span class="icon text-white-50">
                                 <i class="fas fa-check-circle"></i>
                               </span>
                               <span class="text">Validasi</span>
                             </button>
                           </td>
                         </tr>
                         <tr>
                           <td>5</td>
                           <td>20 Juli 2019</td>
                           <td>Dominic Teroret</td>
                           <td>S3</td>
                           <td>Manajemen</td>
                           <td>Ujian Tesis</td>
                           <td class="text-info font-weight-bold">Proses</td>
                           <td class="text-center">
                             <button href="#" class="btn btn-success btn-icon-split btn-sm">
                               <span class="icon text-white-50">
                                 <i class="fas fa-check-circle"></i>
                               </span>
                               <span class="text">Validasi</span>
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
         </div>
       </div>
     </div>
     <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->