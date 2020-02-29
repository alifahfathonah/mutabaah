<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mutabaah <?php echo $content['namaAnggota'];?></h3>
                    </div>
                    <div class="row">
                        <div class="col-xs-5 col-xs-offset-1">

                            <a class="btn btn-sm btn-default" href="<?php echo $content['back_url']?>" title="Edit">
                            <i class="glyphicon glyphicon-arrow-left"></i> Back
                            </a>
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
                                <input disabled list="pertemuan_idpertemuans" class="form-control" id="pertemuan_idpertemuanE" name="pertemuan_idpertemuan" />
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
                                <input disabled type="number" class="form-control" id="terlambatE" placeholder="Menit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tilawah" class="col-sm-2 control-label">Tilawah</label>

                            <div class="col-sm-10">
                                <input disabled type="number" class="form-control" id="tilawahE" placeholder="Halaman">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hafalan" class="col-sm-2 control-label">Hafalan</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="hafalanE" placeholder="Hafalan">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="puasa" class="col-sm-2 control-label">Puasa</label>

                            <div class="col-sm-10">
                                <input disabled type="number" class="form-control" id="puasaE" placeholder="Puasa Sunnah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="qiamulail" class="col-sm-2 control-label">Qiamulail</label>

                            <div class="col-sm-10">
                                <input disabled type="number" class="form-control" id="qiamulailE" placeholder="Dalam Seminggu">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="baca_buku" class="col-sm-2 control-label">Baca Buku</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="baca_bukuE" placeholder="Baca Buku">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="memberi_hadiah" class="col-sm-2 control-label">Memberi Hadiah</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="memberi_hadiahE" placeholder="Memberi Hadiah">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sodaqoh" class="col-sm-2 control-label">Sodaqoh</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="sodaqohE" placeholder="Sodaqoh">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_islam" class="col-sm-2 control-label">Berita Islam</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="update_berita_islamE" placeholder="Berita Islam">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_nasional" class="col-sm-2 control-label">Berita Nasional</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="update_berita_nasionalE" placeholder="Berita Nasional">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="update_berita_internasional" class="col-sm-2 control-label">Berita Internasional</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="update_berita_internasionalE" placeholder="Berita Internasional">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="olahraga" class="col-sm-2 control-label">Olahraga</label>

                            <div class="col-sm-10">
                                <select disabled class="form-control" id="olahragaE" placeholder="Olahraga">
                                    <option value="0">Tidak</option>
                                    <option value="1">Ya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

    function view_mutabaah(id) {
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