
<div class="modal-header" style="background-color: #0f76dc;">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title"><font color="#FFF">ข้อมูลนักวิจัย</font></h4>
</div>
<div class="modal-body">
	<div>
		<form id="form_data">

			<div class ="form-group">
				<li class="thumbnail">	
					<img src="<?php echo $dataValue['img']; ?>" class="thumbnail" style="width: 95px; height: 120px;">

					
				</li>
			</div>
			<div class="form-group">
				<label for="uName">ชื่อ - นามสกุล : </label>

				<label for="uName"><span style="color:blue;font-weight:bold"><?php echo $dataValue['uName']; ?></span></label>
				
			</div>

			<div class="form-group">

				<label for="mMajorName">ชื่อคณะ/หน่วยงาน : </label>

				<label for="uName"><span style="color:blue;font-weight:bold"><?php echo $dataValue['mMajorName']; ?></span></label>

				
			</div>

			<div class="form-group">
				<label for="note">ความเชี่ยวชาญ : </label>

				<label for="note"><span style="color:blue;font-weight:bold"><?php echo $dataValue['note']; ?></span></label>

			</div>

			<div class="form-group">

				<label for="mMenuName">ภาควิชา/หลักสูตร : </label>
				<label for="uName"><span style="color:blue;font-weight:bold"><?php echo $dataValue['mSubjectName']; ?></span></label>
			</div>

			<div class="form-group">
				<label for="username">ชื่อผู้ใช้ : </label>

				<label for="username"><span style="color:blue;font-weight:bold"><?php echo $dataValue['username']; ?></span></label>
			</div>

			<div class="form-group">
				<label for="password">รหัสผ่าน : </label>

				<label for="password"><span style="color:blue;font-weight:bold"><?php echo $dataValue['password']; ?></span></label>


			</div>

			<div class="form-group">

				<label for="uStatus">สถานะผู้ใช้</label>

				<label for="uStatus"><span style="color:blue;font-weight:bold"><?php echo $dataValue['statusName']; ?></span></label>

				<input type="hidden" class="form-control" id="uId" name="uId" value="<?php echo  $dataValue['uId']; ?>">

			</div>

		</form>
	</div>
</div>

<script>
	$(document).ready(function() {





	});
</script>







