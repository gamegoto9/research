<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">ประเภทงานวิจัย</h4>
	</div>
	<div class="modal-body">
		<div>
			<form id="form_data">
				<div class="form-group">
					<label for="mMenuName">ชื่อประเภทงานวิจัย</label>
					<?php 
					//echo $send['mMenuName'];
					
					?>
					<input type="text" class="form-control" id="mMenuName_txt" name="mMenuName_txt" placeholder="เพิ่มชื่อประเภทงานวิจัย" value="<?php 
					if($send == 'edit'){
						echo $dataValue['typeName'];
					}
					?>">
					<input type="hidden" class="form-control" id="mMenuId_txt" name="mMenuId_txt" value="<?php 
					if($send == 'edit'){
						echo $dataValue['typeId'];
					}
					?>">
				</div>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#mMenuName_txt").focus();
		});
	</script>