<?php 
if($view == "1"){ ?>
  <div class="modal-header" style="background-color:#0f76dc;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><font color="#FFF">เพิ่มเอกสาร</font></h4>
  </div>
  <div class="modal-body">
   <form class="form-horizontal" id="formLink" name="formLink">

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ประเภทเอกสาร<font color="red">*</font></label>
      <div class="col-sm-6">
        <select class="form-control" id="type_link" name="type_link">
          <option value="เอกสารโครงการ">1. เอกสารโครงการ</option>
          <option value="เอกสารประกอบ">2. เอกสารประกอบ</option>
        </select>
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ชื่อเอกสาร<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="namelink" name="namelink" class="form-control">
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ไฟล์เอกสาร<font color="red">*</font></label>
      <div class="col-sm-8">
        <input type="file" name="filelink" id="filelink" multiple required> <font color="red">*ไฟล์ PDF WORD EXCEL เท่านั้น ขนาดไม่เกิน 10MB</font>
      </div>
      <input type="hidden" name="Rid_peple" id="Rid_peple" value="<?php echo $rid; ?>">
    </div>
  </form>
</div>
<?php }else{ ?>

<div class="modal-header" style="background-color:#0f76dc;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><font color="#FFF">แก้ไขเอกสาร</font></h4>
  </div>
  <div class="modal-body">
   <form class="form-horizontal" id="formLink" name="formLink">

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ประเภทเอกสาร<font color="red">*</font></label>
      <div class="col-sm-6">
        <select class="form-control" id="type_link" name="type_link">
          <option value="เอกสารโครงการ">1. เอกสารโครงการ</option>
          <option value="เอกสารประกอบ">2. เอกสารประกอบ</option>
        </select>
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ชื่อเอกสาร<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="namelink" name="namelink" class="form-control" value="<?php echo $keypeple['nameLink'];?>">
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ไฟล์เอกสาร<font color="red">*</font></label>
      <div class="col-sm-8">
        <input type="file" name="filelink" id="filelink" multiple required> <font color="red">*ไฟล์ PDF WORD EXCEL เท่านั้น ขนาดไม่เกิน 10MB</font>
      </div>
      <input type="hidden" name="Rid_peple" id="Rid_peple" value="<?php echo $keypeple['researchIdLink'];?>">
    </div>
  </form>
</div>

<script>
        $(document).ready(function() {
        
          $("#type_link").val('<?php echo $keypeple['typeLink']; ?>');
          

        });
      </script>
  <?php } ?>