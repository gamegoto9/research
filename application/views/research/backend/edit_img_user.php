<div class="modal-header" style="background-color: #65ca65;">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title"><font color="#fff">แก้ไขรูปภาพประจำตัว</font></h4>
</div>
<div class="modal-body">
	<div>
		<form id="form_data_image" name="form_data_image" method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label for="uStatus">รูปภาพ</label>
				<input type="file" name="images2" id="images2" multiple required> <font color="red">*ไฟล์รูปภาพ JPG GIF PNG เท่านั้น ขนาดไม่เกิน 10MB</font>

				<input type="hidden" class="form-control" id="uId234" name="uId234" value="<?php 
				
					echo $uId;
				
				?>">
			</div>
		</form>
	</div><!-- /.modal-content -->
</div>