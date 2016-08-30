
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title"><?php echo $title; ?></h4>
</div>
<div class="modal-body">
	<div>
		<form id="form_data">
			<div class="form-group">

				<label for="mMenuName">ประเภทงานวิจัย/โครงการ</label>
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
				<div class="form-group">
					<label for="sMenuName">ชื่อทุน : </label>
					<textarea class="form-control" rows="3" id="data_tune" name="data_tune" placeholder="เพิ่มชื่อทุน"><?php 
					if($send == 'edit'){
						echo $dataValue['tName'];
					}
					?></textarea>
					<input type="hidden" class="form-control" id="tId" name="tId" value="<?php 
					if($send == 'edit'){
						echo $dataValue['tId'];
					}
					?>">
				</div>
			</form>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			var values1 = <?php echo $dataValue['sMenuId']; ?>;	
			$('#data_sub option[value="' + values1 +'"]').attr('selected', 'selected').text();

		});
	</script>







