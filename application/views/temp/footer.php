<footer class="main-footer text-sm">
    <strong>Copyright &copy; 2014-2021 <span class="text-primary"><?= strtoupper($this->db->get("profile")->row()->nama); ?></span>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1.0
    </div>
</footer>
</div>

<script src="<?= base_url('assets/vendors/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-ui/jquery-ui.min.js') ?>"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= base_url('assets/vendors/bootstrap4/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-validation/additional-methods.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/chart.js/Chart.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/sparklines/sparkline.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-knob/jquery.knob.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/vendors/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/summernote/summernote-bs4.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/toastr/toastr.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/ekko-lightbox/ekko-lightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/js/adminlte.js') ?>"></script>
<script src="<?= base_url('assets/vendors/filterizr/jquery.filterizr.min.js') ?>"></script>
<script src="<?= base_url('assets/js/mine.js') ?>"></script>
<script>
    $(function() {
        bsCustomFileInput.init();

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        <?php if ($this->session->flashdata('text')) { ?>
            Toast.fire({
                icon: '<?= $this->session->flashdata('icon') ?>',
                title: '<?= $this->session->flashdata('text') ?>'
            })
        <?php }; ?>

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });

        $('.checkbox-toggle').click(function() {
            var clicks = $(this).data('clicks')
            if (clicks) {
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
            } else {
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
            }
            $(this).data('clicks', !clicks)
        })

        $('.mailbox-star').click(function(e) {
            e.preventDefault()
            var $this = $(this).find('a > i')
            var fa = $this.hasClass('fa')

            if (fa) {
                $this.toggleClass('fa-star')
                $this.toggleClass('fa-star-o')
            }
        })
    });
</script>
</body>

</html>