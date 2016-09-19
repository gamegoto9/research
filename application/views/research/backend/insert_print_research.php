<?php 
if($view == "1"){ ?>
  <div class="modal-header" style="background-color:#0f76dc;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><font color="#FFF">เพิ่มนักวิจัย/ผู้ร่วมวิจัย</font></h4>
  </div>
  <div class="modal-body">
   <form class="form-horizontal" id="formPrint" name="formPrint">

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ขื่อผลงาน/แหล่งตีพิมพ์/เผยแพร่<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="txtName" name="txtName" class="form-control">
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ประเภทการเผยแพร่<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="txttype" name="txttype" class="form-control">
      </div>
      <input type="hidden" name="Rid_peple" id="Rid_peple" value="<?php echo $rid; ?>">
    </div>
  </form>
</div>
<?php }else{ ?>

<div class="modal-header" style="background-color:#0f76dc;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><font color="#FFF">แก้ไขนักวิจัย/ผู้ร่วมวิจัย</font></h4>
  </div>
  <div class="modal-body">
   <form class="form-horizontal" id="formPrint" name="formPrint">

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ขื่อผลงาน/แหล่งตีพิมพ์/เผยแพร่<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="txtName" name="txtName" class="form-control" value="<?php echo $keypeple['namePrint']; ?>">
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">ประเภทการเผยแพร่<font color="red">*</font></label>
      <div class="col-sm-6">
        <input type="text" id="txttype" name="txttype" class="form-control" value="<?php echo $keypeple['typePrint']; ?>">
      </div>
      <input type="hidden" name="Rid_peple" id="Rid_peple" value="<?php echo $keypeple['researchIdPrint']; ?>">
    </div>
  </form>
</div>


  <?php } ?>