<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="fa fa-gear"></span></button><a href="#" class="navbar-brand"><span>Clean Zone</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <!-- <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Contact <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="dropdown-submenu"><a href="#">Sub menu</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Large menu <b class="caret"></b></a>
              <ul class="dropdown-menu col-menu-2">
                <li class="col-sm-6 no-padding">
                  <ul>
                    <li class="dropdown-header"><i class="fa fa-group"></i>Users</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="dropdown-header"><i class="fa fa-gear"></i>Config</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                  </ul>
                </li>
                <li class="col-sm-6 no-padding">
                  <ul>
                    <li class="dropdown-header"><i class="fa fa-legal"></i>Sales</li>
                    <li><a href="#">New sale</a></li>
                    <li><a href="#">Register a product</a></li>
                    <li><a href="#">Register a client</a></li>
                    <li><a href="#">Month sales</a></li>
                    <li><a href="#">Delivered orders</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul> -->
          <ul class="nav navbar-nav navbar-right user-nav">
            <li class="dropdown profile_menu"><a href="#" data-toggle="dropdown" class="dropdown-toggle"><img alt="Avatar" src="<?PHP echo base_url('assets//img/avatar2.jpg');?>"><span><?PHP echo $this->session->userdata('name'); ?></span><b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li onclick="account(<?PHP echo $this->session->userdata('uId'); ?>)"><a href="#">My Account</a></li>
                <li><a href="#">Profile</a></li>
               
                <li class="divider"></li>
                <li><a href="#">Sign Out</a></li>
              </ul>
            </li>
          </ul>
          
        </div>
      </div>
    </div>

    