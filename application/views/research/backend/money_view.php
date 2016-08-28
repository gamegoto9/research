<div>
	
	<div>
		<h3><?php echo $title; ?></h3>
		<hr width="100%">
	</div>
	<div class="pull-right">
		<button type="button" class="btn btn-success btn-block" id="test" onclick="showModel('add');"><span><i class="fa fa-plus"></i>เพิ่มทุนวิจัย/โครงการ</span></button>
	</div>
	
	<hr class="hr">
	<div class="col-sm-12">
		<h3>ค้นหาประเภททุน</h3>
		<div class="form-group col-sm-10">
			<label for="">ประเภทงานวิจัย/โครงการ</label>
			<select class="form-control" id="data_sub" name="data_sub">
				<?php
				foreach ($mains as $main){
					?>	
					<optgroup label="<?php echo $main['mMenuName']; ?>">
						<?php
						foreach ($projects as $project){
							if($main['mMenuId'] == $project['mMenuId']){
								?>
								<option value="<?php echo $project['sMenuId']; ?>"><?php echo $project['sMenuName']; ?></option>

								<?php		
							}
						}
					} ?>	
				</select>
			</div>
			<!-- <div class="form-group col-sm-5">
				<label for="">ค้นหาประเภททุน</label>
				<select class="form-control" id="data_tune" name="data_tune">

				</select>
			</div> -->
			<div class="form-group col-sm-2">
				<label for=""></label>
				<button class="btn btn-block btn-warning" onclick="btnSearch()" ><i class="fa fa-search"> ค้นหา</i></button>
			</div>
		</div>
		<br><br><br><br><br><br><br>
		<div id="showDataTable">

		</div>
	</div>

	<div class="modal fade bs-example-modal-lg" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div id="model_view">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
					<button type="button" class="btn btn-primary" onclick="btn_save();">บันทึก</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<div class="modal fade bs-example-modal-lg" id="myModel_view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div id="model_view_view">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>

				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>



	<script type="text/javascript">

		var load_view;

	
	$(document).ready(function() {


		$('#data_tune').prop('disabled', 'disabled');

		// $('#data_sub').change(function() {

		// 				//alert($("#data_major").val());

		// 				var faction = "<?php echo site_url('main/getDataTune/'); ?>";
		// 				var fdata = {id: $("#data_sub").val()};

		// 				$.post(faction, fdata, function(jdata) {

		// 					if (jdata.is_successful) {
								
		// 						var options;

		// 						if(jdata.data.length > 0){

		// 							for (var i = 0; i < jdata.data.length; i++) {
		// 								options += '<option value="' + jdata.data[i].tId + '">' +
		// 								jdata.data[i].tName + '</option>';
		// 							}

		// 							$('#data_tune').html(options);
		// 							$('#data_tune').prop('disabled', false);
		// 						}else{
		// 							options += '<option value=""> ไม่มีข้อมูล</option>';

		// 							$('#data_tune').html(options);
		// 							$('#data_tune').prop('disabled', 'disabled');
		// 						}

		// 					} else {

		// 						alert("NOOOOOO");

		// 					}

		// 				}, 'json');

		// 			});
		
		//$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");




	} );

	function btnSearch(){
		var id = $('#data_sub').val();
		$('#showDataTable').load("<?php echo base_url('main/dataTable_money')?>/"+id);
	}

	function showModel(view){

		load_view = view;
		$('#model_view').load("<?php echo base_url('main/money_form/');?>/"+load_view);
		$('#myModel').modal('show');

	}

	function showModel_view(id){
		
		$('#model_view_view').load("<?php echo base_url('main/money_form_view/');?>/"+id);
		$('#myModel_view').modal('show');
	}

	function showModel_edit(xid){

		load_view = "edit";
		var sdata = {
			id:xid
		};

		$('#model_view').load('<?php echo site_url('main/money_form_edit'); ?>',sdata);
		$('#myModel').modal('show');
	}
	

	function showModel_delete(xid){
		
		load_view = "delete";
		bootbox.confirm("Are you sure?", function(result) {
			if(result){

				var faction = "<?php echo site_url('/main/action_money/'); ?>/"+load_view;
				var fdata = {id:xid};
				$.post(faction, fdata, function(jdata){

					if(jdata.is_successful){

						$.pnotify({
							title: 'แจ้งให้ทราบ!',
							text: jdata.msg,
							type: 'success',
							opacity: 1,
							history: false

						});

						if(load_view == "edit" || load_view == "delete"){
							var id = $('#data_sub').val();
							$('#showDataTable').load("<?php echo base_url('main/dataTable_money')?>/"+id);
						}


					}else{

						$.pnotify({
							title: 'เตือน!',
							text: jdata.msg,
							type: 'error',
							opacity: 1,
							history: false
						});
					}

				},'json');


			}

		});
		
	}

	function btn_save(){

		console.log(load_view);
		bootbox.confirm("Are you sure?", function(result) {
			if(result){

				var faction = "<?php echo site_url('/main/action_money/'); ?>/"+load_view;
				var fdata = $("#form_data").serialize();
				$.post(faction, fdata, function(jdata){

					if(jdata.is_successful){

						$.pnotify({
							title: 'แจ้งให้ทราบ!',
							text: jdata.msg,
							type: 'success',
							opacity: 1,
							history: false

						});


						$('#myModel').modal('hide');
						bootbox.hideAll();

						
						if(load_view == "edit"){
							var id = $('#data_sub').val();
							$('#showDataTable').load("<?php echo base_url('main/dataTable_money')?>/"+id);
						}
						



					}else{

						$.pnotify({
							title: 'เตือน!',
							text: jdata.msg,
							type: 'error',
							opacity: 1,
							history: false
						});
					}

				},'json');


			}

		}); 


	}
</script>
