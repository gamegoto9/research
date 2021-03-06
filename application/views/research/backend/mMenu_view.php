<div>
	
	<div>
		<h3><?php echo $title; ?></h3>
		<hr width="100%">
	</div>
	<div class="pull-right">
		<button type="button" class="btn btn-success btn-block" id="test" onclick="showModel('add');"><span><i class="fa fa-plus"></i> เพิ่มเมนู</span></button>
	</div>
	<br><br>
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



<script type="text/javascript">

	var load_view;
	var title_id = <?php echo $title_id; ?>;
	
	$(document).ready(function() {

		if(title_id === 0){

			$('#showDataTable').load("<?php echo base_url('main/modi_mMenu')?>");
		}else{
			$('#showDataTable').load("<?php echo base_url('main/modi_sMenu')?>");
		}


		if ($("#mMenuName_txt").is(':focus')) {
			alert("hello");
		}
		

	} );



	function showModel(view){

		console.log("true");
		load_view = view;
		$('#model_view').load("<?php echo base_url('main/mMenu_form/');?>/"+load_view+"/"+title_id);
		$('#myModel').modal('show');

		// $(document).keypress(function(event) {
		// 	var keycode = event.keyCode || event.which;
		// 	if(keycode == '13') {
		// 		btn_save();   
		// 	}
		// });


	}

	function showModel_edit(xid){

		load_view = "edit";
		var sdata = {
			id:xid,
			menu_type : title_id
		};
		$('#model_view').load('<?php echo site_url('main/mMenu_form_edit'); ?>',sdata);
		$('#myModel').modal('show');
	}
	

	function showModel_delete(xid){
		
		load_view = "delete";
		bootbox.confirm("Are you sure?", function(result) {
			if(result){

				var faction = "<?php echo site_url('/main/action_mMenu/'); ?>/"+load_view+"/"+title_id;
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

						

						if(title_id === 0){

							$('#showDataTable').load("<?php echo base_url('main/modi_mMenu')?>");
						}else{
							$('#showDataTable').load("<?php echo base_url('main/modi_sMenu')?>");
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

				var faction = "<?php echo site_url('/main/action_mMenu/'); ?>/"+load_view+"/"+title_id;
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

						if(title_id === 0){
							$('#showDataTable').load("<?php echo base_url('main/modi_mMenu')?>");
						}else{
							$('#showDataTable').load("<?php echo base_url('main/modi_sMenu')?>");
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
