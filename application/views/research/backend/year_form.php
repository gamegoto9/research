<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">ข้อมูลปีงบประมาณ</h4>
	</div>
	<div class="modal-body">
		<div>
			<form id="form_data">
				<div class="form-group">
					<label for="mMenuName">ชื่อปีงบประมาณ</label>
					<?php 
					//echo $send['mMenuName'];
					
					?>
					<input type="text" class="form-control" id="mMenuName_txt" name="mMenuName_txt" placeholder="เพิ่มชื่อปีงบประมาณ" value="<?php 
					if($send == 'edit'){
						echo $dataValue['yearName'];
					}
					?>">
					<input type="hidden" class="form-control" id="mMenuId_txt" name="mMenuId_txt" value="<?php 
					if($send == 'edit'){
						echo $dataValue['yearId'];
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