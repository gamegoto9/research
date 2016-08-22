<div class="modal-header">



	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">Modal title</h4>
</div>
<div class="modal-body">
	<div>
		<form id="form_data">
			<div class="form-group">
				<label for="mMenuName">ชื่อเมนูหลัก</label>
				<?php 
					//echo $send['mMenuName'];
					
				?>
				<input type="text" class="form-control" id="mMenuName_txt" name="mMenuName_txt" placeholder="เพิ่มเมนูหลัก" value="<?php 
					if($send == 'edit'){
						echo $dataValue['mMenuName'];
					}
				?>">
				<input type="hidden" class="form-control" id="mMenuId_txt" name="mMenuId_txt" value="<?php 
					if($send == 'edit'){
						echo $dataValue['mMenuId'];
					}
				?>">
			</div>
		</form>
	</div>
</div>

