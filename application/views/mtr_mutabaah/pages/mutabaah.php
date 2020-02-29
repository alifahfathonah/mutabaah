<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Mutabaah</h3>
                    </div>

                    <div class="row">
                        <div class="col-xs-5 col-xs-offset-1">

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
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body" id="create">

                <form action="#" role="form" id="form_mutabaah" class="form-horizontal">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="pertemuan_idpertemuan" class="col-sm-2 control-label">Pertemuan</label>

                            <div class="col-sm-10">
                                <input list="pertemuan_idpertemuans" class="form-control" id="pertemuan_idpertemuan" name="pertemuan_idpertemuan" />
                                <datalist id="pertemuan_idpertemuans" style="display: none;">
                                    <?php 
                            foreach($content['pertemuan'] as $pertemuan){
                              echo '<option data-value="'.$pertemuan["idpertemuan"].'" value="'.$pertemuan["absen"].'">';
                            }
                          ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="terlambat" class="col-sm-2 control-label">Terlambat</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="terlambat" placeholder="Menit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tilawah" class="col-sm-2 control-label">Tilawah</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="tilawah" placeholder="Halaman">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hafalan" class="col-sm-2 control-label">Hafalan</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="hafalan" placeholder="hafalan">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="puasa" class="col-sm-2 control-label">Puasa</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="puasa" placeholder="Puasa Sunnah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qiamulail" class="col-sm-2 control-label">Qiamulail</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="qiamulail" placeholder="Dalam Seminggu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="baca_buku" class="col-sm-2 control-label">Baca Buku</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="baca_buku" placeholder="Baca Buku">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="memberi_hadiah" class="col-sm-2 control-label">Memberi Hadiah</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="memberi_hadiah" placeholder="Memberi Hadiah">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sodaqoh" class="col-sm-2 control-label">Sodaqoh</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="sodaqoh" placeholder="Sodaqoh">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_islam" class="col-sm-2 control-label">Berita Islam</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="update_berita_islam" placeholder="Berita Islam">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_nasional" class="col-sm-2 control-label">Berita Nasional</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="update_berita_nasional" placeholder="Berita Nasional">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_internasional" class="col-sm-2 control-label">Berita Internasional</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="update_berita_internasional" placeholder="Berita Internasional">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="olahraga" class="col-sm-2 control-label">Olahraga</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="olahraga" placeholder="Olahraga">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
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
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <div class="modal-body" id="create">

                <form action="#" role="form" id="form_mutabaah" class="form-horizontal">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="pertemuan_idpertemuan" class="col-sm-2 control-label">Pertemuan</label>

                            <div class="col-sm-10">
                                <input list="pertemuan_idpertemuans" class="form-control" id="pertemuan_idpertemuanE" name="pertemuan_idpertemuan" />
                                <datalist id="pertemuan_idpertemuans" style="display: none;">
                                    <?php 
                            foreach($content['pertemuan'] as $pertemuan){
                              echo '<option data-value="'.$pertemuan["idpertemuan"].'" value="'.$pertemuan["absen"].'">';
                            }
                          ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="terlambat" class="col-sm-2 control-label">Terlambat</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="terlambatE" placeholder="Menit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tilawah" class="col-sm-2 control-label">Tilawah</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="tilawahE" placeholder="Halaman">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hafalan" class="col-sm-2 control-label">Hafalan</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="hafalanE" placeholder="Hafalan">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="puasa" class="col-sm-2 control-label">Puasa</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="puasaE" placeholder="Puasa Sunnah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qiamulail" class="col-sm-2 control-label">Qiamulail</label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="qiamulailE" placeholder="Dalam Seminggu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="baca_buku" class="col-sm-2 control-label">Baca Buku</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="baca_bukuE" placeholder="Baca Buku">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="memberi_hadiah" class="col-sm-2 control-label">Memberi Hadiah</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="memberi_hadiahE" placeholder="Memberi Hadiah">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sodaqoh" class="col-sm-2 control-label">Sodaqoh</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="sodaqohE" placeholder="Sodaqoh">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_islam" class="col-sm-2 control-label">Berita Islam</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="update_berita_islamE" placeholder="Berita Islam">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_nasional" class="col-sm-2 control-label">Berita Nasional</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="update_berita_nasionalE" placeholder="Berita Nasional">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_internasional" class="col-sm-2 control-label">Berita Internasional</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="update_berita_internasionalE" placeholder="Berita Internasional">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="olahraga" class="col-sm-2 control-label">Olahraga</label>

                            <div class="col-sm-10">
                                <select class="form-control" id="olahragaE" placeholder="Olahraga">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="hidden" id="idmutabaah" value="">
                <button type="button" class="btn btn-primary" onclick="update_mutabaah()">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function add() {

        var val = $('#pertemuan_idpertemuan').val();
        var xyz = $('#pertemuan_idpertemuans option').filter(function() {
            return this.value == val;
        }).data('value');
        var idpertemuan = xyz ? '' + xyz : alert("Pilih lagi pertemuan");
        var data_form = {
            pertemuan_idpertemuan: idpertemuan,
            terlambat: $('#terlambat').val(),
            tilawah: $('#tilawah').val(),
            hafalan: $('#hafalan option:selected').val(),
            puasa: $('#puasa').val(),
            qiamulail: $('#qiamulail').val(),
            baca_buku: $('#baca_buku option:selected').val(),
            memberi_hadiah: $('#memberi_hadiah option:selected').val(),
            sodaqoh: $('#sodaqoh option:selected').val(),
            update_berita_islam: $('#update_berita_islam option:selected').val(),
            update_berita_nasional: $('#update_berita_nasional option:selected').val(),
            update_berita_internasional: $('#update_berita_internasional option:selected').val(),
            olahraga: $('#olahraga option:selected').val(),

        };

        // console.log(data_form);
        $.ajax({
            cache: false,
            url: "<?php echo base_url($this->uri->segment(1)."/input_mutabaah");?>",
            type : "POST",
            data: data_form,
        }).done(function(data) {
            console.log(data);
            $('#modal-default').modal('hide');
            $('#form_mutabaah')[0].reset();
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

    function del_mutabaah(id, a) {
        // console.log(id);
        swal({
                title: "Apakah anda yakin ingin menghapus data " + a + " ?",
                text: "You will not be able to recover this data !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it !",
                cancelButtonText: "No, cancel please !",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo base_url($this->uri->segment(1).'/delete_mutabaah')?>/" + id + "/",
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            //if success reload ajax table
                            swal("Deleted!", "Penghapusan sukses !", "success");
                            table.ajax.reload(null, false); //reload datatable ajax

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            swal("Error", "Terjadi kesalahan ketika melakukan penghapusan !", "error");
                        }
                    });
                } else {
                    swal("Canceled", "Penghapusan Dibatalkan !", "error");
                }
            });
    }
    
    function update_mutabaah(){
      var val = $('#pertemuan_idpertemuanE').val();
        var xyz = $('#pertemuan_idpertemuans option').filter(function() {
            return this.value == val;
        }).data('value');
        var idpertemuan = xyz ? '' + xyz : alert("Pilih lagi pertemuan");
        var data_form = {
            pertemuan_idpertemuan: idpertemuan,
            terlambat: $('#terlambatE').val(),
            tilawah: $('#tilawahE').val(),
            hafalan: $('#hafalanE option:selected').val(),
            puasa: $('#puasaE').val(),
            qiamulail: $('#qiamulailE').val(),
            baca_buku: $('#baca_bukuE option:selected').val(),
            memberi_hadiah: $('#memberi_hadiahE option:selected').val(),
            sodaqoh: $('#sodaqohE option:selected').val(),
            update_berita_islam: $('#update_berita_islamE option:selected').val(),
            update_berita_nasional: $('#update_berita_nasionalE option:selected').val(),
            update_berita_internasional: $('#update_berita_internasionalE option:selected').val(),
            olahraga: $('#olahragaE option:selected').val(),
        };

        // console.log(data_form);
        $.ajax({
            cache: false,
            url: "<?php echo base_url($this->uri->segment(1));?>" + "/edit_mutabaah/"+$('#idmutabaah').val(),
            type : "POST",
            data: data_form,
        }).done(function(data) {
            console.log(data);
            $('#modal-edit').modal('hide');
            $('#form_mutabaah')[0].reset();
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

    function edit_mutabaah(id) {
        $('#form_mutabaah')[0].reset(); // reset form on modals
        // $('.form-group').removeClass('has-error'); // clear error class
        // $('.help-block').empty(); // clear error string
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo base_url($this->uri->segment(1)."/mutabaah_by_id");?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#pertemuan_idpertemuanE').val(data.data.pertemuan_idpertemuan.absen);
                $('#terlambatE').val(data.data.mutabaah.terlambat);
                $('#tilawahE').val(data.data.mutabaah.tilawah);
                $('#hafalanE').val(data.data.mutabaah.hafalan);
                $('#puasaE').val(data.data.mutabaah.puasa);
                $('#qiamulailE').val(data.data.mutabaah.qiamulail);
                $('#baca_bukuE').val(data.data.mutabaah.baca_buku);
                $('#memberi_hadiahE').val(data.data.mutabaah.memberi_hadiah);
                $('#sodaqohE').val(data.data.mutabaah.sodaqoh);
                $('#update_berita_islamE').val(data.data.mutabaah.update_berita_islam);
                $('#update_berita_nasionalE').val(data.data.mutabaah.update_berita_nasional);
                $('#update_berita_internasionalE').val(data.data.mutabaah.update_berita_internasional);
                $('#olahragaE').val(data.data.mutabaah.olahraga);
                $('#idmutabaah').val(id);
                $('#modal-edit').modal('show'); // show bootstrap modal when complete loaded
                // $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }
</script>