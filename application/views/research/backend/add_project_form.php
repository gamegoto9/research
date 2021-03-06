
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="block-flat">
        <div class="header">
          <h3>ข้อมูล โครงการ</h3>
        </div>
        <div class="content">

          <div class="form-group">
            <label>ประเภทโครงการ</label>
            <select class="form-control" id="data_sub" name="data_sub">
              <?php
              foreach ($mains as $main){
                ?>  
                <optgroup label="<?php echo $main['mMenuName']; ?>">
                  <?php
                  foreach ($projects as $project){
                    if($main['mMenuId'] == $project['mMenuId']){
                      ?>
                      <option value="<?php echo $project['sMenuId']; ?>"><?php echo $project['sMenuName']; ?></option>

                      <?php   
                    }
                  }
                } ?>  
              </select>
            </div>
            <div class="form-group">
              <label>ประเภททุน</label>
              <select class="form-control" id="data_tune" name="data_tune">
              </select>
            </div>



          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
        <div class="block-flat">
          <div class="header">
            <h3>รายละเอียด โครงการ</h3>
          </div>
          <div class="content">
            <div id="detial">

              <div class="form-group" >
              <!-- <label>รหัสงานวิจัย</label>
                <input type="text" name="Rid" id="Rid" parsley-trigger="change" required="" class="form-control" value="<?php echo $maxid['maxId']+1; ?>">
              </div> -->
              <div class="form-group" >
                <label>ชื่อโครงการ</label>
                <input type="text" name="name_re" id="name_re" parsley-trigger="change" required="" placeholder="ชื่อโครงการ" class="form-control">
              </div>

              <div class="form-group">
                <label>พื้นที่ดำเนินงาน</label>
                <input type="text" name="area" id="area" parsley-trigger="change" required="" placeholder="พื้นที่ดำเนินงาน" class="form-control">
              </div>

              <div class="form-group form-horizontal">

                <div class="col-sm-12 col-md-12">
                  <label class="control-label">ช่วงเวลาดำเนินงาน</label>
                </div>
                <br><br>
                <div class="col-sm-12 col-md-2">
                 <label class="control-label">เริ่มตั้งแต่</label>

               </div>
               <div class="col-sm-12 col-md-4">
                <input type="date" name="date_start" id="date_start" parsley-trigger="change"  class="form-control required" 
                >
              </div>
              <div class="col-sm-12 col-md-1">
               <label class="control-label">ถึง</label>
             </div>
             <div class="col-sm-12 col-md-5">
              <input type="date" name="date_end" id="date_end" parsley-trigger="change"   class="form-control required" 
              >
            </div>
          </div>
          <br><br>
          <div class="form-horizontal">
            <div class="col-sm-12 col-md-2">
              <label class="control-label">ปีงบประมาณ</label>
            </div>
            <div class="col-sm-12 col-md-3">
              <input type="text" maxlength="4" pattern="([0-9]|[0-9]|[0-9])" name="year" id="year" parsley-trigger="change"  placeholder="25xx" class="form-control required" 
              >
            </div>
            <br>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
    <button type="button" class="btn btn-primary" onclick="btn_saveProjects();">บันทึก</button>
  </div>
</div>
</div>




<script type="text/javascript">
  $(document).ready(function() {

    $('#dataimages').show();

    $('#data_tune').prop('disabled', 'disabled');
    $("#detial :input").attr("disabled", "disabled");
    $("#detial2 :input").attr("disabled", "disabled");

    $("#year").keyup(function() {
      $("#year").val(this.value.match(/[0-9]*/));
    });

    $('#data_sub').change(function() {

      var faction = "<?php echo site_url('main/select_money/'); ?>";

      var fdata = {id: $("#data_sub").val()};

      $.post(faction, fdata, function(jdata) {

        if (jdata.is_successful) {

                //alert('aaa');
                var options;

                if(jdata.data.length > 0){

                  for (var i = 0; i < jdata.data.length; i++) {
                    options += '<option value="' + jdata.data[i].tId + '">' +
                    jdata.data[i].tName + '</option>';
                  }

                  $('#data_tune').html(options);

                  $('#data_tune').prop('disabled', false);
                  $("#detial :input").attr("disabled", false);
                  
                }else{
                  options += '<option value=""> ไม่มีข้อมูล</option>';

                  $('#data_tune').html(options);
                  $('#data_tune').prop('disabled', 'disabled');
                  $("#detial :input").attr("disabled", "disabled");
                  $("#detial2 :input").attr("disabled", "disabled");
                }

              } else {

                alert("NOOOOOO");

              }

            }, 'json');

    });

    $('#data_tune').change(function() {
     $("#detial :input").attr("disabled", false);
     $("#detial2 :input").attr("disabled", false);
   });
  });


  function btn_saveProjects(){
    bootbox.confirm("ยืนยันการเพิ่มงานวิจัย?", function(result) {
      if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/insert_rerearchs/'); ?>";
        var fdata = {
          sMenuId: $("#data_sub").val(),
          tId: $("#data_tune").val(),
          name_re: $('#name_re').val(),
          name_en_re: $('#name_en_re').val(),
          nickName: $('#nickName').val(),
          year: $('#year').val(),
          txtStandard: $('#txtStandard').val(),
          txtPrint: $('#txtPrint').val(),
          txtWork: $('#txtWork').val()

        };

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

            $("#detial2 :input").attr("disabled", false);

        //$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");

      }else{

       $.pnotify({
        title: 'เตือน!',
        text: jdata.msg,
        type: 'error',
        opacity: 1,
        history: false
      });
       $("#detial2 :input").attr("disabled", "disabled");
     }

   }, 'json');
      }
    });
  }

</script>