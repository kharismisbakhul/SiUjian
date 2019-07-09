   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

       <!-- Begin Page Content -->
       <div class="container-fluid">

         <!-- Content Row -->
         <div class="row">

           <div class="d-none d-lg-block col-md-12 mb-4">
             <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col ml-auto">
                     <div class="h5 mb-0 font-weight-bold text-gray-800">Selamat Datang di Si-Ujian, <span id="user_name" class="text-gray-900 font-weight-bolder"><?= $user['nama']; ?></span></div>
                     <div class="text-s font-weight-normal text-gray-800 mt-2">Silahkan untuk mengecek Ujian selanjutnya dan update nilai terbaru :)</div>
                   </div>
                   <div class="col-auto mr-3">
                     <i class="far fa-smile-beam fa-3x"></i>
                   </div>
                 </div>
               </div>
             </div>
           </div>

           <!-- Ujian Selanjutnya -->
           <div class="col-xl-4 col-md-6 col-lg-4 mb-4">
             <div class="card border-left-danger shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Ujian Selanjutnya</div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800 mt-3">Ujian Proposal</div>
                   </div>
                   <div class="col-auto">
                     <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                   </div>
                 </div>
                 <div class="text-xs pt-3 see-more not-dosen font-weight-normal">lihat selengkapnya</div>
               </div>
             </div>
           </div>

           <!-- Jadwal Ujian Selanjutnya -->
           <div class="col-xl-4 col-md-6 col-lg-4 mb-4">
             <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jadwal Ujian Selanjutnya</div>
                     <div class="h3 mb-0 font-weight-bold text-gray-800 mt-3">14 Juli 2019</div>
                   </div>
                   <div class="col-auto">
                     <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                   </div>
                 </div>
                 <div class="text-xs pt-3 see-more not-dosen font-weight-normal">lihat selengkapnya</div>
               </div>
             </div>
           </div>

           <!-- Dosen Penguji Ujian -->
           <div class="col-xl-4 col-md-6 col-lg-4 mb-4">
             <div class="card border-left-warning shadow h-100 py-2">
               <div class="card-body">
                 <div class="row no-gutters align-items-center">
                   <div class="col mr-2">
                     <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dosen Penguji Ujian</div>
                     <div class="dosen-penguji mb-0 font-weight-bold text-gray-800">Drs. Jhonny Doe., S.E., M.E</div>
                     <div class="dosen-penguji mb-0 font-weight-bold text-gray-800">Drs. Donny Doe., S.E., M.E</div>
                   </div>
                   <div class="col-auto">
                     <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                   </div>
                 </div>
                 <div class="text-xs pt-3 see-more font-weight-normal">lihat selengkapnya</div>
               </div>
             </div>
           </div>

         </div>

         <!-- Content Row -->
         <div class="row">

           <div class="col-lg-6 col-md-6 mb-4">
             <!-- Approach -->
             <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary text-capitalize">Ujian yang diselsaikan</h6>
               </div>
               <div class="card-body">
                 <ol>
                   <li>
                     <div class="row">
                       <div class="col-lg-6 col-sm-6">
                         Ujian Komisi
                       </div>
                       <div class="col-lg-2 col-sm-6">
                         Lulus
                       </div>
                     </div>
                   </li>
                   <li>
                     <div class="row">
                       <div class="col-lg-6 col-sm-6">
                         Ujian Komisi
                       </div>
                       <div class="col-lg-2 col-sm-6">
                         Lulus
                       </div>
                     </div>
                   </li>
                 </ol>
                 <div class="text-xs pt-3 pb-2 see-more font-weight-normal">lihat selengkapnya</div>
               </div>
             </div>

           </div>
         </div>

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->