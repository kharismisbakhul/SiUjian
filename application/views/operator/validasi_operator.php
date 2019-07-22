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

       <div class="row">
         <div class="col-lg-6">
           <?= $this->session->flashdata('message');  ?>
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
             <div class="col-lg-12 col-md-12 mb-4">
               <!-- Approach -->
               <div class="card shadow mb-4">
                 <div class="card-header py-3 bg-blue">
                   <h6 class="m-0 font-weight-bold text-capitalize clr-white">Daftar Permintaan Validasi</h6>
                 </div>
                 <div class="card-body">
                   <form action="<?= base_url('operator/ujian') ?>" method="post">
                     <div class="row mb-2">
                       <div class="col-md-3">
                         <small>Mulai Periode</small>
                         <?php if ($star_date != null) : ?>
                           <small> <?= $star_date ?></small>
                         <?php endif; ?>
                         <input type="date" class="form-control" name="star_date">
                       </div>
                       <div class="col-md-3">
                         <small>Akhir Periode</small>
                         <?php if ($end_date != null) : ?>
                           <small> <?= $end_date ?></small>
                         <?php endif; ?>
                         <div class="input-group mb-3">
                           <input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" name="end_date">
                           <div class="input-group-append">
                             <input type="submit" class="btn btn-primary" name="submit" value="cari" id="basic-addon2">
                           </div>
                         </div>
                       </div>
                     </div>
                   </form>

                   <div class="table-responsive">
                     <table class="display table table-bordered text-wrap table-sm text-center" id="test" width="100%" cellspacing="0">
                       <thead>
                         <tr>
                           <th>#</th>
                           <th>Tanggal Data Masuk</th>
                           <th>Nama Mahasiswa</th>
                           <th>Jenjang</th>
                           <th>Program Studi</th>
                           <th>Keterangan</th>
                           <th>Validate</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php $i = 1;
                          foreach ($valid_ujian as $v) : ?>
                           <tr>
                             <td><?= $i++;  ?></td>
                             <td><small><?= $v['tgl_tambah_ujian']  ?></small></td>
                             <td><?= $v['nama']  ?></td>
                             <td><?= $v['jenjang']  ?></td>
                             <td><?= $v['nama_prodi']  ?></td>
                             <td><?= $v['nama_ujian']  ?></td>

                             <!-- valid ujian -->
                             <?php if ($v['valid'] == 1) { ?>
                               <td class="badge badge-pill badge-success">Valid</td>
                             <?php } elseif ($v['valid'] == 2) { ?>
                               <td class="badge badge-pill badge-primary">Proses</td>
                             <?php } else { ?>
                               <td class="badge badge-pill badge-danger">Tidak Valid</td>
                             <?php } ?>

                             <td class="text-center">
                               <a href="<?= base_url('operator')  ?>/validasi_cek/<?= $v['id']  ?>" class="btn btn-success btn-icon-split btn-sm">
                                 <span class="icon text-white-50">
                                   <i class="fas fa-check-circle"></i>
                                 </span>
                                 <span class="text">Detail</span>
                               </a>
                             </td>
                           </tr>
                         <?php endforeach; ?>
                       </tbody>
                       <tfoot>
                         <tr>
                           <th colspan="3"></th>
                           <th>Jenjang</th>
                           <th>Program Studi</th>
                           <th>Keterangan</th>
                           <th>Validate</th>
                           <th></th>
                         </tr>
                       </tfoot>
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