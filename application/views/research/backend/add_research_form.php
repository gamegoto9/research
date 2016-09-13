
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-6 col-md-6">
      <div class="block-flat">
        <div class="header">
          <h3>ข้อมูล งานวิจัย</h3>
        </div>
        <div class="content">

          <div class="form-group">
            <label>ประเภทงานวิจัย</label>
            <select class="form-control" id="data_sub" name="data_sub">

              <optgroup label="<?php echo $nameMain['mMenuName']; ?>">
                <?php
                foreach ($projects as $project){

                  ?>
                  <option value="<?php echo $project['sMenuId']; ?>"><?php echo $project['sMenuName']; ?></option>

                  <?php   

                }
                ?>    
              </select>
            </div>
            <div class="form-group">
              <label>ประเภททุนวิจัย</label>
              <select class="form-control" id="data_tune" name="data_tune">
              </select>
            </div>



          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6">
        <div class="block-flat">
          <div class="header">
            <h3>รายละเอียด งานวิจัย</h3>
          </div>
          <div class="content">
            <div id="detial">

              <div class="form-group" >
              <label>รหัสงานวิจัย</label>
                <input type="text" name="Rid" id="Rid" parsley-trigger="change" required="" class="form-control" value="<?php echo "R".sprintf("%03d",$maxid['maxId']); ?>">
                <input type="hidden" name="Rid_primary" id="Rid_primary" value="<?php echo "R".sprintf("%03d",$maxid['maxId']); ?>">
              </div>
              <div class="form-group" >
                <label>ชื่อ งานวิจัย</label>
                <input type="text" name="name_re" id="name_re" parsley-trigger="change" required="" placeholder="ชื่อ งานวิจัย" class="form-control">
              </div>

              <div class="form-group">
                <label>Article Title</label>
                <input type="text" name="name_en_re" id="name_en_re" parsley-trigger="change" required="" placeholder="Article Title" class="form-control">
              </div>

              <div class="form-group">
                <label>ผู้เข้าร่วมโครงการ</label>
                <input type="text" name="nickName" id="nickName" parsley-trigger="change" required="" placeholder="ผู้เข้าร่วมโครงการ" class="form-control">
              </div>

              <div class="form-horizontal">
                <div class="col-sm-2 col-md-2">
                  <label class="control-label">ปีงบประมาณ</label>
                </div>
                <div class="col-sm-3 col-md-3">
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
      <div class="col-sm-12 col-md-12">
        <div class="block-flat">
          <div class="header">
            <h4>ข้อมูลทั่วไปเกี่ยวกับงานวิจัย</h4>
          </div>
          <br>
          <div class="tab-container">
            <div id="detial2">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">ข้อมูลทั่วไป</a></li>
                <li><a href="#profile" data-toggle="tab">การพิมพ์และการเผยแพร่</a></li>
                <li><a href="#messages" data-toggle="tab">การจำไปใช้งาน</a></li>
              </ul>
              <div class="tab-content">
                <div id="home" class="tab-pane active cont">
                  <h3 class="hthin">ข้อมูลทั่วไป</h3>
                  <textarea class="form-control" name="txtStandard" id="txtStandard" rows="7" placeholder="ป้อนข้อมูล"></textarea>

                </div>
                <div id="profile" class="tab-pane cont">
                 <h3 class="hthin">การพิมพ์และการเผยแพร่</h3>
                 <textarea class="form-control" name="txtPrint" id="txtPrint" rows="7" placeholder="ป้อนข้อมูล"></textarea>
               </div>
               <div id="messages" class="tab-pane">
                <h3 class="hthin">การนำไปใช้งาน</h3>
                <textarea class="form-control" name="txtWork" id="txtWork" rows="7" placeholder="ป้อนข้อมูล"></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
      <button type="button" class="btn btn-primary" onclick="btn_saveResearch();">บันทึก</button>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() {


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
                  $("#detial2 :input").attr("disabled", false);
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


  function btn_saveResearch(){
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

        //$('#showDataTable').load("<?php echo base_url('main/modi_user')?>");

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