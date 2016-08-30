
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
              <label>ประเภทงานวิจัย</label>
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

              <div class="form-group">
                <label>ปีงบประมาณ</label>

                <input type="text" name="year" id="year" parsley-trigger="change" required="" placeholder="ปีงบประมาณ" class="form-control">
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
            <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">ข้อมูลทั่วไป</a></li>
              <li><a href="#profile" data-toggle="tab">การพิมพ์และการเผยแพร่</a></li>
              <li><a href="#messages" data-toggle="tab">การจำไปใช้งาน</a></li>
            </ul>
            <div class="tab-content">
              <div id="home" class="tab-pane active cont">
                <h3 class="hthin">Basic Tabs</h3>
                <p>This is an example of tabs navigation, you can change the tabs position and use them with icons if you like.</p>
              </div>
              <div id="profile" class="tab-pane cont">
                <h2>Typography</h2>
                <p>This is just an example of content writen by <b>Jeff Hanneman</b>, as you can see it is a clean design with large</p>
              </div>
              <div id="messages" class="tab-pane">..sdfsdfsfsdf.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {


      $('#data_tune').prop('disabled', 'disabled');
      $("#detial :input").attr("disabled", "disabled");
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
                }

              } else {

                alert("NOOOOOO");

              }

            }, 'json');

      });

      $('#data_tune').change(function() {
           $("#detial :input").attr("disabled", false);
      });
    });
  </script>