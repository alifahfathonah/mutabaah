<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $title; ?></h5>
            </div>
            <div class="ibox-content">
                <div >
                    <?php if($feature['tambah']) : ?>
                        <button type="button" class="btn btn-outline btn-success dim"  data-placement="auto top" href="#modal-form" title="tambah" onclick="create()" data-toggle="modal"><i class="fa fa-plus"></i></button>
                    <?php endif; ?>
                    <?php if($feature['import'][0]) : ?>
                        <button type="button" class="btn btn-outline btn-primary dim"  data-placement="auto top" href="#modal-import" title="import" onclick="imp()" data-toggle="modal"><i class="fa fa-upload"></i></button>
                    <?php endif; ?>
                    <?php if($feature['refresh']) : ?>
                        <button type="button" class="btn btn-outline btn-info dim"  data-placement="auto top" title="refresh" onclick="refresh()" data-toggle="modal"><i class="fa fa-refresh"></i> </button>
                    <?php endif; ?>
                    <?php if($feature['hapusall']) : ?>
                        <button type="button" class="btn btn-outline btn-warning dim"  data-placement="auto top" title="hapus semua" onclick="truncate()" data-toggle="modal"><i class="fa fa-trash"></i></button>
                    <?php endif; ?>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover main" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <?php
                                    foreach($table['header'] as $th){
                                        echo "<th>$th</th>";
                                    }
                                ?>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-form" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:75%;">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b formtitle">Tambah <?php echo $title; ?></h3>
                        <form  action="#" id="form" class="form-horizontal">
                            <?php
                                $c=0;
                                foreach($form as $f){
                                    $left = 12;
                                    if($f['left']<$left){
                                        $left = $f['left'];
                                    }
                                    cell($f,++$c);
                                }
                            ?>
                            <div class="form-group">
                                <div class="col-sm-<?php echo 12-$left; ?> col-sm-offset-<?php echo $left;?>">
                                    <button type="button" class="btn btn-primary" id="btnSave" onclick="save()" tabindex="<?php echo ++$c; ?>">Simpan</button>
                                    <button class="btn btn-white" data-dismiss="modal" tabindex="<?php echo ++$c; ?>">Batalkan</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-detail" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:75%;">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b">Data <?php echo $title; ?></h3>
                        <form  action="#" id="formdetail" class="form-horizontal">
                            <?php
                                $c=0;
                                foreach($form as $f){
                                    $left = 12;
                                    if($f['left']<$left){
                                        $left = $f['left'];
                                    }
                                    if($f['type'] == 'text' || $f['type'] == 'number' || $f['type'] == 'select' || $f['type'] == 'date' || $f['type'] == 'email'  ){
                                        echo '<div class="form-group">';
                                        echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
                                        echo    '<div class="col-sm-'.$f['right'].'">';
                                        echo        '<input type="text" name="'.$f['name'].'" class="form-control" readonly tabindex="'.++$c.'">';
                                        echo    '</div>';
                                        echo '</div>';
                                    }
                                    else if($f['type'] == 'textarea' ){
                                        echo    '<div class="form-group">';
                                        echo      '<label class="control-label col-sm-'.$f['left'].'" for="'.$f['id'].'">'.$f['label'].' </label>';
                                        echo      '<div class="col-sm-'.$f['right'].'">';
                                        echo          '<textarea class="form-control" rows="'.$f['rows'].'" name = "'.$f['name'].'" id="'.$f['id'].'" readonly tabindex="'.++$c.'" >'.$f['value'].'</textarea>';
                                        echo    '</div>';
                                        echo  '</div>';
                                    }
                                    else if($f['type'] == 'image'){
                                        echo  '<div class="form-group" id="detail'.$f['id'].'">';
                                        echo    '<label class="control-label col-sm-'.$f['left'].'" ></label>';
                                        echo    '<div class="col-sm-'.$f['right'].'">';
                                        echo    '</div>';
                                        echo  '</div>';
                                    }
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($feature['import']) : ?>
<div id="modal-import" class="modal fade" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:75%;">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b formtitle">Import <?php echo $title; ?></h3>
                        <form  action="#" id="formimport" class="form-horizontal">
                            <?php

                                $c=0;
                                foreach($feature['import']['form'] as $f){
                                    $left = 12;
                                    if($f['left']<$left){
                                        $left = $f['left'];
                                    }
                                    cell($f,++$c);
                                }
                            ?>
                            <div class="form-group">
                                <div class="col-sm-<?php echo 12-$left; ?> col-sm-offset-<?php echo $left;?>">
                                    <p>untuk template import bisa di download <a href="<?php echo base_url($this->uri->segment(1)."/template");?>">disini</a></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-<?php echo 12-$left; ?> col-sm-offset-<?php echo $left;?>">
                                    <button type="button" class="btn btn-primary" id="btnUpload" onclick="upload()" tabindex="<?php echo ++$c; ?>">Simpan</button>
                                    <button class="btn btn-white" data-dismiss="modal" tabindex="<?php echo ++$c; ?>">Batalkan</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<script>
    var mode;
    var idupdate;
    var table;
    $(document).ready(function(){
        $('[data-toggle="modal"]').tooltip();
        $('[data-toggle="tooltip"]').tooltip();

        table = $('.main').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "paging": true,
            "order": [], //Initial no order.
            "autoWidth": false,
            "drawCallback": function( settings ) {

                $('[data-toggle="modal"]').tooltip();
                $('[data-toggle="tooltip"]').tooltip();
                // add as many tooltips you want
            },

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url($this->uri->segment(1).'/table')?>",
                "type": "POST",

            },
            "columnDefs": [{
                "targets": [ -1,0 ], //last column
                "orderable": false, //set not orderable
            },],
            pageLength: <?php echo $table['entries'];?>,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                    }
                }
            ]

        });
    });
    function save(){
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if(mode == 'create') {
            url = "<?php echo base_url($this->uri->segment(1).'/create')?>";
        }
        else if(mode == 'update'){
            url = "<?php echo base_url($this->uri->segment(1).'/update')?>/"+idupdate;
        }
        // ajax adding data to database
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data){

                if(data.status){ //if success close modal and reload ajax table
                    $('#modal-form').modal('hide');
                    table.ajax.reload(null,false);
                }

                $('#btnSave').text('simpan'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
                if(mode == 'create'){
                    swal("Sukses !", "Data Berhasil Ditambahkan!", "success");
                }
                else{
                    swal("Sukses !", "Data Berhasil Dirubah !", "success");
                }

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                  $('#btnSave').text('simpan'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }
    function upload(){
        $('#btnUpload').text('saving...'); //change button text
        $('#btnUpload').attr('disabled',true); //set button disable
        var url;

        url = "<?php echo base_url($this->uri->segment(1).'/import')?>/";
        // ajax adding data to database
        var formData = new FormData($('#formimport')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data){

                if(data.status){ //if success close modal and reload ajax table
                    $('#modal-import').modal('hide');
                    table.ajax.reload(null,false);
                }

                $('#btnUpload').text('simpan'); //change button text
                $('#btnUpload').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error adding / update data');
                  $('#btnImport').text('simpan'); //change button text
                $('#btnImport').attr('disabled',false); //set button enable

            }
        });
    }

    function create(){

        mode = "create";
        $('#form')[0].reset(); // reset form on modals
        <?php
            foreach($form as $f){
                if($f['type'] == 'image'){
                    echo "$('#form".$f['id']." div').html('<img id=\"fileimage".$f['id']."\" width=\"113px\" height=\"151px\" src=\"'+'".base_url("assets/ass_admin/images/noimg.png")."\" >');";
                }
                echo PHP_EOL;
            }
        ?>
        $('.formtitle').text('Tambah <?php echo $title ?>'); // Set Title to Bootstrap modal title
    }
    function read(id){
        $.ajax({
            url : "<?php echo base_url($this->uri->segment(1).'/read')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                <?php
                    foreach($form as $f){
                        if($f['type'] == 'text' || $f['type'] == 'number' || $f['type'] == 'select' || $f['type'] == 'textarea'|| $f['type'] == 'date' ||$f['type'] == 'email'  ){
                            echo '$(\'[name="'.$f['name'].'"]\').val(data[0].'.$f['name'].'); ';
                        }
                        else if($f['type'] == 'image'){
                            echo "if(data[0].".$f['name']."){ ";
                            echo PHP_EOL;
                            echo "$('#detail".$f['id']." div').html('<img width=\"113px\" height=\"151px\" src=\"'+'".base_url()."'+data[0].".$f['id']."+'\" >');";
                            echo PHP_EOL;
                            echo "}";
                        }
                        echo PHP_EOL;
                    }
                ?>
               $('#modal-detail').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }

    function update(id){
        mode = "update";
        idupdate = id;
        $('#form')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url($this->uri->segment(1).'/edit')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                <?php
                    foreach($form as $f){
                        if($f['type'] == 'text' || $f['type'] == 'number' || $f['type'] == 'select' || $f['type'] == 'textarea' || $f['type'] == 'email' ){
                            echo '$(\'[name="'.$f['name'].'"]\').val(data[0].'.$f['name'].'); ';
                        }
                        else if($f['type'] == 'image'){
                            echo "if(data[0].".$f['name']." != ''){ ";
                            echo PHP_EOL;
                            echo "$('#form".$f['id']." div').html('<img id=\"fileimage".$f['id']."\" width=\"113px\" height=\"151px\" src=\"'+'".rtrim(base_url(),"/")."'+data[0].".$f['id']."+'\" >');";
                            echo PHP_EOL;
                            echo "}";
                            echo PHP_EOL;
                            echo "else {";
                            echo PHP_EOL;
                            echo "$('#form".$f['id']." div').html('<img id=\"fileimage".$f['id']."\" width=\"113px\" height=\"151px\" src=\"'+'".rtrim(base_url(),"/")."'+'/assets/ass_admin/images/noimg.png'+'\" >');";
                            echo PHP_EOL;
                            echo "}";
                        }
                        else if($f['type'] == 'date'){
                            echo "var tanggal = data[0].".$f['name'].";";
                            echo "var ardate  = tanggal.split('-');";
                            echo "var year = ardate[0];";
                            echo "var month = ardate[1];";
                            echo "var day = ardate[2];";

                            echo "var dmy = ardate[2]+'-'+ardate[1]+'-'+ardate[0]; ";
                            echo "$('#".$f['id']." .input-group.date').datepicker('setDate',dmy);";

                           // echo '$(\'[name="'.$f['name'].'"]\').datepicker().val(data[0].'.$f['name'].'); ';
//                            echo '$(\'[name="'.$f['name'].'"]\').datepicker(\'setDate\',data[0].'.$f['name'].'); ';
                        }
                        echo PHP_EOL;
                    }
                ?>
                $('#modal-form').modal('show'); // show bootstrap modal when complete loaded
                $('.formtitle').text('Edit <?php echo $title ?>'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    }
    function del(id,a,b){
        swal({
            title: "Apakah anda yakin ingin menghapus data "+a+" "+b+" ?",
            text: "You will not be able to recover this data !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !",
            cancelButtonText: "No, cancel please !",
            closeOnConfirm: false,
            closeOnCancel: false },
            function (isConfirm) {
                if (isConfirm) {
                $.ajax({
                    url : "<?php echo base_url($this->uri->segment(1).'/delete')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        //if success reload ajax table
                        swal("Deleted!", "Penghapusan sukses !", "success");
                        table.ajax.reload(null,false); //reload datatable ajax

                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        swal("Error", "Terjadi kesalahan ketika melakukan penghapusan !", "error");
                    }
                });
                } else {
                    swal("Canceled", "Penghapusan Dibatalkan !", "error");
                }
            });
    }
    function imp(id){

        mode = "import";
        $('#formimport')[0].reset(); // reset form on modals
        $('.formtitle').text('Import <?php echo $title ?>'); // Set Title to Bootstrap modal title
    }
    function toggle(id){
        $.ajax({
            url : "<?php echo base_url($this->uri->segment(1).'/toggle')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data){
                table.ajax.reload(null,false); //reload datatable ajax
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error updating data');
            }
        });
    }
    function truncate(){
        swal({
            title: "Apakah anda yakin ingin menghapus tabel <?php echo $title?> ?",
            text: "You will not be able to recover these data !",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete all !",
            cancelButtonText: "No, cancel please !",
            closeOnConfirm: false,
            closeOnCancel: false },
            function (isConfirm) {
                if (isConfirm) {
                $.ajax({
                    url : "<?php echo base_url($this->uri->segment(1).'/truncate')?>/",
                    type: "POST",
                    dataType: "JSON",
                    success: function(data){
                        //if success reload ajax table
                        swal("Deleted!", "Penghapusan sukses !", "success");
                        table.ajax.reload(null,false); //reload datatable ajax

                    },
                    error: function (jqXHR, textStatus, errorThrown){
                        swal("Error", "Terjadi kesalahan ketika melakukan penghapusan !", "error");
                    }
                });
                } else {
                    swal("Canceled", "Penghapusan Dibatalkan !", "error");
                }
            }
        );
    }
    function refresh(){
        //reload datatable ajax
        table.ajax.reload(null,false);
    }

</script>

<?php

    function dmy($d){
        $a = exlpode($d,'-');
        return $a[2]."-".$a[1]."-".$a[0];
    }

    function cell($f,$c){
        if($f['type'] == 'text'){
            echo '<div class="form-group">';
            echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
            echo    '<div class="col-sm-10">';
            echo        '<input placeholder="'.$f['placeholder'].'" type="text" name="'.$f['name'].'" id="'.$f['id'].'" value="'.$f['value'].'" class="form-control" tabindex="'.$c.'">';
            echo    '</div>';
            echo '</div>';
        }
        else if($f['type'] == 'email'){
            echo '<div class="form-group">';
            echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
            echo    '<div class="col-sm-10">';
            echo        '<input placeholder="'.$f['placeholder'].'" type="email" name="'.$f['name'].'" id="'.$f['id'].'" value="'.$f['value'].'" class="form-control" tabindex="'.$c.'">';
            echo    '</div>';
            echo '</div>';
        }
        else if($f['type'] == 'password'){
            echo '<div class="form-group">';
            echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
            echo    '<div class="col-sm-10">';
            echo        '<input placeholder="'.$f['placeholder'].'" type="password" name="'.$f['name'].'" id="'.$f['id'].'" value="'.$f['value'].'" class="form-control" tabindex="'.$c.'">';
            echo    '</div>';
            echo '</div>';
        }
        else if($f['type'] == 'number'){
            echo '<div class="form-group">';
            echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
            echo    '<div class="col-sm-10">';
            echo        '<input placeholder="'.$f['placeholder'].'" type="number" name="'.$f['name'].'" id="'.$f['id'].'" value="'.$f['value'].'" class="form-control" tabindex="'.$c.'">';
            echo    '</div>';
            echo '</div>';
        }
        else if($f['type'] == 'select'){
            echo '<div class="form-group">';
            echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
            echo    '<div class="col-sm-10">';
            echo        '<select class="form-control" name="'.$f['name'].'" id="'.$f['id'].'" tabindex="'.$c.'">';
            echo            '<option '.($f['value'] == '' ? 'selected' : '').' hidden disabled> - Pilih '.$f['label'].' - </option>';
            foreach($f['option'] as $option){
                echo '<option '.($option[$f['valname']] == $f['value'] ? 'SELECTED' : '').' value="'.$option[$f['valname']].'"  >'.$option[$f['optname']].'</option>';
            }
            echo        '</select>';
            echo    '</div>';
            echo '</div>';
        }
        else if($f['type'] == "textarea"){
            echo    '<div class="form-group">';
            echo      '<label class="control-label col-sm-'.$f['left'].'" for="'.$f['id'].'">'.$f['label'].' </label>';
            echo      '<div class="col-sm-'.$f['right'].'">';
            echo          '<textarea class="form-control" rows="'.$f['rows'].'" name = "'.$f['name'].'" id="'.$f['id'].'" >'.$f['value'].'</textarea>';
            echo    '</div>';
            echo  '</div>';
        }
        else if($f['type'] == 'file'){
            echo '<div class="form-group">';
            echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
            echo    '<div class="col-sm-'.$f['right'].'">';
            echo '<div class="fileinput fileinput-new input-group" data-provides="fileinput">';
            echo    '<div class="form-control" data-trigger="fileinput">';
            echo        '<i class="glyphicon glyphicon-file fileinput-exists"></i>';
            echo        '<span class="fileinput-filename"></span>';
            echo    '</div>';
            echo    '<span class="input-group-addon btn btn-default btn-file">';
            echo    '<span class="fileinput-new">Select file</span>';
            echo    '<span class="fileinput-exists">Change</span>';
            echo        '<input accept="'.implode(",",$f['accept']).'" type="file" name="'.$f['name'].'" id="'.$f['id'].'" tabindex="'.$c.'"/>';
            echo    '</span>';
            echo    '<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>';
            echo '</div>';
            echo    '</div>';
            echo '</div>';
        }
        else if($f['type'] == "image"){
            echo  '<div class="form-group" id="form'.$f['id'].'">';
            echo    '<label class="control-label col-sm-'.$f['left'].'" ></label>';
            echo    '<div class="col-sm-'.$f['right'].'">';
            echo        '<img src="'.($f['value'] == "" ? base_url("assets/ass_admin/images/noimg.png") : base_url($f['value'])).'" width="113px" height="151px" id="fileimage'.$f['id'].'">';
            echo    '</div>';
            echo  '</div>';
            echo    '<div class="form-group">';
            echo      '<label class="control-label col-sm-'.$f['left'].'" for="'.$f['id'].'">'.$f['label'].' </label>';
            echo      '<div class="col-sm-'.$f['right'].'">';
            echo          '<label class="btn btn-default">';
            echo        '<input type="file" name = "'.$f['name'].'" id="'.$f['id'].'" hidden>';
            echo      '</label>';
            echo    '</div>';
            echo  '</div>';
            echo '<script> ';
            echo PHP_EOL;
            echo    'function readURL'.$f['id'].'(input) { ';
            echo PHP_EOL;
            echo        'if (input.files && input.files[0]) { ';
            echo PHP_EOL;
            echo        'var reader = new FileReader(); ';
            echo PHP_EOL;
            echo      'reader.onload = function(e) { ';
            echo PHP_EOL;
            echo        '$("#fileimage'.$f['id'].'").attr("src", e.target.result); ';
            echo PHP_EOL;
            echo        '} ';
            echo PHP_EOL;
            echo      'reader.readAsDataURL(input.files[0]); ';
            echo PHP_EOL;
            echo    '} ';
            echo PHP_EOL;
            echo    '} ';
            echo PHP_EOL;
            echo  '$("#'.$f['id'].'").change(function() { ';
            echo PHP_EOL;
            echo        'readURL'.$f['id'].'(this); ';
            echo PHP_EOL;
            echo  '}); ';
            echo PHP_EOL;
            echo '</script>';
        }
        else if($f['type'] == "date"){

            echo '<div class="form-group" id="'.$f['id'].'">';
            echo    '<label class="col-sm-'.$f['left'].' control-label">'.$f['label'].'</label>';
            echo    '<div class="col-sm-'.$f['right'].'">';
            echo    '<div class=" input-group date ">';
            echo        '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>';
            echo        '<input type="text" name = "'.$f['name'].'" class="form-control" value="'.$f['value'].'">';
            echo    '</div>';
            echo    '</div>';
            echo '</div>';
            echo '<script>';
            echo "$(document).ready(function(){";

            if($f['view'] == "decade"){
                echo "$('#".$f['id']." .input-group.date').datepicker({";
                echo    "format: 'dd-mm-yyyy',";
                echo    'startView: 2,';
                echo    'todayBtn: "linked",';
                echo    'keyboardNavigation: false,';
                echo    'forceParse: false,';
                echo    'autoclose: true';
                echo '});';
            }
            echo '});';
            echo '</script>';
        }
    }
?>
