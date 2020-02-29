<script src="<?php echo base_url('assets/ass_mentoring/fsi_user/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/ass_admin/templates/'); ?>js/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<!-- jvectormap -->
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<!-- FastClick -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/dist/js/demo.js"></script>
<!-- InputMask -->
<!-- DataTables -->
<script src="<?php echo base_url('assets/ass_mentoring/');?>fsi_user/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

var save_method; //for save method string
var table;
$(document).ready(function() {
        $('#tanggal').datepicker({
            autoclose: true,
            todayHighlight: true,  
            format: "yyyy-mm-dd",
        })
    });
$(document).ready(function() {

    // $('.select2').select2();
    $('.js-example-basic-single').select2({ dropdownParent: ".modal-content" });

    //datatables
    table = $('#example1').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        "responsive" : true,
        "scrollX": true,
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url($this->uri->segment(1).'/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

});


</script>
<script>

</script>
</body>