/* ======================================================================================
   KONFIRMASI
   ====================================================================================== */

function konfirmasi(jenis, parameter_id, kontrol){
  Swal.fire({
      title: 'Anda Yakin Menghapus Data '+ jenis + ' Nomor ' + parameter_id,
      text: "Data yang terhapus tidak dapat dikembalikan",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus data ini!'
  }).then((result) => {
      if (result.isConfirmed) {
          window.location.href = kontrol;
      }
  })
}

/* ======================================================================================
   SUMMER NOTE
   ====================================================================================== */
    $('#summernote').summernote();

    $('#compose-textarea').summernote();

/* ======================================================================================
   EDIT PREVIEW
   ====================================================================================== */
    $('document').ready(function() {
      $("#imgload").change(function() {
          console.log("Edit Logo");
          if (this.files && this.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#imgshow').attr('src', e.target.result);
              }
              reader.readAsDataURL(this.files[0]);
          }
      });
    });

/* ======================================================================================
   TOOLTIPS
   ====================================================================================== */
$('[data-toggle="tooltip"]').tooltip();

$(function () {
  /* ======================================================================================
      TABLE
     ====================================================================================== */
  $("#example1").DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });

  $('#example3').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });

  /* ======================================================================================
   LAST TAB
   ====================================================================================== */

  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      localStorage.setItem('lastTab', $(this).attr('href'));
  });
  var lastTab = localStorage.getItem('lastTab');

  if (lastTab) {
      /* console.log(lastTab); */
      $('[href="' + lastTab + '"]').tab('show');
  }

  /* ======================================================================================
   TOAST DAN SWAL
   ====================================================================================== */

  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
    
  $('.swalDefaultSuccess').click(function() {
    Toast.fire({
      icon: 'success',
      title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });


  /* ======================================================================================
   VALIDASI
   ====================================================================================== */

  $('#profile').validate({
    rules: {
        nama: {
            required: true,
          },  
          user: {
            required: true,
          },  
        visi: {
            required: true,
          },  
        keterangan: {
            required: true,
          },  
        judul: {
            required: true,
          },  
        kategori: {
            required: true,
          },  
        alamat: {
            required: true,
          },  
        kota: {
            required: true,
          },  
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
    },
    messages: {
        nama: {
            required: "Isikan nama",
          },
        user: {
            required: "Isikan User Name",
          },
        visi: {
            required: "Isikan visi daerah",
          },
        keterangan: {
            required: "Isikan Keterangan",
          },
        kategori: {
            required: "Pilih Kategori",
          },
        judul: {
            required: "Isikan Judul",
          },
        alamat: {
            required: "Isikan Alamat",
          },
        kota: {
            required: "Isikan nama kota",
          },
      email: {
        required: "Isikan alamat email",
        email: "Isikan alamat email yang valid"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

  /* ======================================================================================
   PREVIEW
   ====================================================================================== */
   
});