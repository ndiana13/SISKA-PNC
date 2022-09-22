
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>

<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false ,
      "responsive": true,
    });
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.alert_konfirmasi').on('click', function() {
      var getLink = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data anda tidak dapat dikembalikan !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Data ini!',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {

          window.location.href = getLink

        }
      })
      return false;
    });
  });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.alert_confirm').on('click', function() {
      var getLink = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data anda tidak dapat diubah !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Terima!',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {

          window.location.href = getLink

        }
      })
      return false;
    });
  });
</script>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('.alert_decline').on('click', function() {
      var getLink = $(this).attr('href');
      Swal.fire({
        title: 'Apakah Anda Yakin ?',
        text: "Data anda tidak dapat diubah !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Tolak!',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {

          window.location.href = getLink

        }
      })
      return false;
    });
  });
</script>

<script>
  $('.summernote').summernote({
  height: 150,   //set editable area's height
  codemirror: { // codemirror options
    theme: 'monokai'
  }
});
  $(function () {
    // Summernote
    $('#summernote1').summernote();
    $('#summernote2').summernote();
    $('#summernote3').summernote();
    $('#summernote4').summernote();
    $('#summernote5').summernote();
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  });
  
</script> 

<!-- SWEETALERT NOTIFIKASI LOGIN-->
<?php if ($_SESSION['alert_login'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Berhasil Login'
    })
  </script>
  <?php $_SESSION['alert_login'] = 'default'; ?>
<?php  } ?>

<!-- SWEETALERT NOTIFIKASI -->
<?php if ($_SESSION['alert_profil'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Berhasil Ubah Profil'
    })
  </script>

  <?php $_SESSION['alert_profil'] = 'default'; ?>
<!-- ALERT PROFIL -->
<?php  }elseif ($_SESSION['alert_profil'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Gagal Ubah Profil'
    })
  </script>
  <?php $_SESSION['alert_profil'] = 'default'; ?>
<?php } ?>
<!-- ALERT PASSWORD -->
<?php if ($_SESSION['alert_password'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Berhasil Ubah Password'
    })
  </script>

  <?php $_SESSION['alert_password'] = 'default'; ?>

<?php  }elseif ($_SESSION['alert_password'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Gagal Ubah Password'
    })
  </script>
  <?php $_SESSION['alert_password'] = 'default'; ?>
<?php } ?>

<?php if ($_SESSION['alert_tambah'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Berhasil Menambah Data'
    })
  </script>

  <?php $_SESSION['alert_tambah'] = 'default'; ?>

<?php  }elseif ($_SESSION['alert_tambah'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Gagal Menambahkan Data'
    })
  </script>
  <?php $_SESSION['alert_tambah'] = 'default'; ?>
<?php } ?>

<?php if ($_SESSION['alert_no_sp'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'info',
      title: 'No SP Sudah Ada'
    })
  </script>

  <?php $_SESSION['alert_no_sp'] = 'default'; ?>

<?php  } ?>

<?php if ($_SESSION['alert_edit'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Berhasil Edit Data'
    })
  </script>

  <?php $_SESSION['alert_edit'] = 'default'; ?>

<?php  }elseif ($_SESSION['alert_edit'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Gagal Edit Data'
    })
  </script>
  <?php $_SESSION['alert_edit'] = 'default'; ?>
<?php } ?>

<?php if ($_SESSION['alert_hapus'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Berhasil Hapus Data'
    })
  </script>

  <?php $_SESSION['alert_hapus'] = 'default'; ?>

<?php  }elseif ($_SESSION['alert_hapus'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Gagal Hapus Data'
    })
  </script>
  <?php $_SESSION['alert_hapus'] = 'default'; ?>
<?php } ?>

<?php if ($_SESSION['alert_import'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Import Data Berhasil'
    })
  </script>

  <?php $_SESSION['alert_import'] = 'default'; ?>

<?php  } ?>

<?php if ($_SESSION['alert_acc'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Data Berhasil Diterima'
    })
  </script>

  <?php $_SESSION['alert_acc'] = 'default'; ?>

<?php  }elseif ($_SESSION['alert_acc'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Data Gagal Diterima'
    })
  </script>
  <?php $_SESSION['alert_acc'] = 'default'; ?>
<?php } ?>

<?php if ($_SESSION['alert_dec'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Data Berhasil Ditolak'
    })
  </script>

  <?php $_SESSION['alert_dec'] = 'default'; ?>

<?php  }elseif ($_SESSION['alert_dec'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Data Gagal Ditolak'
    })
  </script>
  <?php $_SESSION['alert_dec'] = 'default'; ?>
<?php } ?>

<?php if ($_SESSION['alert_sk'] == 'true') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'success',
      title: 'Berhasil Buat SK'
    })
  </script>

  <?php $_SESSION['alert_sk'] = 'default'; ?>

<?php  }elseif ($_SESSION['alert_sk'] == 'false') { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 5000
    });
    Toast.fire({
      icon: 'error',
      title: 'Gagal Buat SK'
    })
  </script>
  <?php $_SESSION['alert_sk'] = 'default'; ?>
<?php } ?>