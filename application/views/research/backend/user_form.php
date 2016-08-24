
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">เพิ่มผู้ใช้งานระบบ</h4>
</div>
<div class="modal-body">
	<div>
		<form id="form_data">

				<div class="form-group">
					<label for="uName">ชื่อ - นามสกุล</label>
					<input type="text" class="form-control" id="uName" name="uName" placeholder="ชื่อ - นามสกุล" value="<?php 
					if($send == 'edit'){
						echo $dataValue['uName'];
					}
					?>">
					<input type="hidden" class="form-control" id="uId" name="uId" value="<?php 
					if($send == 'edit'){
						echo $dataValue['uName'];
					}
					?>">
				</div>

				<div class="form-group">

					<label for="mMajorName">ชื่อคณะ/หน่วยงาน</label>
					<select class="form-control" id="data_major" name="data_major">
						<?php 
							foreach ($major as $uMajor){								
						?>
							<option value="<?php echo $uMajor['mMajorId']; ?>"><?php echo $uMajor['mMajorName']; ?></option>
						<?php } ?>	
					</select>
				</div>

				<div class="form-group">
					<label for="note">ความเชี่ยวชาญ</label>
					<input type="text" class="form-control" id="note" name="note" placeholder="ความเชี่ยวชาญ" value="<?php 
					if($send == 'edit'){
						echo $dataValue['note'];
					}
					?>">	
				</div>

				<div class="form-group">

					<label for="mMenuName">ภาควิชา/หลักสูตร</label>
					<select class="form-control" id="data_subject" name="data_subject">
						<?php 
							foreach ($subject as $uSubject){								
						?>
							<option value="<?php echo $uSubject['mSubjectId']; ?>"><?php echo $uSubject['mSubjectName']; ?></option>
						<?php } ?>	
					</select>
				</div>

				<div class="form-group">
					<label for="username">ชื่อผู้ใช้</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php 
					if($send == 'edit'){
						echo $dataValue['username'];
					}
					?>">
					
				</div>

				<div class="form-group">
					<label for="password">รหัสผ่าน</label>
					<?php 
					if($send == 'edit'){
					?>
						<input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $dataValue['password']; ?>">
					<?php
					}else{
					?>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					<?php
					}
					?>
					
					
				</div>

				<div class="form-group">

					<label for="uStatus">สถานะผู้ใช้</label>
					<select class="form-control" id="uStatus" name="uStatus">
						<?php 
							foreach ($status as $uStatus){								
						?>
							<option value="<?php echo $uStatus['statusId']; ?>"><?php echo $uStatus['statusName']; ?></option>
						<?php } ?>	
					</select>
				</div>

			</form>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			

		});
	</script>







