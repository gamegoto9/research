<?php
$this->load->view('includes/header');
$this->load->view('includes/navbar');
$this->load->view('includes/slidebar');
?>

<div id="pcont" class="container-fluid" >
    <div class="page-head">
        <h3>ระบบโครงการงานวิจัย .......</h3>
        <!--        <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Category</a></li>
                    <li class="active">Sub Category</li>
                </ol>-->
            </div>

            <div class="cl-mcont">
                <!--        <h3 class="text-center">Content goes here!</h3>  -->

                <div id="main_view"></div>
                <div id="main_view2"></div>

                <div id="dataimages">
                    <div id="detial2">
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <div class="block-flat">
                              <div class="header">
                                <h4>ข้อมูลทั่วไปเกี่ยวกับโครงการ : <label id="showTitle" name="showTitle"></label></h4>
                            </div>
                            <br>
                            <div class="tab-container">
                                
                              <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">วัตถุประส่งค์โครงการ</a></li>
                                <li><a href="#profile" data-toggle="tab">ภาพกิจกรรม</a></li>
                                <li><a href="#messages" data-toggle="tab">วิดิทัศน์</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane active cont">
                                  <h3 class="hthin">วัตถุประส่งค์โครงการ</h3>
                                  <textarea class="form-control" name="txtStandard" id="txtStandard" rows="7" placeholder="ป้อนข้อมูล"></textarea>

                              </div>
                              <div id="profile" class="tab-pane cont">
                               <h3 class="hthin">ภาพกิจกรรม</h3>
                               <form action="upload_file" class="dropzone" id="my-dropzone">
                               </form>



                           </div>
                           <div id="messages" class="tab-pane">
                            <h3 class="hthin">วิดิทัศน์</h3>
                            <textarea class="form-control" name="txtWork" id="txtWork" rows="7" placeholder="ป้อนข้อมูล"></textarea>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >ยกเลิก</button>
        <button id="submit-all" type="button" class="btn btn-primary">บันทึกข้อมูล</button>
    </div>
</div>
</div>
</div>
</div>

</div>



<?php
$this->load->view('includes/footer');
?>


<script type="text/javascript">



   $(document).ready(function() {

       $('#dataimages').hide();

       Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,init: function() {
    var submitButton = document.querySelector("#submit-all")
            myDropzone = this; // closure

            submitButton.addEventListener("click", function() {
                alert($('#name').val());
                myDropzone.processQueue(); // Tell Dropzone to process all queued files.
            });

            // You might want to show the submit button only when 
            // files are dropped here:
            this.on("addedfile", function() {
            // Show submit button here and/or inform user to click it.
        });

        }
    };

    var dropzone = new Dropzone('.dropzone', {
        parallelUploads: 2,
        acceptedFiles: 'image/*,.pdf,.avi,.mp4,.flv',
        filesizeBase: 1024,
        maxFilesize:25000,
        createImageThumbnails: true,
        addRemoveLinks: true,
        dictDefaultMessage: "Drop files here to upload",
        dictFallbackMessage: "Browser anda tidak suport drag'n'drop file upload.",
        dictFileTooBig: "Ukuran file terlalu besar Max ukuran file: {{maxFilesize}}Mb.",
        dictInvalidFileType: "You can't upload files of this type.",
        dictResponseError: "Server responded with {{statusCode}} code.",
        dictCancelUpload: "Cancel upload",
        dictCancelUploadConfirmation: "Are you sure you want to cancel this upload?",
        dictRemoveFile: "Remove file",
        dictRemoveFileConfirmation: null
    });


    


});

   function account(uid){
    var a = uid;
                //alert(a);
                var sdata = {
                    id:uid
                };
                var page = '<?php echo site_url('main/user_form_edit');?>';
                //alert(page);

                $.ajax({
                    type: "POST",
                    url: page,
                    data: sdata
                }).done(function(data) {
                    $('#main_view').html(data);
                    $('#main_view2').load("<?php echo base_url('main/edit_this')?>");
                });


            }

            
        </script>

