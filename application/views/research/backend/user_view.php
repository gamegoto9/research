<div>
	
	<div>
		<h3><?php echo $title; ?></h3>
		<hr width="100%">
	</div>
	<div class="pull-right">
		<button type="button" class="btn btn-success btn-block" id="test" onclick="showModel('add');"><span><i class="fa fa-plus"></i>เพิ่มนักวิจัย</span></button>
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
	
	//console.log(load_view);

	
	
	$(document).ready(function() {

		
		$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");




	} );



	function showModel(view){

		load_view = view;
		$('#model_view').load("<?php echo base_url('main/user_form/');?>/"+load_view);
		$('#myModel').modal('show');

	}

	function showModel_view(id){
		
		$('#model_view_view').load("<?php echo base_url('main/user_form_view/');?>/"+id);
		$('#myModel_view').modal('show');
	}

	function showModel_edit(xid){

		load_view = "edit";
		var sdata = {
			id:xid
		};

		$('#model_view').load('<?php echo site_url('main/user_form_edit'); ?>',sdata);
		$('#myModel').modal('show');
	}
	

	function showModel_delete(xid){
		
		load_view = "delete";
		bootbox.confirm("Are you sure?", function(result) {
			if(result){

				var faction = "<?php echo site_url('/main/action_user/'); ?>/"+load_view;
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

						$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");


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



				var faction = "<?php echo site_url('/main/action_user/'); ?>/"+load_view;
				//var fdata = $("#form_data").serialize();
				var formData = new FormData($('#form_data')[0]);
				// $.post(faction, fdata, function(jdata){

				// 	if(jdata.is_successful){

				// 		$.pnotify({
				// 			title: 'แจ้งให้ทราบ!',
				// 			text: jdata.msg,
				// 			type: 'success',
				// 			opacity: 1,
				// 			history: false

				// 		});


				// 		$('#myModel').modal('hide');
				// 		bootbox.hideAll();



				// 		$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");



				// 	}else{

				// 		$.pnotify({
				// 			title: 'เตือน!',
				// 			text: jdata.msg,
				// 			type: 'error',
				// 			opacity: 1,
				// 			history: false
				// 		});
				// 	}

				// },'json');

				$.ajax({
					url: faction,
					type: 'POST',
					data: formData,
					mimeType: "multipart/form-data",
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {

						var posts = JSON.parse(data);
						console.log(posts);


						if (posts.is_successful) {
							$.pnotify({
								title: 'แจ้งให้ทราบ!',
								text: posts.msg,
								type: 'success',
								opacity: 1,
								history: false
							});

						$('#myModel').modal('hide');
						bootbox.hideAll();
						$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");
						} else {
							$.pnotify({
								title: 'เตือน!',
								text: posts.msg,
								type: 'error',
								opacity: 1,
								history: false
							});
						}
						//viewdataType(sid, page);

					},
					error: function(jqXHR, textStatus, errorThrown) {
                    //handle here error returned
                    $.pnotify({
								title: 'เตือน!',
								text: 'ผิดพลาด',
								type: 'error',
								opacity: 1,
								history: false
							});
                }
            });


			}

		}); 
	}
</script>
