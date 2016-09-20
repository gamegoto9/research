<style type="text/css">
  .form-horizontal .control-label{
   text-align:left !important; 
 }
</style>


<script type="text/javascript">


  var actions="";


  function btn_saveData_work() {

    bootbox.confirm("ยืนยันการเพิ่มการนำไปใช้ประโยชน์?", function(result) {
      if(result){

    var faction = "<?php echo site_url('main/insert_data_work_researchs/'); ?>";

     var fdata = {
      txt: $("#txtwork1").val(),
      id: $('#Rid_primary1').val()
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

            //table_peple($('#Rid_primary1').val());
                   
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

  function btn_saveData_standard() {

    bootbox.confirm("ยืนยันการเพิ่มงานวิจัย?", function(result) {
      if(result){

    var faction = "<?php echo site_url('main/insert_data_standard_researchs/'); ?>";

     var fdata = {
      txt: $("#txt1").val(),
      id: $('#Rid_primary1').val()
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


            
           

            //table_peple($('#Rid_primary1').val());
            
           

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

  
  function btn_updateResearch(){
    bootbox.confirm("ยืนยันการแก้ไข?", function(result) {
      if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/update_botkoum/'); ?>";
        var fdata = {
          year: $("#data_year").val(),
          tId: $("#data_tune").val(),
          name_re: $('#name_re').val(),
          name_en_re: $('#name_en_re').val(),
          researchId: $('#Rid_primary1').val(),
          price: $('#price1').val()


        };

        console.log('year = ' + $('#data_year option:selected').val());
        console.log('tune = ' + $('#data_tune option:selected').val());

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

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

  function btn_saveResearch(){
    bootbox.confirm("ยืนยันการบันทึก?", function(result) {
      if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/insert_kortone/'); ?>";
        var fdata = {
          year: $("#data_year").val(),
          tId: $("#data_tune").val(),
          type_re: $("#data_type").val(),
          name_re: $('#name_re').val(),
          name_en_re: $('#name_en_re').val(),
          researchId: $('#Rid_primary1').val(),
          price: $('#price1').val()


        };

        console.log($('#data_tune').val());

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


  function table_status(researchId){
    var a = researchId;
                //alert(a);
                var sdata = {
                  id:researchId
                };
                var page = '<?php echo site_url('main/show_status_table');?>';
                //alert(page);

                $.ajax({
                  type: "POST",
                  url: page,
                  data: sdata
                }).done(function(data) {
                  $('#tablestatus').html(data);
                  
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


////////////////////////////////////////////////////////////////////////////////////////////////////////


function table_print(researchId){

                var a = researchId;
                //alert(a);
                var sdata = {
                  id:researchId
                };
                var page = '<?php echo site_url('main/show_print_table');?>';
                //alert(page);

                $.ajax({
                  type: "POST",
                  url: page,
                  data: sdata
                }).done(function(data) {
                  $('#tableprint').html(data);
                });



              }


              function btn_addprint(){
                actions = "add";
                console.log(actions);
                load_view = "1";
                var rid = $('#Rid_primary1').val();
                $('#model_view2').load("<?php echo base_url('main/add_print/');?>/"+load_view+"/"+rid);
                $('#myModel2').modal('show');
              }

              function btn_insertPrint(){


                if(actions == "add"){
                  bootbox.confirm("ยืนยันการเพิ่มการเผยแพร่?", function(result) {
                    if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/insert_printResearchs/'); ?>";
        var fdata = $("#formPrint").serialize();

        

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

            table_print($('#Rid_peple').val());
            $('#myModel2').modal('hide');

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

        var faction = "<?php echo site_url('main/edit_printResearchs/'); ?>";
        var fdata = $("#formPrint").serialize();

        

        $.post(faction, fdata, function(jdata) {

          if (jdata.is_successful) {
            $.pnotify({
              title: 'แจ้งให้ทราบ!',
              text: jdata.msg,
              type: 'success',
              opacity: 1,
              history: false

            });

             table_print($('#Rid_primary1').val());
            $('#myModel2').modal('hide');
            console.log($('#Rid_peple').val());

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

        function eidt_print(peple_id){

               actions = "edit";
               console.log(actions);
               var peple_id = peple_id;
               $('#model_view2').load("<?php echo base_url('main/edit_print/');?>/"+peple_id);
               $('#myModel2').modal('show');
             }

        function delete_print(peple_id){
              bootbox.confirm("ยืนยันการลบ?", function(result) {
                if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/delete_printResearchs/'); ?>";
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

            table_print($('#Rid_primary1').val());
            

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


//3///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function table_link(researchId){

                var a = researchId;
                //alert(a);
                var sdata = {
                  id:researchId
                };
                var page = '<?php echo site_url('main/show_link_table');?>';
                //alert(page);

                $.ajax({
                  type: "POST",
                  url: page,
                  data: sdata
                }).done(function(data) {
                  $('#tablelink').html(data);
                });



              }


              function btn_addlink(){
                actions = "add";
                console.log(actions);
                load_view = "1";
                var rid = $('#Rid_primary1').val();
                $('#model_view3').load("<?php echo base_url('main/add_link/');?>/"+load_view+"/"+rid);
                $('#myModel3').modal('show');
              }

              function btn_insertLink(){


                if(actions == "add"){
                  bootbox.confirm("ยืนยันเพิ่มเอกสาร?", function(result) {
                    if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/insert_linkResearchs/'); ?>";
        var formData =  new FormData($('#formLink')[0]);

        
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
                opacity: 2,
                history: false
              });

                table_link($('#Rid_peple').val());
                $('#myModel3').modal('hide');
           
            } else {
              $.pnotify({
                title: 'เตือน!',
                text: posts.msg,
                type: 'error',
                opacity: 2,
                history: false
              });
            }
            //viewdataType(sid, page);

          },
          error: function(jqXHR, textStatus, errorThrown) {
                    //handle here error returned
                    $.pnotify({
                title: 'เตือน!',
                text: 'ผิดพลาด',
                type: 'error',
                opacity: 2,
                history: false
              });
                }
            });

       
      }
    });
                }else if(actions == "edit"){
                 bootbox.confirm("ยืนยันการแก้ไข?", function(result) {
                  if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/edit_linkResearchs/'); ?>";
        var formData =  new FormData($('#formLink')[0]);

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
                opacity: 2,
                history: false
              });

                table_link($('#Rid_primary1').val());
                $('#myModel3').modal('hide');
           
            } else {
              $.pnotify({
                title: 'เตือน!',
                text: posts.msg,
                type: 'error',
                opacity: 2,
                history: false
              });
            }
            //viewdataType(sid, page);

          },
          error: function(jqXHR, textStatus, errorThrown) {
                    //handle here error returned
                    $.pnotify({
                title: 'เตือน!',
                text: 'ผิดพลาด',
                type: 'error',
                opacity: 2,
                history: false
              });
                }
            });

       
      }
    });
               }
             }

        function eidt_link(peple_id){

               actions = "edit";
               console.log(actions);
               var peple_id = peple_id;
               $('#model_view3').load("<?php echo base_url('main/edit_link/');?>/"+peple_id);
               $('#myModel3').modal('show');
             }

        function delete_link(peple_id){
              bootbox.confirm("ยืนยันการลบ?", function(result) {
                if(result){
        //alert($("#data_tune").val());

        var faction = "<?php echo site_url('main/delete_linkResearchs/'); ?>";
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

            table_link($('#Rid_primary1').val());
            

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

<?php if($viewview == "2"){
?>

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
            <li id="t3" ><a href="#messages" data-toggle="tab">บทคัดย่อ/รายละเอียดผลงาน</a></li>
            <li id="t4" ><a href="#printtab" data-toggle="tab">การตีพิมพ์เผยแพร่</a></li>
            <li id="t5" ><a href="#worktab" data-toggle="tab">การนำไปใช้ประโยชน์</a></li>
            <li id="t6" ><a href="#linktab" data-toggle="tab">เอกสาร</a></li>

          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane active cont">
              <h3 class="hthin"></h3>
              <div class="content">

                <form class="form-horizontal">

                  <div class="form-group" >

                    <label for="inputEmail3" class="col-sm-2 control-label">รหัส<font color="red">*</font></label>
                    <div class="col-sm-3">
                      <input type="text" name="Rid" id="Rid" parsley-trigger="change" required="" class="form-control" value="<?php echo $researchs1['researchId']; ?>">
                      <input type="hidden" name="Rid_primary1" id="Rid_primary1" value="<?php echo $researchs1['researchId']; ?>">
                    </div>
                  </div>

                  <div class="form-group">

                    <label class="col-sm-2 control-label">ปีงบประมาณ<font color="red">*</font></label>

                    <div class="col-sm-3">
                      <select class="form-control" id="data_year" name="data_year">
                        <option value="">กรุณาเลือกปีงบประมาณ</option>

                        <?php
                        foreach ($tune_years as $tune_year){

                          ?>
                          <option value="<?php echo $tune_year['yearName']; ?>"><?php echo $tune_year['yearName']; ?></option>

                          <?php   

                        }
                        ?>    
                      </select>
                    </div>


                  </div>
                  <div id="detial">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">ประเภทของผลงาน<font color="red">*</font></label>
                      <div class="col-sm-6">
                        <select class="form-control" id="data_tune" name="data_tune">
                          <option value="">กรุณาเลือกประเภทของผลงาน</option>
                          <?php
                        foreach ($nameMains as $nameMain){

                          ?>
                          <option value="<?php echo $nameMain['mMenuId']; ?>"><?php echo $nameMain['mMenuName']; ?></option>

                          <?php   

                        }
                        ?>   
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">ชื่อ งานวิจัย<font color="red">*</font></label>
                      <div class="col-sm-5">
                        <input type="text" name="name_re" id="name_re" parsley-trigger="change" required="" placeholder="ชื่อ งานวิจัย" class="form-control" value="<?php echo $researchs1['researchName']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Article Title<font color="red">*</font></label>
                      <div class="col-sm-5">
                        <input type="text" name="name_en_re" id="name_en_re" parsley-trigger="change" required="" placeholder="Article Title" class="form-control" value="<?php echo $researchs1['researchName_en']; ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">งบประมาณที่ได้รับ<font color="red">*</font></label>
                      <div class="col-sm-2">
                        <input type="number" name="price1" id="price1" parsley-trigger="change" required="" placeholder="งบประมาณที่ได้รับ" class="form-control" value="<?php echo $researchs1['price']; ?>">
                      </div>
                      <label class="col-sm-1 control-label">บาท</label>
                    </div>
                  </div>


                </form>

                <div class="modal-footer">
        
                  <button type="button" class="btn btn-warning" onclick="btn_updateResearch();">แก้ไข</button>
                </div>
    


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
            <h3 class="hthin">บทคัดย่อ/รายละเอียดผลงาน</h3>
            <form name="data_standard" id="data_standard">
            <textarea class="form-control" name="txt1" id="txt1" rows="7" placeholder="ป้อนข้อมูล"><?php echo $researchs1['researchData_standard']; ?></textarea>

            <div class="modal-footer">

              <button type="button" class="btn btn-warning" onclick="btn_saveData_standard();">บันทึก</button>
            </div>
            </form>
          </div>

          <div id="printtab" class="tab-pane">
            <h3 class="hthin">การตีพิมพ์เผยแพร่</h3>
            <div class="content">

              <form class="form-horizontal">

                <div class="form-group" >
                  <div class="modal-footer">

                    <button type="button" class="btn btn-warning" onclick="btn_addprint();">เพิ่มการเผยแพร่</button>
                  </div>
                </div>

                
                <div id="tableprint"></div>


              </form>


            </div>
          </div>

          <div id="worktab" class="tab-pane">
            <h3 class="hthin">การนำไปใช้ประโยชน์</h3>
            <form name="data_standard" id="data_standard">
            <textarea class="form-control" name="txtwork1" id="txtwork1" rows="7" placeholder="ป้อนข้อมูล"><?php echo $researchs1['researchData_work']; ?></textarea>

            <div class="modal-footer">

              <button type="button" class="btn btn-warning" onclick="btn_saveData_work();">บันทึก</button>
            </div>
            </form>
          </div>

          <div id="linktab" class="tab-pane">
            <h3 class="hthin">เอกสาร</h3>
            <div class="content">

              <form class="form-horizontal">

                <div class="form-group" >
                  <div class="modal-footer">

                    <button type="button" class="btn btn-warning" onclick="btn_addlink();">เพิ่มเอกสาร</button>
                  </div>
                </div>

                
                <div id="tablelink"></div>


              </form>


            </div>
          </div>

        </div>
        <!-- </div> -->
      </div>
      <!--
      <div class="modal-footer" id="btnS">
        <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="btn_saveResearch();">บันทึก</button>
      </div>
      -->
    </div>



  </div>
</div>



</div>
<script>
  $(document).ready(function() {
    $('#Rid').prop('disabled', 'disabled');
    $('#data_tune').val('<?php echo $researchs1['typebotkoum']; ?>');
    $('#data_year').val('<?php echo $researchs1['researchYear']; ?>');
   
    

    
    $('#data_tune').change(function() {
     $("#detial :input").attr("disabled", false);
     $("#detial2 :input").attr("disabled", false);
   });

    table_peple($('#Rid_primary1').val());
    table_print($('#Rid_primary1').val());
    table_link($('#Rid_primary1').val());

  });

 
  console.log('<?php echo $researchs1['tId']; ?>');


</script>

<?php
}else{ ?>

<div class="cl-mcont">
  <div class="row">
    <div class="col-sm-12 col-md-12">
      <div class="block-flat">
        <div class="header">
          <h4>บันทึกการขอทุนการวิจัย</h4>
        </div>
        <br>
        <div class="tab-container">
          <!-- <div id="detial2"> -->
          <ul class="nav nav-tabs" id="subItem">
            <li class="active" id="t1"><a href="#home" data-toggle="tab">ข้อมูลทั่วไป</a></li>

            <li id="t2" ><a href="#profile" data-toggle="tab">นักวิจัย/ผุ้วิจัยร่วม</a></li>
            <li id="t3" ><a href="#messages" data-toggle="tab">ที่มา/วัตถุประสงค์โครงการ</a></li>
           
            <li id="t6" ><a href="#linktab" data-toggle="tab">เอกสาร</a></li>
            <li id="t7" onclick="t7();"><a href="#conftab" data-toggle="tab">ยืนยันข้อมูล</a></li>

          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane active cont">
              <h3 class="hthin"></h3>
              <div class="content">

                <form class="form-horizontal">

                  <div class="form-group" >

                    <label for="inputEmail3" class="col-sm-2 control-label">รหัส<font color="red">*</font></label>
                    <div class="col-sm-3">
                      <input type="text" name="Rid" id="Rid" parsley-trigger="change" required="" class="form-control" value="<?php echo "R".sprintf("%05d",$maxid['maxId']); ?>">
                      <input type="hidden" name="Rid_primary1" id="Rid_primary1" value="<?php echo "R".sprintf("%05d",$maxid['maxId']); ?>">
                    </div>
                  </div>

                  <div class="form-group">

                    <label class="col-sm-2 control-label">ปีงบประมาณ<font color="red">*</font></label>

                    <div class="col-sm-3">
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
                      <label class="col-sm-2 control-label">ทุนที่ขอ<font color="red">*</font></label>
                      <div class="col-sm-6">
                        <select class="form-control" id="data_tune" name="data_tune">
                          <option value="">กรุณาเลือกทุน</option>
                          
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">ประเภทของผลงาน<font color="red">*</font></label>
                      <div class="col-sm-6">
                        <select class="form-control" id="data_type" name="data_type">
                          <option value="">กรุณาเลือกประเภทของผลงาน</option>
                          <?php
                        foreach ($nameMains as $nameMain){

                          ?>
                          <option value="<?php echo $nameMain['mMenuId']; ?>"><?php echo $nameMain['mMenuName']; ?></option>

                          <?php   

                        }
                        ?>   
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">ชื่อ งานวิจัย<font color="red">*</font></label>
                      <div class="col-sm-6">
                        <input type="text" name="name_re" id="name_re" parsley-trigger="change" required="" placeholder="ชื่อ งานวิจัย" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Article Title<font color="red">*</font></label>
                      <div class="col-sm-6">
                        <input type="text" name="name_en_re" id="name_en_re" parsley-trigger="change" required="" placeholder="Article Title" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">งบประมาณที่ขอสุทธิ<font color="red">*</font></label>
                      <div class="col-sm-2">
                        <input type="number" name="price1" id="price1" parsley-trigger="change" required="" placeholder="งบประมาณที่ได้รับ" class="form-control">
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
            <h3 class="hthin">ที่มา/วัตถุประสงค์โครงการ</h3>
            <form name="data_standard" id="data_standard">
            <textarea class="form-control" name="txt1" id="txt1" rows="7" placeholder="ป้อนข้อมูล"></textarea>

            <div class="modal-footer">

              <button type="button" class="btn btn-primary" onclick="btn_saveData_standard();">บันทึก</button>
            </div>
            </form>
          </div>

          

          <div id="linktab" class="tab-pane">
            <h3 class="hthin">เอกสาร</h3>
            <div class="content">

              <form class="form-horizontal">

                <div class="form-group" >
                  <div class="modal-footer">

                    <button type="button" class="btn btn-warning" onclick="btn_addlink();">เพิ่มเอกสาร</button>
                  </div>
                </div>

                
                <div id="tablelink"></div>


              </form>


            </div>
          </div>

          <div id="conftab" class="tab-pane">
            <h3 class="hthin">ยืนยันข้อมูล</h3>
            <div class="content">

              <form class="form-horizontal">

                <div id="tablestatus"></div>

                

                
                


              </form>


            </div>
          </div>

        </div>
        <!-- </div> -->
      </div>
      <div class="modal-footer" id="btnS">
        <button type="button" class="btn btn-default" onclick="show_BotKoum();">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="btn_saveResearch();">บันทึก</button>
      </div>
    </div>



  </div>
</div>



</div>

<script>
  $(document).ready(function() {



    $('#Rid').prop('disabled', 'disabled');
    $("#detial :input").attr("disabled", "disabled");

    
    //$("#subItem :input").attr("disabled", "disabled");
    
    $('#subItem li:not(":first")').hide();
    

    $("#year").keyup(function() {
      $("#year").val(this.value.match(/[0-9]*/));
    });

    $('#data_year').change(function() {
     //alert($("#data_year").val());
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


  function t7(){
      table_status($('#Rid_primary1').val());
     
       
  }
</script>

<?php } ?>

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


<div class="modal fade bs-example-modal-lg" id="myModel2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="model_view2">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="btn_insertPrint();">บันทึก</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>


<div class="modal fade bs-example-modal-lg" id="myModel3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div id="model_view3">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="btn_insertLink();">บันทึก</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>




