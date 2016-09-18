<style type="text/css">
  .form-horizontal .control-label{
   text-align:left !important; 
 }
</style>
<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="block-flat">
        <div class="header">
          <h4>ข้อมูลทั่วไปเกี่ยวกับงานวิจัย</h4>
        </div>
        <br>
        <div class="tab-container">
          <!-- <div id="detial2"> -->
          <ul class="nav nav-tabs" id="subItem">
            <li class="active" id="t1"><a href="#home" data-toggle="tab">ข้อมูลทั่วไป</a></li>

            <li id="t2" ><a href="#profile" data-toggle="tab">นักวิจัย/ผุ้วิจัยร่วม</a></li>
            <li id="t3" ><a href="#messages" data-toggle="tab">การจำไปใช้งาน</a></li>

          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane active cont">
              <h3 class="hthin"></h3>
              <div class="content">

                <form class="form-horizontal">

                  <div class="form-group" >

                    <label for="inputEmail3" class="col-sm-2 control-label">รหัสงานวิจัย<font color="red">*</font></label>
                    <div class="col-sm-3">
                      <input type="text" name="Rid" id="Rid" parsley-trigger="change" required="" class="form-control" value="<?php echo "R".sprintf("%05d",$maxid['maxId']); ?>">
                      <input type="hidden" name="Rid_primary1" id="Rid_primary1" value="<?php echo "R".sprintf("%05d",$maxid['maxId']); ?>">
                    </div>
                  </div>

                  <div class="form-group">

                    <label class="col-sm-2 control-label">ปีงบประมาณ<font color="red">*</font></label>

                    <div class="col-sm-2">
                      <select class="form-control" id="data_year" name="data_year">
                        <option value="">กรุณาเลือกปีงบประมาณ</option>

                        <?php
                        foreach ($tune_years as $tune_year){

                          ?>
                          <option value="<?php echo $tune_year['tYear']; ?>"><?php echo $tune_year['tYear']; ?></option>

                          <?php   

                        }
                        ?>    
                      </select>
                    </div>


                  </div>
                  <div id="detial">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">ประเภททุนวิจัย<font color="red">*</font></label>
                      <div class="col-sm-4">
                        <select class="form-control" id="data_tune" name="data_tune">
                          <option>กรุฯาเลือกทุนสนับสุน</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">ชื่อ งานวิจัย<font color="red">*</font></label>
                      <div class="col-sm-5">
                        <input type="text" name="name_re" id="name_re" parsley-trigger="change" required="" placeholder="ชื่อ งานวิจัย" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Article Title<font color="red">*</font></label>
                      <div class="col-sm-5">
                        <input type="text" name="name_en_re" id="name_en_re" parsley-trigger="change" required="" placeholder="Article Title" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">งบประมาณที่ได้รับ<font color="red">*</font></label>
                      <div class="col-sm-2">
                        <input type="text" name="price1" id="price1" parsley-trigger="change" required="" placeholder="งบประมาณที่ได้รับ" class="form-control">
                      </div>
                      <label class="col-sm-1 control-label">บาท</label>
                    </div>
                  </div>


                </form>


              </div>

            </div>
            <div id="profile" class="tab-pane cont">
             <h3 class="hthin">นักวิจัย/ผุ้วิจัยร่วม</h3>
             <div class="content">

              <form class="form-horizontal">

                <div class="form-group" >
                  <div class="modal-footer">

                    <button type="button" class="btn btn-warning" onclick="btn_addPeple();">เพิ่มนักวิจัย/ผู้ร่วมวิจัย</button>
                  </div>
                </div>

                
                <div id="tablepeple"></div>


              </form>


            </div>


          </div>
          <div id="messages" class="tab-pane">
            <h3 class="hthin">การนำไปใช้งาน</h3>
            <textarea class="form-control" name="txtWork" id="txtWork" rows="7" placeholder="ป้อนข้อมูล"></textarea>
          </div>
        </div>
        <!-- </div> -->
      </div>
      <div class="modal-footer" id="btnS">
        <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="btn_saveResearch();">บันทึก</button>
      </div>
    </div>



  </div>
</div>



</div>

<div class="modal fade bs-example-modal-lg" id="myModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="model_view">
        
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
      <button type="button" class="btn btn-primary" onclick="btn_insertPeples();">บันทึก</button>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>




<script type="text/javascript">


  var actions="";
  $(document).ready(function() {



    $('#Rid').prop('disabled', 'disabled');
    $("#detial :input").attr("disabled", "disabled");

    
    //$("#subItem :input").attr("disabled", "disabled");
    
    //$('#subItem li:not(":first")').hide();
    

    $("#year").keyup(function() {
      $("#year").val(this.value.match(/[0-9]*/));
    });

    $('#data_year').change(function() {
     alert($("#data_year").val());
     var faction = "<?php echo site_url('main/select_money/'); ?>";

     var fdata = {id: $("#data_year").val()};

     $.post(faction, fdata, function(jdata) {

      if (jdata.is_successful) {


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
          options += '<option> ไม่มีข้อมูล </option>';

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
          year: $("#data_year").val(),
          tId: $("#data_tune").val(),
          name_re: $('#name_re').val(),
          name_en_re: $('#name_en_re').val(),
          researchId: $('#Rid_primary1').val(),
          price: $('#price1').val()


        };

        console.log($('#data_year option:selected').val());

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });


            $('#subItem li:not(":first")').show();
            $("#btnS :input").attr("disabled", "disabled");

            table_peple($('#Rid_primary1').val());
            
            //$('#t1').removeClass("active");
            // add class to the one we clicked
           // $('#t2').addClass("active");
           // var selected = $("#subItem").tabs("option", "selected");
           // $("#subItem").tabs("option", "selected", selected + 1);

            // $('#subItem ul').tabs('select', 1);
           //$( "#subItem" ).tabs({ active: 1 });
            //$('#subItem').tabs({ selected: 2 });

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

  function table_peple(researchId){

    var a = researchId;
                //alert(a);
                var sdata = {
                  id:researchId
                };
                var page = '<?php echo site_url('main/show_peple_table');?>';
                //alert(page);

                $.ajax({
                  type: "POST",
                  url: page,
                  data: sdata
                }).done(function(data) {
                  $('#tablepeple').html(data);
                  // $('#main_view2').load("<?php echo base_url('main/edit_this')?>");
                });



              }


              function btn_addPeple(){
                actions = "add";
                console.log(actions);
                load_view = "1";
                var rid = $('#Rid_primary1').val();
                $('#model_view').load("<?php echo base_url('main/add_peples/');?>/"+load_view+"/"+rid);
                $('#myModel').modal('show');
              }

   function btn_insertPeples(){


    if(actions == "add"){
      bootbox.confirm("ยืนยันการเพิ่มงานวิจัย?", function(result) {
        if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/insert_pepleResearchs/'); ?>";
        var fdata = $("#formPeple").serialize();

        

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

            table_peple($('#Rid_peple').val());
             $('#myModel').modal('hide');
        
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
    }else if(actions == "edit"){
       bootbox.confirm("ยืนยันการแก้ไข?", function(result) {
        if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/edit_pepleResearchs/'); ?>";
        var fdata = $("#formPeple").serialize();

        

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

            table_peple($('#Rid_primary1').val());
             $('#myModel').modal('hide');
        
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
  }

function eidt_peple(peple_id){

     actions = "edit";
                console.log(actions);
    var peple_id = peple_id;
    $('#model_view').load("<?php echo base_url('main/edit_peples/');?>/"+peple_id);
    $('#myModel').modal('show');
  }

  function delete_peple(peple_id){
    bootbox.confirm("ยืนยันการลบ?", function(result) {
        if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/delete_pepleResearchs/'); ?>";
         var fdata = {id: peple_id};

        

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

            table_peple($('#Rid_primary1').val());
            
        
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