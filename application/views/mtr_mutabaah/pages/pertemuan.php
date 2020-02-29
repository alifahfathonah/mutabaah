<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List pertemuan</h3>
                    </div>

                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-1">

                            <a class="btn btn-sm btn-default" href="<?php echo $content['back_url']?>" title="Edit">
                            <i class="glyphicon glyphicon-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-xs-5">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                Create
                            </button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" style="width:100%" class="table table-bordered table-striped display nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kelompok</th>
                                    <th>Tanggal</th>
                                    <th>Materi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Pertemuan</h4>
            </div>
            <div class="modal-body" id="create">

                <form action="#" role="form" id="form_pertemuan" class="form-horizontal">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="tanggal" class="col-sm-2 control-label">Tanggal pertemuan</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tanggal" placeholder="Tanggal pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="materi_pertemuan" class="col-sm-2 control-label">Judul Materi</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="materi_pertemuan" placeholder="materi_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tilawah_pertemuan" class="col-sm-2 control-label">Tilawah</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tilawah_pertemuan" placeholder="tilawah_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mc_pertemuan" class="col-sm-2 control-label">MC</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mc_pertemuan" placeholder="mc_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kultum_pertemuan" class="col-sm-2 control-label">Kultum</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kultum_pertemuan" placeholder="kultum_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="infaq_pertemuan" class="col-sm-2 control-label">Infaq</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="infaq_pertemuan" placeholder="infaq_pertemuan">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="add()">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Pertemuan</h4>
            </div>
            <div class="modal-body" id="create">

                <form action="#" role="form" id="form_edit" class="form-horizontal">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="tanggal" class="col-sm-2 control-label">Tanggal pertemuan</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tanggalE" placeholder="Tanggal pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="materi_pertemuan" class="col-sm-2 control-label">Judul Materi</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="materi_pertemuanE" placeholder="materi_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tilawah_pertemuan" class="col-sm-2 control-label">Tilawah</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="tilawah_pertemuanE" placeholder="tilawah_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mc_pertemuan" class="col-sm-2 control-label">MC</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mc_pertemuanE" placeholder="mc_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kultum_pertemuan" class="col-sm-2 control-label">Kultum</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kultum_pertemuanE" placeholder="kultum_pertemuan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="infaq_pertemuan" class="col-sm-2 control-label">Infaq</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="infaq_pertemuanE" placeholder="infaq_pertemuan">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="idpertemuan">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="update_pertemuan()">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    

    function add() {
        var data_form = {
            waktu_pertemuan: $('#tanggal').val(),
            materi_pertemuan: $('#materi_pertemuan').val(),
            tilawah_pertemuan: $('#tilawah_pertemuan').val(),
            mc_pertemuan: $('#mc_pertemuan').val(),
            kultum_pertemuan: $('#kultum_pertemuan').val(),
            infaq_pertemuan: $('#infaq_pertemuan').val(),
            mentoring_idmentoring: <?php echo $content['idmentoring']?> ,
        };

        $.ajax({
            cache: false,
            url: "<?php echo base_url($this->uri->segment(1)."/input_pertemuan");?>",
            type: "POST",
            data: data_form,
        }).done(function(data) {
            $('#modal-default').modal('hide');
            $('#form_pertemuan')[0].reset();
            table.ajax.reload(null, false);
            if (data.status == true) {
                swal({
                    title: "Good job!",
                    text: "Data Berhasil di Submit!",
                    icon: "success",
                });
            }
        }).fail(function(jqXHR, textStatus) {
            swal({
                title: "Waduh!",
                text: "Data Gagal di Submit!",
                icon: "error",
            });
        });

    }

    function update_pertemuan() {
        var data_form = {
            waktu_pertemuan: $('#tanggalE').val(),
            materi_pertemuan: $('#materi_pertemuanE').val(),
            tilawah_pertemuan: $('#tilawah_pertemuanE').val(),
            mc_pertemuan: $('#mc_pertemuanE').val(),
            kultum_pertemuan: $('#kultum_pertemuanE').val(),
            infaq_pertemuan: $('#infaq_pertemuanE').val(),
            mentoring_idmentoring: <?php echo $content['idmentoring']?> ,
        };

        $.ajax({
            cache: false,
            url: "<?php echo base_url($this->uri->segment(1));?>" + "/edit_mutabaah/" + $('#idpertemuan').val(),
            type: "POST",
            data: data_form,
        }).done(function(data) {
            $('#modal-edit').modal('hide');
            $('#form_pertemuan')[0].reset();
            table.ajax.reload(null, false);
            if (data.status == true) {
                swal({
                    title: "Good job!",
                    text: "Data Berhasil di Submit!",
                    icon: "success",
                });
            }
        }).fail(function(jqXHR, textStatus) {
            swal({
                title: "Waduh!",
                text: "Data Gagal di Submit!",
                icon: "error",
            });
        });
    }

    function edit_pertemuan(id) {
        $('#form_edit')[0].reset(); 
        $.ajax({
            url: "<?php echo base_url($this->uri->segment(1)."/pertemuan_by_id");?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#tanggalE').val(data.data.pertemuan.waktu_pertemuan);
                $('#materi_pertemuanE').val(data.data.pertemuan.materi_pertemuan);
                $('#tilawah_pertemuanE').val(data.data.pertemuan.tilawah_pertemuan);
                $('#mc_pertemuanE').val(data.data.pertemuan.mc_pertemuan);
                $('#kultum_pertemuanE').val(data.data.pertemuan.kultum_pertemuan);
                $('#infaq_pertemuanE').val(data.data.pertemuan.infaq_pertemuan);
                $('#idpertemuan').val(id);
                $('#modal-edit').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
</script>