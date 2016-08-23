
<?php if($menu_id == 0){ ?>
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">เพิ่มเมนูหลัก</h4>
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

	<script>
		$(document).ready(function() {
			$("#mMenuName_txt").focus();
		});
	</script>

	<?php }else{ ?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">เพิ่มเมนูย่อย</h4>
		</div>
		<div class="modal-body">
			<div>
				<form id="form_data">
					<div class="form-group">

						<label for="mMenuName">ชื่อเมนูหลัก</label>
						<select class="form-control" id="data_mMenu" name="data_mMenu">
							<?php 
							foreach ($mainMenu as $mMenu){								
								?>
								<option value="<?php echo $mMenu['mMenuId']; ?>"><?php echo $mMenu['mMenuName']; ?></option>
								<?php } ?>	
							</select>
						</div>
						<div class="form-group">
							<label for="sMenuName">ชื่อเมนูย่อย</label>
							<input type="text" class="form-control" id="sMenuName_txt" name="sMenuName_txt" placeholder="เพิ่มเมนูย่อย" value="<?php 
							if($send == 'edit'){
								echo $dataValue['sMenuName'];
							}
							?>">
							<input type="hidden" class="form-control" id="sMenuId_txt" name="sMenuId_txt" value="<?php 
							if($send == 'edit'){
								echo $dataValue['sMenuId'];
							}
							?>">
						</div>
					</form>
				</div>
			</div>

			<script>
				$(document).ready(function() {
					$("#sMenuName_txt").focus();
					$("#data_mMenu").val('<?php echo $dataValue['mMenuId']; ?>');

				});
			</script>

			<?php } ?>


			


