
<?php
if($pass == "user"){
	?>


	<div class="modal-header" style="background-color:#0f76dc;">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title"><font color="#FFF">แก้ไขข้อมูลนักวิจัย</font></h4>
	</div>
	<div class="modal-body">
		<div>
			<form id="form_data" name="form_data" method="post" action="" enctype="multipart/form-data">

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

							<div class="form-group">

								<label for="uStatus">รูปภาพ</label>
								<input type="file" name="images" id="images" size="20" multiple required> <font color="red">*ไฟล์รูปภาพ JPG GIF PNG เท่านั้น ขนาดไม่เกิน 10MB</font>

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


				<?php }else{ 

					if($dataValue['uId'] == 1){
						?>



						<div class="modal-header" style="background-color:#0f76dc;">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title"><font color = "#fff">แก้ไขข้อมูลนักวิจัย</font></h4>
						</div>
						<div class="modal-body">
							<div>
								<form id="form_data" name="form_data" method="post" action="" enctype="multipart/form-data">

									<div class ="form-group">
										<li class="thumbnail">	
											<img src="<?php echo $dataValue['img']; ?>" class="thumbnail" style="width: 125px; height: 152px;">
											<center>
												<input type="button" class="btn btn-warning btn-sm" value="เปลี่ยนรูปประจำตัว" onclick="edit_img()" />
											</center>
										</li>
									</div>

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

										
									</div>
								</div>
								<div class="modal fade bs-example-modal-lg" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div id="model_view">
												<div class="modal-header" style="background-color: #65ca65;">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title"><font color="#fff">แก้ไขรูปภาพประจำตัว</font></h4>
												</div>
												<div class="modal-body">
													<div>
														<form id="form_data2" name="form_data2" method="post" action="" enctype="multipart/form-data">

															<div class="form-group">
																<label for="uStatus">รูปภาพ</label>
																<input type="file" name="images" id="images" multiple required> <font color="red">*ไฟล์รูปภาพ JPG GIF PNG เท่านั้น ขนาดไม่เกิน 10MB</font>

																<input type="hidden" class="form-control" id="uId2" name="uId2" value="<?php 
																if($send == 'edit'){
																	echo $dataValue['uId'];
																}
																?>">
															</div>
														</form>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
															<button type="button" class="btn btn-primary" onclick="save_editImg();">บันทึก</button>
														</div>
														
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div>
										</div>
									</div>
								</div>

								<script>
									$(document).ready(function() {

										$("#uStatus").val('<?php echo $dataValue['statusId']; ?>');
										$('#uStatus').prop('disabled', 'disabled');


									});

									function edit_img(){
										$('#myModel').modal('show');
									}
									function save_editImg(){
										alert($('#uId2').val());
										bootbox.confirm("Are you sure?", function(result) {
											if(result){


												var faction = "<?php echo site_url('/main/edit_img/'); ?>";

												var formData = new FormData($('#form_data2')[0]);

												$.ajax({
													url: faction,
													type: 'POST',
													data: formData,
													mimeType: "multipart/form-data",
													contentType: false,
													cache: false,
													processData: false,
													success: function(data) {

														var posts = JSON.parse(data);
														console.log(posts);


														if (posts.is_successful) {
															$.pnotify({
																title: 'แจ้งให้ทราบ!',
																text: posts.msg,
																type: 'success',
																opacity: 1,
																history: false
															});

															$('#myModel').modal('hide');
															bootbox.hideAll();
															//$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");
														} else {
															$.pnotify({
																title: 'เตือน!',
																text: posts.msg,
																type: 'error',
																opacity: 1,
																history: false
															});
														}


													},
													error: function(jqXHR, textStatus, errorThrown) {

														$.pnotify({
															title: 'เตือน!',
															text: 'ผิดพลาด',
															type: 'error',
															opacity: 1,
															history: false
														});
													}
												});
											}

										}); 
									}

								</script>

								<?php }else{
									?>
									<div class="modal-header" style="background-color:#0f76dc;">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title"><font color="#fff">แก้ไขข้อมูลนักวิจัย</font></h4>
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
												<?php
											}
										} ?>




