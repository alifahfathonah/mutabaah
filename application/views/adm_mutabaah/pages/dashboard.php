<div class="row">
	<div class="col-lg-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<span class="label label-success pull-right">Aktif</span>
				<h5>Mutarobi</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">
					<?php
						echo $mutarobi; 
					?>
				</h1>
				<div class="stat-percent font-bold text-success"><i class="fa fa-qrcode fa-2x"></i></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<span class="label label-info pull-right">Aktif</span>
				<h5>Murobi</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">
					<?php
						echo $murobi; 
					?>
				</h1>
				<div class="stat-percent font-bold text-info"><i class="fa fa-desktop fa-2x"></i></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<span class="label label-primary pull-right">non-aktif</span>
				<h5>Tidak aktif</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">
					<?php
						echo $non_aktif; 
					?>
				</h1>
				<div class="stat-percent font-bold text-navy"><i class="fa fa-pencil fa-2x"></i></div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<span class="label label-danger pull-right">Aktif dan Tidak</span>
				<h5>Total</h5>
			</div>
			<div class="ibox-content">
				<h1 class="no-margins">
					<?php
						echo $total; 
					?>
				</h1>
				<div class="stat-percent font-bold text-danger"><i class="fa fa-file fa-2x"></i></div>
			</div>
		</div>
	</div>

</div>
<!-- end status kelas -->

<div id="modal-form-cekupload" class="modal fade" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" style="width:75%;">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="m-t-none m-b">Tabel Upload Tugas</h3>
						<p> tabel tugas </p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal-form-materi" class="modal fade" aria-hidden="true" style="display: none;">
	<div class="modal-dialog" style="width:75%;">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="m-t-none m-b">Tambah Materi</h3>
						<form action="#" id="formMateri" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">Upload</label>
								<div class="col-sm-10">
									<div class="fileinput fileinput-new input-group" data-provides="fileinput">
										<div class="form-control" data-trigger="fileinput">
											<i class="glyphicon glyphicon-file fileinput-exists"></i>
											<span class="fileinput-filename"></span>
										</div>
										<span class="input-group-addon btn btn-default btn-file">
                            <span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input accept="*" type="file" name="materi" id="materiupload" tabindex="" />
										</span>
										<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12-2 col-sm-offset-10">
									<button type="button" class="btn btn-primary" id="btnSave" onclick="save()" tabindex="">Simpan</button>
									<button class="btn btn-white" data-dismiss="modal" id="cancel" tabindex="">Batalkan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>
<script src="js/plugins/flot/jquery.flot.time.js"></script>


<!-- <script>
	var mode;
	var table;
	function set_table(mtkId){
		//$('#example').DataTable().ajax.reload();
		var url = "<?php echo base_url($this->uri->segment(1).'/materi_list')?>/"+mtkId;
		if ($.fn.DataTable.isDataTable("#materi_list")) {
		  $('#materi_list').DataTable().clear().destroy();
		}
		table = $('#materi_list').DataTable({
			// "destroy" : true,
			"processing": true, //Feature control the processing indicator.
		// "serverSide": true, //Feature control DataTables' server-side processing mode.
			"retrieve": true,
			"paging": false,
			"order": [], //Initial no order.
			"autoWidth": false,
			"filter" : false,
			"ajax":{
				"url": url,
				"type": "POST",
				"dataSrc":  function ( json ) {
                return json.data;
            }
			},
			"columnDefs": [{
					"targets": [ -1,0 ], //last column
					"orderable": false, //set not orderable
			}],
			pageLength: 5,
			responsive: true,
			// dom: '<"html5buttons"B>lTfgitp'
		});
		table.ajax.reload(null,true);


	}
  $(document).ready(function(){
		set_table($('#selectMtk').find(":selected").val());
	});


function add_materi() {
	$('#modal-form-materi').modal('show');
	$('form').find('#formMateri')[0].reset();
}

function save() {
	//
	var formData = new FormData($('#formMateri')[0]);
	formData.append('mtr_idmtk', $('#selectMtk').find(":selected").val());
	console.log
	$.ajax({
		url: "<?php echo base_url($this->uri->segment(1).'/materi_upload')?>/",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		dataType: "JSON",
		success: function(data) {

		},
		error: function(jqXHR, textStatus, errorThrown) {
			table.ajax.reload(null,false);
			$('#modal-form-materi').modal('hide');
		}
	});

	//table.ajax.reload(null,false);
}

function hapus_ses() {
	//
	var odata = $('#form_hapusses')[0];
	var formData = new FormData(odata);
	console.log
	$.ajax({
		url: "<?php echo base_url($this->uri->segment(1).'/hapussession')?>",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,
		dataType: "JSON",
		success: function(data) {
			$('#modal-form-hapusses').modal('hide');
			window.location.reload(true);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			table.ajax.reload(null,false);
			$('#modal-form-materi').modal('hide');
		}
	});

	//table.ajax.reload(null,false);
}
function refresh(){
		//reload datatable ajax

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
								url : "<?php echo base_url($this->uri->segment(1).'/delete_materi')?>/"+id+"/"+a,
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
</script> -->
