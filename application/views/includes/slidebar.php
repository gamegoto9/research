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
            <li><a href="#"><i class="fa fa-bars"></i><span>เมนู</span></a>
              <ul class="sub-menu">
                <li onclick="modi_mMenu('main')"><a href="#">เพิ่ม แก้ไข เมนูหลัก</a>
                </li>
                <li onclick="modi_sMenu('sub')"><a href="#"><span class="label label-primary pull-right">New</span>เพิ่ม แก้ไข เมนูย่อย</a>
                </li>
              </ul>
            </li>

            <li><a href="#"><i class="fa fa-user"></i><span>ข้อมูลผุ้ใช้</span></a>
              <ul class="sub-menu">
                <li onclick="modi_uSer()">
                  <a href="#">พิ่มเติม แก้ไข ข้อมุลผู้ใช้
                  </a>
                </li>
                
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-user"></i><span>สังกัด/หน่วยงาน</span></a>
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
    }
    function modi_sMenu(title){
      var title = title;
      $('#main_view').load("<?php echo base_url('main/view_menu')?>/"+title);
    }
    function modi_maJor(title){
      var title = title;
      $('#main_view').load("<?php echo base_url('main/view_major')?>/"+title);
    }
    function modi_maJor(title){
      var title = title;
      $('#main_view').load("<?php echo base_url('main/view_major')?>/"+title);
    }
    function modi_uSer(){
      
      $('#main_view').load("<?php echo base_url('main/view_user')?>");
    }
  </script>