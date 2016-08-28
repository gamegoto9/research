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

                <div id="main_view">

                </div>
                <div id="main_view2">
                </div>

            </div>

        </div>

        <?php
        $this->load->view('includes/footer');
        ?>


        <script type="text/javascript">
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

