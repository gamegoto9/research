<?php 
if($view == "1"){ ?>
  <div class="modal-header" style="background-color:#0f76dc;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><font color="#FFF">เพิ่มรูปภาพ</font></h4>
  </div>
  <div class="modal-body">
   <form class="form-horizontal" id="formImg" name="formImg">

    

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ชื่อรูปภาพ<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="namelink" name="namelink" class="form-control">
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ไฟล์เอกสาร<font color="red">*</font></label>
      <div class="col-sm-8">
        <input type="file" name="filelink" id="filelink" multiple required> <font color="red">*ไฟล์ PNG JPG GIF เท่านั้น ขนาดไม่เกิน 10MB</font>
      </div>
      <input type="hidden" name="Rid_peple" id="Rid_peple" value="<?php echo $rid; ?>">
    </div>
  </form>
</div>
<?php }else{ ?>

<div class="modal-header" style="background-color:#0f76dc;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><font color="#FFF">แก้ไขรูปภาพ</font></h4>
  </div>
  <div class="modal-body">
   <form class="form-horizontal" id="formImg" name="formImg">

  

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ชื่อรูปภาพ<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="namelink" name="namelink" class="form-control" value="<?php echo $keypeple['nameImg'];?>">
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ไฟล์เอกสาร<font color="red">*</font></label>
      <div class="col-sm-8">
        <input type="file" name="filelink" id="filelink" multiple required> <font color="red">*ไฟล์ PNG JPG GIF เท่านั้น ขนาดไม่เกิน 10MB</font>
      </div>
      <input type="hidden" name="Rid_peple" id="Rid_peple" value="<?php echo $keypeple['researchIdImg'];?>">
    </div>
  </form>
</div>

<script>
        $(document).ready(function() {
        

          

        });
      </script>
  <?php } ?>