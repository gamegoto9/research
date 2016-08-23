
<?php if($menu_id == 0){ ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">เพิ่มคณะ/หน่วยงาน</h4>
	</div>
	<div class="modal-body">
		<div>
			<form id="form_data">
				<div class="form-group">
					<label for="mMenuName">ชื่อคณะ/หน่วยงาน</label>
					<?php 
					//echo $send['mMenuName'];
					
					?>
					<input type="text" class="form-control" id="mMenuName_txt" name="mMenuName_txt" placeholder="เพิ่มชื่อคณะ/หน่วยงาน" value="<?php 
					if($send == 'edit'){
						echo $dataValue['mMajorName'];
					}
					?>">
					<input type="hidden" class="form-control" id="mMenuId_txt" name="mMenuId_txt" value="<?php 
					if($send == 'edit'){
						echo $dataValue['mMajorId'];
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

	<?php }else{ ?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">เพิ่มภาควิชา/หลักสูตร</h4>
		</div>
		<div class="modal-body">
			<div>
				<form id="form_data">
					 <div class="form-group">

					 	<label for="mMenuName">ชื่อคณะ/หน่วยงาน</label>
					 	<select class="form-control" id="data_mMenu" name="data_mMenu">
					 		<?php 
					 		foreach ($mainMenu as $mMenu){								
					 		?>
					 			<option value="<?php echo $mMenu['mMajorId']; ?>"><?php echo $mMenu['mMajorName']; ?></option>
					 		<?php } ?>	
					 		</select>
					 	</div>
						<div class="form-group">
							<label for="sMenuName">ชื่อภาควิชา/หลักสูตร</label>
							<input type="text" class="form-control" id="sMenuName_txt" name="sMenuName_txt" placeholder="เพิ่มชื่อภาควิชา/หลักสูตร" value="<?php 
							if($send == 'edit'){
								echo $dataValue['mSubjectName'];
							}
							?>">
							<input type="hidden" class="form-control" id="sMenuId_txt" name="sMenuId_txt" value="<?php 
							if($send == 'edit'){
								echo $dataValue['mSubjectId'];
							}
							?>">
						</div>
					</form>
				</div>
			</div>

			<script>
				$(document).ready(function() {
					$("#sMenuName_txt").focus();
					$("#data_mMenu").val('<?php echo $dataValue['mMajorId']; ?>');

				});
			</script>

			<?php } ?>


			


