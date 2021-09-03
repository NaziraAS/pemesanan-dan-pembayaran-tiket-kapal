 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; Your Website 2020</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->
 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('Auth/logout') ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>
 <!-- Optional JavaScript; choose one of the two! -->


 <script src="<?= base_url('sources/js/'); ?>jquery.js"></script>
 <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> -->
 <script src="<?= base_url('sources/bootstrap/'); ?>js/bootstrap.bundle.min.js"></script>
 <!-- <script src="<?= base_url('sources/sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script> -->
 <script src="<?= base_url('sources/sbadmin/'); ?>js/sb-admin-2.min.js"></script>
 <script src="<?= base_url('sources/bootstrap/'); ?>js/bootstrap.min.js"></script>
 <script src="<?= base_url('js/sw/sweetalert2.all.js') ?>"></script>
 <script src="<?= base_url('sources/js/script.js'); ?>"></script>
 <script>
     let base_url = 'http://localhost/tiket_kapal/'
     //  event on click
     $('.send').on('click', function(e) {
         e.preventDefault();
         let message = $('#message').val();
         let id = $('#id').val();
         $('#message').val('');
         //  console.log(id);
         $.ajax({
             url: 'Chat/chatsave',
             data: {
                 message,
                 id
             },
             type: 'POST',
             success: function(data) {
                 console.log('berhasil');
                 //  //  let d = data;
                 //  $.each(data, function(i, d) {
                 //      $('#content').append(`<div class="row justify-content-end">
                 //      <div class="col-md-6 mt-3">
                 //      <input type="text" class="form-control" value="${d.pesan}">
                 //      </div>
                 //      </div>`);
                 //  })
             }
         });
         //  ajax tampil data
         $.ajax({
             url: 'Chat/getPesan',
             type: 'GET',
             dataType: 'JSON',
             success: function(data) {
                 //  console.log(data);
                 $.each(data, function(i, d) {
                     $('#content').append(`<div class="row justify-content-end">
                      <div class="col-md-6 mt-3">
                      <input type="text" class="form-control" value="${d.pesan}">
                      </div>
                      </div>`);
                 })
             }
         });
     });
     //  akhir event on click
     // event on load
     $(document).ready(function() {
         $.ajax({
             url: 'Chat/getPesanAll',
             type: 'GET',
             dataType: 'JSON',
             success: function(data) {
                 //  console.log(data);
                 $.each(data, function(i, d) {
                     //  console.log(d);
                     $('#content').append(`<div class="row justify-content-end">
                      <div class="col-md-6 mt-3">
                      <input type="text" class="form-control" value="${d.pesan}">
                      </div>
                      </div>`);
                 })
             }
         });
     });
     // akir event on load
     //  $(document).ready(function() {
     //      let id = $('#id').val();
     //      console.log(id);
     //  });

     //  sweet alert
     $('.hapus').on('click', function(e) {
         e.preventDefault();
         var href = $(this).attr('href');
         Swal.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya, Hapus!',
             cancelButtonText: 'Batal'
         }).then((result) => {
             if (result.value) {
                 document.location.href = href;
             }
         })
     })
     //  akhir sweet alert
     //  cek gambar sudah di upload dan tampilkan notif
     $(document).ready(function() {
         let id = $('#id_pembayaran').data('id');
         console.log(id);

         $.ajax({
             url: base_url + 'Admin/cekGambar',
             data: {
                 id: id
             },
             type: 'POST',
             dataType: 'JSON',
             success: function(data) {
                 console.log(data);
             }
         });
     })
     //  akhir cek gambar sudah di upload dan tampilkan notif
 </script>
 </body>

 </html>