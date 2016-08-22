<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title>Clean Zone</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:300,200,100" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/lib/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.min.css');?>">
    <!--if lt IE 9script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/jquery.nanoscroller/css/nanoscroller.css');?>">
    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
  </head>
  <body class="texture">
<div id="cl-wrapper" class="login-container">
    <div class="middle-login">
        <div class="block-flat">
            <div class="header">
                <h3 class="text-center"><img src="<?php echo base_url('assets/img/logo.png')?>" alt="logo" class="logo-img">การแข่งขันกีฬานานาชาติ ครั้งที่ 12</h3>
            </div>
            <div>
                <form style="margin-bottom: 0px !important;" class="form-horizontal" id="form_data">
                    <div class="content">
                        <h4 class="title">Login Access</h4>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input id="name" type="text" placeholder="Username" class="form-control" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input id="sex" type="password" placeholder="Password" class="form-control" name="sex">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="foot">
<!--                        <button data-dismiss="modal" type="button" class="btn btn-default">Register</button>-->
                        <button  type="submit" class="btn btn-primary" id="btn_save">Log me in</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center out-links"><a href="#">© 2015 Your Company</a></div>
    </div>
</body>
    
    

<?php
$this->load->view('includes/footer');
?>
<!-- bootboxjs -->
<script src="<?php echo base_url('assets/UI/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>

<!--pnotify-->
<link href="<?php echo base_url('assets/UI/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/UI/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/UI/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>
    
<script>
    $(document).ready(function(){

        $("#btn_save").click(function(){
           
                
                    var faction = "<?php echo site_url('/sports/check_login'); ?>";
                    var fdata = $("#form_data").serialize();
                    $.post(faction, fdata, function(jdata){
                                         

                        if(jdata.is_successful){

                            $.pnotify({
                                title: 'แจ้งให้ทราบ!',
                                text: jdata.msg,
                                type: 'success',
                                opacity: 1,
                                history: false
                                
                            });
                            
                            $(window.location).attr('href', '<?php echo base_url('/sports/main');?>');
                        }else{
  
                            $.pnotify({
                                title: 'เตือน!',
                                text: jdata.msg,
                                type: 'error',
                                opacity: 1,
                                history: false
                            });
                        }
                        
                    },'json');
                
          
            return false;
        });
      
        
     
  

    });
</script>