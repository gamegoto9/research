<style type="text/css">
  .form-horizontal .control-label{
   text-align:left !important; 
 }
</style>

<style>

  body .modal-admin {
    /* new custom width */
    width: 90%;
    /* must be half of the width, minus scrollbar on the left (30px) */
    margin-left: 5%;
  }

</style>

<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="block-flat">
        <div class="header">
          <h4>ค้นหาจากชื่อโครงการ/ปีงบประมาณ</h4>
        </div>
        <br>
        <div id="content">
          <form class="form-horizontal">

            <div class="form-group" >


              <div class="col-sm-12">
                <input type="text" name="Rname" id="Rname" required class="form-control" placeholder="ค้นหาจากชื่อโครงการ">

              </div>
            </div>

            <div class="form-group" >

              <div class="col-sm-4">
               <select class="form-control" id="data_year" name="data_year">
                <option value="">กรุณาเลือกปีงบประมาณ</option>

                <?php
                foreach ($years as $year){

                  ?>
                  <option value="<?php echo $year['researchYear']; ?>"><?php echo $year['researchYear']; ?></option>

                  <?php   

                }
                ?>    
              </select>

            </div>
            <div class="col-sm-2">
              <button type="button" name="btnSearch" id="btnSearch" class="btn btn-default">- ค้นหา -</button>
            </div>
            <div class="col-sm-2">
             <label class="control-label"> ทั้งหมด <?php echo $count['sum_research']; ?> เรื่อง</label>
           </div>
         </div>
       </form>
     </div>



   </div>
 </div>



</div>

<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="block-flat">
      <div id="content">
        <form class="form-horizontal">

          <div class="form-group" >
            <div class="modal-footer">

              <button type="button" class="btn btn-warning" onclick="add_toneRearchs();">เพิ่มข้อมูลการได้รับทุน</button>
            </div>
          </div>


          <div id="tablepeple"></div>


        </form>
        <div id="showTableData">  
        </div>
      </div>



    </div>
  </div>



</div>
</div>

<div class="modal fade bs-example-modal-lg" id="myModelMain" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog  modal-lg modal-admin" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0021f5;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><font color="#fff">แก้ไขข้อมูลการได้รับทุนวิจัย</font></h4>
      </div>
      <div class="modal-body">
       <div id="model_viewMain"></div>
     </div>
     
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
      <button type="button" class="btn btn-primary" onclick="btn_insertPeples();">บันทึก</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#showTableData').load("<?php echo base_url('main/show_data_research/');?>");
  });

  function eidt_researchs(researchId){
    var id = researchId;
    $('#model_viewMain').load("<?php echo base_url('main/edit_toneResearchs/')?>/"+id);
    //$('#main_view2').html('');
    $('#myModelMain').modal('show');
  }

  function delete_researchs(research_id){
    bootbox.confirm("ยืนยันการลบ?", function(result) {
      if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/delete_Researchs/'); ?>";
        var fdata = {id: research_id};

        

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

           
            $('#showTableData').load("<?php echo base_url('main/show_data_research/');?>");

          }else{

           $.pnotify({
            title: 'เตือน!',
            text: jdata.msg,
            type: 'error',
            opacity: 1,
            history: false
          });

         }

       }, 'json');
      }
    });

  }
</script>





