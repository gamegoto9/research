<?php 
if($view == "1"){ ?>
  <div class="modal-header" style="background-color:#0f76dc;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><font color="#FFF">เพิ่มนักวิจัย/ผู้ร่วมวิจัย</font></h4>
  </div>
  <div class="modal-body">
   <form class="form-horizontal" id="formPeple" name="formPeple">

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">นัวิจัย/ผู้ร่วมวิจัย<font color="red">*</font></label>
      <div class="col-sm-6">
        <select class="form-control" id="data_peple" name="data_peple">
          <option value="">เลือกผู้วิจัย/ผู้ร่วมวิจัย</option>

          <?php
          foreach ($peples as $peple){

            ?>
            <option value="<?php echo $peple['uId']; ?>"><?php echo $peple['uName']; ?></option>

            <?php   

          }
          ?>    
        </select>
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">สถานะนักวิจัย/ผู้วิจัยร่วม<font color="red">*</font></label>
      <div class="col-sm-6">
        <select class="form-control" id="status_peple" name="status_peple">
          <option value="ผู้วิจัยร่วม">1. ผู้วิจัยร่วม</option>
          <option value="ผู้ช่วยนักวิจัย">2. ผู้ช่วยนักวิจัย</option>
        </select>
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
   <form class="form-horizontal" id="formPeple" name="formPeple">

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">นัวิจัย/ผู้ร่วมวิจัย<font color="red">*</font></label>
      <div class="col-sm-6">
        <select class="form-control" id="data_peple" name="data_peple">
          <option value="">เลือกผู้วิจัย/ผู้ร่วมวิจัย</option>

          <?php
          foreach ($peples as $peple){

            ?>
            <option value="<?php echo $peple['uId']; ?>"><?php echo $peple['uName']; ?></option>

            <?php   

          }
          ?>    
        </select>
      </div>
    </div>

    <div class="form-group" >

      <label for="inputEmail3" class="col-sm-4 control-label">สถานะนักวิจัย/ผู้วิจัยร่วม<font color="red">*</font></label>
      <div class="col-sm-6">
        <select class="form-control" id="status_peple" name="status_peple">
          <option value="ผู้วิจัยร่วม">1. ผู้วิจัยร่วม</option>
          <option value="ผู้ช่วยนักวิจัย">2. ผู้ช่วยนักวิจัย</option>
        </select>
      </div>
      <input type="hidden" name="Rid_peple" id="Rid_peple" value="<?php echo $keypeple['researchPepleId']; ?>">
    </div>
  </form>
</div>

<script>
        $(document).ready(function() {
        
          $("#data_peple").val('<?php echo $keypeple['uId']; ?>');
          $("#status_peple").val('<?php echo $keypeple['status']; ?>');

        });
      </script>

  <?php } ?>