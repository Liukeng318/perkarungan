(function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $('#example3').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });

    $("#tabel").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#tabel_wrapper .col-md-6:eq(0)');

    $("#tabel1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#tabel1_wrapper .col-md-6:eq(0)');

    $("#tabel2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#tabel2_wrapper .col-md-6:eq(0)');

    $("#tabel3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "searching":false, "paging":false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#tabel3_wrapper .col-md-6:eq(0)');
})();

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

$(function() {
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      localStorage.setItem('lastTab', $(this).attr('href'));
  });
  var lastTab = localStorage.getItem('lastTab');

  if (lastTab) {
      $('[href="' + lastTab + '"]').tab('show');
  }

  $('[data-toggle="tooltip"]').tooltip();

  $('.select2').select2();
  
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  });

  $(".editTrans-dialog").click(function () {
      var my_id_value = $(this).data('kode');
      var my_tanggal_value = $(this).data('tanggal');
      var my_uraian_value = $(this).data('uraian');
      var my_jumlah_value = $(this).data('jumlah');
      var my_sumber_value = $(this).data('sumber');

      $(".modal-body #kode").val(my_id_value);
      $(".modal-body #kodelama").val(my_id_value);
      $(".modal-body #tanggal").val(my_tanggal_value);
      $(".modal-body #uraian").val(my_uraian_value);
      $(".modal-body #jumlah").val(my_jumlah_value);
      $(".modal-body #sumber").val(my_sumber_value);
      
  });

  $(document).ready(function() {
    
    $('table.display').DataTable();

    /* var t = $('#example3').DataTable();
    var counter = 1;

    $('#addRow').on('click', function() {
        var inputBahan = document.getElementById("kategoribahan").value;
        var inputJumlah = document.getElementById("jumlah").value;
        var inputSatuan = document.getElementById("satuan").value;
        var inputHarga = document.getElementById("harga").value;
        var total = inputJumlah * inputHarga;

        t.row.add([
            inputBahan,
            inputJumlah,
            inputSatuan,
            inputHarga,
            total,
            ''
        ]).draw(false);

        counter++;
    });
    
    $('#example3 tbody').on('click', 'tr', function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            t.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $('#example3 tbody').on('dblclick', 'tr', function() {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            t.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
        t.row('.selected').remove().draw(false);
    });

    $('#hapus').click(function() {
        t.row('.selected').remove().draw(false);
    });

    $('#simpan').click(function() {
      var tanggal    = document.getElementById("tanggal").value
      var nonota     = document.getElementById("nonota").value
      var bayar      = document.getElementById("pembayaran").value
      var keterangan = document.getElementById("keterangan").value
      var rincian    = [];

      if(nonota.length<=0){
        Swal.fire('Nomor Nota Wajib Diisi')
      }else if(bayar == 'Jenis Pembayaran...'){
        Swal.fire('Pilih Jenis Pembayarannya Dulu Ya Bos...')
      }else{
        var f = t.rows().data();;
          for(var i=0 ; f.length>i;i++){
            var n = f[i].length;
            for(var j = 0 ; n>j;j++){
              alert(f[i][j])
              rincian[i][j] ==  f[i][j]
            }
          }
          console.log(result)
          for(var i = 0; i < rincian.length; i++) {
            alert(rincian[0][0])
        }
      }
    }); */
    /* var groupColumn = 2;
    var table = $('#example').DataTable({
        "columnDefs": [{
            "visible": false,
            "targets": groupColumn
        }],
        "order": [
            [groupColumn, 'asc']
        ],
        "displayLength": 10,
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var last = null;

            api.column(groupColumn, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before(
                        '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                    );

                    last = group;
                }
            });
          }
      }); */
    });
});