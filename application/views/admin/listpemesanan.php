 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">Daftar pemesanan</h1>
     <!-- content -->
     <?= $this->session->flashdata('message') ?>
     <div class="container">
         <table class="table table-hover">
             <thead>
                 <tr>
                     <th scope="col">No</th>
                     <th scope="col">Email</th>
                     <th scope="col">Tanggal</th>
                     <th scope="col" class="text-center">Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                    $i = 1;
                    foreach ($list as $lists) : ?>

                     <tr>
                         <th scope="row"><?= $i ?></th>
                         <td><?= $lists['email'] ?></td>
                         <td><?= $lists['tgl_pemesanan'] ?></td>
                         <td class="text-center">
                             <a href="<?= base_url('Admin/sendEmail/' . $lists['id_pemesanan']) ?>" class="btn btn-success"><i class="fa fa-paper-plane"></i></a>
                             <a href="<?= base_url('Admin/detail/' . $lists['id_pemesanan']) ?>" class="btn btn-warning"><i class="fa fa-align-justify"></i></a>
                             <a href="<?= base_url('Admin/info/' . $lists['id_pemesanan']) ?>" class="btn btn-secondary no-arrow"><i class="fas fa-fw fa-file-upload"></i><span class="badge badge-success badge-counter"><i class="fas fa-check"></i></span></a>
                         </td>
                     </tr>
                 <?php $i++;
                    endforeach; ?>
             </tbody>
         </table>
     </div>
     <!-- end content -->
 </div>
 <!-- /.container-fluid -->