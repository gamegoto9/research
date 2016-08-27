
<?php
if($pass == "user"){
	?>


	<div class="modal-header" style="background-color:#FF9900;">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title">แก้ไขผู้ใช้งานระบบ</h4>
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
						echo $dataValue['uId'];
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
						<textarea class="form-control" rows="4" id="note" name="note" placeholder="ความเชี่ยวชาญ"><?php 
							if($send == 'edit'){
								echo $dataValue['note'];
							}
							?></textarea>
						</div>

						<div class="form-group">

							<label for="mMenuName">ภาควิชา/หลักสูตร</label>
							<select class="form-control" id="data_subject" name="data_subject">

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
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $dataValue['password']; ?>">
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

								<input type="hidden" class="form-control" id="page" name="page" value="<?php echo $send; ?>">

							</div>

						</form>
					</div>
				</div>

				<script>
					$(document).ready(function() {


						$("#data_major").val('<?php echo $dataValue['mMajorId']; ?>');
						$("#uStatus").val('<?php echo $dataValue['statusId']; ?>');
						loadSubject();

						$('#data_major').change(function() {
							loadSubject();
						});







					});

					function loadSubject(){
						var faction = "<?php echo site_url('main/select_type_major/'); ?>";
						var fdata = {id: $("#data_major").val()};

						$.post(faction, fdata, function(jdata) {

							if (jdata.is_successful) {

						//alert('bb');
								var options;

								if(jdata.data.length > 0){

									for (var i = 0; i < jdata.data.length; i++) {
										options += '<option value="' + jdata.data[i].mSubjectId + '">' +
										jdata.data[i].mSubjectName + '</option>';
									}

									$('#data_subject').html(options);

									$('#data_subject').prop('disabled', false);
									$("#data_subject").val('<?php echo $dataValue['mSubjectId']; ?>');
								}else{
									options += '<option value=""> ไม่มีข้อมูล</option>';

									$('#data_subject').html(options);
									$('#data_subject').prop('disabled', 'disabled');
								}

							} else {

								alert("NOOOOOO");

							}

						}, 'json');
					}
				</script>


				<?php }else{ ?>

					<div class="modal-header" style="background-color:#0f76dc;">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">แก้ไขผู้ใช้งานระบบ</h4>
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
										echo $dataValue['uId'];
									}
									?>">
								</div>



								<div class="form-group">
									<label for="note">ความเชี่ยวชาญ</label>
									<textarea class="form-control" rows="4" id="note" name="note" placeholder="ความเชี่ยวชาญ"><?php 
										if($send == 'edit'){
											echo $dataValue['note'];
										}
										?></textarea>
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
											<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $dataValue['password']; ?>">
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

											<input type="hidden" class="form-control" id="page" name="page" value="<?php echo $send; ?>">

										</div>

									</form>

									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
										<button type="button" class="btn btn-primary" onclick="btn_saveAdmin(<?php echo $uStatus['uId']; ?>);">บันทึก</button>
									</div>
								</div>
							</div>

							<script>
								$(document).ready(function() {
									
									$("#uStatus").val('<?php echo $dataValue['statusId']; ?>');
									$('#uStatus').prop('disabled', 'disabled');

									
								});

								function btn_saveAdmin(uid){
									bootbox.confirm("Are you sure?", function(result) {
										if(result){



											var faction = "<?php echo site_url('/main/edit_admin/'); ?>/"+load_view;
											var fdata = $("#form_data").serialize();
											$.post(faction, fdata, function(jdata){

												if(jdata.is_successful){

													$.pnotify({
														title: 'แจ้งให้ทราบ!',
														text: jdata.msg,
														type: 'success',
														opacity: 1,
														history: false

													});


													$('#myModel').modal('hide');
													bootbox.hideAll();

																																							

												}else{

													$.pnotify({
														title: 'เตือน!',
														text: jdata.msg,
														type: 'error',
														opacity: 1,
														history: false
													});
												}

											},'json');


										}

									}); 
								}
							</script>

							<?php } ?>




