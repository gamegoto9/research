<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
	<button type="button" class="btn btn-primary" onclick="btn_saveThis();">บันทึก</button>
</div>

<script type="text/javascript">
	function btn_saveThis(){
		bootbox.confirm("Are you sure?", function(result) {
			if(result){

				var faction = "<?php echo site_url('/main/edit_admin/'); ?>";
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
						
						loadDiv($('#uId').val());


					}else{

						$.pnotify({
							title: 'เตือน!',
							text: jdata.msg,
							type: 'error',
							opacity: 1,
							history: false
						});
						loadDiv($('#uId').val());
					}

				},'json');


			}

		}); 
	}

	function loadDiv(uid){
		var sdata = {
			id:uid
		};
		var page = '<?php echo site_url('main/user_form_edit');?>';
		
		$.ajax({
			type: "POST",
			url: page,
			data: sdata
		}).done(function(data) {
			$('#main_view').html(data);
			$('#main_view2').load("<?php echo base_url('main/edit_this')?>");
		});
	}
</script>