<div id="cl-wrapper">
  <!--Sidebar item function-->
  <!--Sidebar sub-item function-->
  <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="side-user">
            <!--title-->
          </div>
          <ul class="cl-vnavigation">

            <li><a href="#"><i class="fa fa-home"></i><span>Dashboard</span></a>    
            </li>
            <?php
            if($this->session->userdata('status') == 1){
              // admin UI
              ?>
              <li><a href="#"><i class="fa fa-book"></i><span>ข้อมูลวิจัย/โครงการ</span></a>
                <ul class="sub-menu">
                  <li onclick="modi_mMenu('main')"><a href="#">เพิ่ม หัวข้อวิจัย</a>
                  </li>
                  <li onclick="modi_sMenu('sub')"><a href="#"><span class="label label-primary pull-right">New</span>เพิ่ม หัวข้อโครงการ</a>
                  </li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-calendar"></i><span>ปีงบประมาณ</span></a>
                <ul class="sub-menu">
                  <li onclick="modi_year()">
                    <a href="#">เพิ่ม ปีงบประมาณ
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-money"></i><span>ประเภททุนวิจัย/โครงการ</span></a>
                <ul class="sub-menu">
                  <li onclick="modi_money()"><a href="#">เพิ่ม ทุนวิจัย/โครงการ</a>
                  </li>
                  <!-- <li onclick="modi_money_type()"><a href="#">ทุนวิจัยที่ใช้ในโครงการต่างๆ</a>
                  </li> -->              
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-briefcase"></i><span>ประเภทงานวิจัย</span></a>
                <ul class="sub-menu">
                  <li onclick="modi_typeRe()">
                    <a href="#">เพิ่ม ประเภทงานวิจัย
                    </a>
                  </li>
                  
                </ul>
              </li>



              <li><a href="#"><i class="fa fa-user"></i><span>ข้อมูลนักวิจัย</span></a>
                <ul class="sub-menu">
                  <li onclick="modi_uSer()">
                    <a href="#">เพิ่มเติม ข้อมูลนักวิจัย
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-credit-card"></i><span>สังกัด/หน่วยงาน</span></a>
                <ul class="sub-menu">
                  <li onclick="modi_maJor('major')">
                    <a href="#">เพิ่มข้อมูล คณะ/หน่วยงาน
                    </a>
                  </li>
                  <li onclick="modi_maJor('subject')">
                    <a href="#">เพิ่มข้อมูล ภาควิชา/หลักสูตร
                    </a>
                  </li>
                  
                </ul>
              </li>
              <?php  
            }else{
              ?>
              <li><a href="#"><i class="fa fa-user"></i><span>ข้อมูลส่วนตัว</span></a>
                <ul class="sub-menu">
                  <li onclick="account(<?PHP echo $this->session->userdata('uId'); ?>)"><a href="#"><span class="label label-primary pull-right">New</span>แก้ไขข้อมูลส่วนตัว</a>
                  </li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-book"></i><span>ข้อมูลวิจัย/โครงการ</span></a>
                <ul class="sub-menu">
                <!--
                <li onclick="add_toneRearchs()"><a href="#">ข้อมูลได้รับทุนสนับสนุนงานวิจัย</a>
                  </li>
                  -->

                <li onclick="show_toneRearchs()"><a href="#">ข้อมูลได้รับทุนสนับสนุนงานวิจัย</a>
                  </li>

                    <li onclick="show_projects()"><a href="#">โครงการงานวิจัย</a>
                  </li>

                  <li onclick="show_BotKoum()"><a href="#">บทความทางวิชาการ/งานวิจัย/งานสร้างสรรค์</a>
                  </li>

                   <li onclick="show_kortone()"><a href="#">ขอรับทุนโครงการวิจัย</a>
                  </li>
<!--
                <li onclick="add_researchs()"><a href="#"><span class="label label-primary pull-right">New</span>เพิ่มงานวิจัย</a>
                  </li>
                  <li onclick="add_projects()"><a href="#"><span class="label label-primary pull-right">New</span>เพิ่มงานโครงการ</a>
                  </li>
                  </li>
                  <li onclick="see_researchs()"><a href="#">ข้อมูลงานวิจัย/โครงการ</a>
                  </li>
-->
                </ul>
              </li>


              <?php
            }
            ?>
            

          </ul>
        </div>
      </div>
      <div class="search-field collapse-button">
        <input type="text" placeholder="Search..." class="form-control search">
        <button id="sidebar-collapse" class="btn btn-default"><i class="fa fa-angle-left"></i>
        </button>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function modi_mMenu(title){
      var title = title;
      $('#main_view').load("<?php echo base_url('main/view_menu')?>/"+title);
      $('#main_view2').html('');
    }
    function modi_sMenu(title){
      var title = title;
      $('#main_view').load("<?php echo base_url('main/view_menu')?>/"+title);
      $('#main_view2').html('');
    }
    function modi_maJor(title){
      var title = title;
      $('#main_view').load("<?php echo base_url('main/view_major')?>/"+title);
      $('#main_view2').html('');
    }
    function modi_typeRe(){
      
      $('#main_view').load("<?php echo base_url('main/view_typeRe')?>");
      $('#main_view2').html('');
    }
    function modi_year(){
      
      $('#main_view').load("<?php echo base_url('main/view_year')?>");
      $('#main_view2').html('');
    }
    function modi_maJor(title){
      var title = title;
      $('#main_view').load("<?php echo base_url('main/view_major')?>/"+title);
      $('#main_view2').html('');
    }
    function modi_uSer(){

      $('#main_view').load("<?php echo base_url('main/view_user')?>");
      $('#main_view2').html('');
    }
    function modi_money(){
      $('#main_view').load("<?php echo base_url('main/view_money')?>");
      $('#main_view2').html('');
    }
    function modi_money_type(){
      $('#main_view').load("<?php echo base_url('main/view_money_type')?>");
      $('#main_view2').html('');
    }
    function add_researchs(){
      $('#main_view').load("<?php echo base_url('main/add_researchs')?>");
      $('#main_view2').html('');
    }
    function add_projects(){
      $('#main_view').load("<?php echo base_url('main/add_projects')?>");
      $('#main_view2').html('');
    }
    function add_toneRearchs(){
      $('#main_view').load("<?php echo base_url('main/add_toneResearchs')?>");
      $('#main_view2').html('');
    }
    function add_botkoum(){
      $('#main_view').load("<?php echo base_url('main/add_botkoum')?>");
      $('#main_view2').html('');
    }
    function add_kortone(){
      $('#main_view').load("<?php echo base_url('main/add_kortone')?>");
      $('#main_view2').html('');
    }
    function add_projects1(){
      $('#main_view').load("<?php echo base_url('main/add_projects1')?>");
      $('#main_view2').html('');
    }
    function show_toneRearchs(){
      $('#main_view').load("<?php echo base_url('main/show_toneResearchs')?>");
      $('#main_view2').html('');
    }

    function show_BotKoum(){
      $('#main_view').load("<?php echo base_url('main/show_botKoum')?>");
      $('#main_view2').html('');
    }

    function show_kortone(){
      $('#main_view').load("<?php echo base_url('main/show_kortone')?>");
      $('#main_view2').html('');
    }

     function show_projects(){
      $('#main_view').load("<?php echo base_url('main/show_project')?>");
      $('#main_view2').html('');
    }
  </script>