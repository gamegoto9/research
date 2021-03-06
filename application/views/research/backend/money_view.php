<div>
	
	<div>
		<h3><?php echo $title; ?></h3>
		<hr width="100%">
	</div>
	<div class="pull-right">
		<button type="button" class="btn btn-success btn-block" id="test" onclick="showModel('add');"><span><i class="fa fa-plus"></i>เพิ่มทุนวิจัย/โครงการ</span></button>
	</div>
	
	<hr class="hr">
	
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

	
	$(document).ready(function() {


		$('#showDataTable').load("<?php echo base_url('main/modi_tune')?>");

		
	} );

	

	function showModel(view){

		load_view = view;
		$('#model_view').load("<?php echo base_url('main/money_form1/');?>/"+load_view);
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

		$('#model_view').load('<?php echo site_url('main/money_form_edit1'); ?>',sdata);
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
							$('#showDataTable').load("<?php echo base_url('main/modi_tune')?>/"+id);
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

						
						
							$('#showDataTable').load("<?php echo base_url('main/modi_tune')?>");
						
						



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
