
<div class="modal-header" style="background-color: #0f76dc;">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title"><font color="#FFF">ข้อมูลประเภททุน</font></h4>
</div>
<div class="modal-body">
	<div>
		<form id="form_data">

			<div class="form-group">
				<label for="uName">ชื่อประเภททุน : </label>

				<label for="tName"><span style="color:blue;font-weight:bold"><?php echo $dataValue['tName']; ?></span></label>
				
			</div>

			<div class="form-group">

				<label for="mMajorName">ชื่อโครงการที่เกี่ยวข้อง : </label>

				<label for="uName"><span style="color:blue;font-weight:bold"><?php echo $dataValue['sMenuName']; ?></span></label>

				
			</div>

				<div class="form-group">
					<label for="note">ประเภทของหัวข้อวิจัย/โครงการ : </label>

					<label for="note"><span style="color:blue;font-weight:bold"><?php echo $dataValue['mMenuName']; ?></span></label>
						
				</div>

				</form>
			</div>
		</div>

		<script>
			$(document).ready(function() {

				

					

			});
		</script>







