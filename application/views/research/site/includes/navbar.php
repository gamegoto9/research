<div id="menuBar">
    <div class="nav">
        <div class="container">
            <!-- Standard Nav (x >= 768px) -->
            <div class="standard">
                <div class="five column alpha">
                    <div class="logo">
                       <a href=""><img src="<?php echo base_url('assets/them/enzyme/images/logo_new.png') ?>" /></a>
                       <!-- Large Logo -->
                   </div>
               </div>
               <div class="eleven column omega tabwrapper">
                <div class="menu-wrapper">
                    <ul class="tabs menu">

                        <?php foreach ($mainMenu as $mMenu){

                            ?>
                            <li>
                                <a href="#"  id="homeNav"><span><?php echo $mMenu['mMenuName'] ?></span></a>

                                <ul class="child">

                                    <?php foreach ($subMenu as $key=>$sMenu){ 
                                        if($mMenu['mMenuId'] == $sMenu['mMenuId']){
                                            ?>
                                            <li>
                                                <a href="#"><?php echo $sMenu['sMenuName'] ?></a>
                                            </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <li>
                                    <a href="#">รายงานต่างๆ</a>
                                    </li>

                                </ul>

                            </li>
                            <?php } ?>
                            <li>
                                <a href="#">

                                    นักวิจัย
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('main/logIn');?>">
                                    <i class="fa fa-lock"> </i>
                                    เข้าสู่ระบบ
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- Standard Nav Ends, Start of Mini -->
            <div class="mini">
                <div class="twelve column alpha omega mini">
                    <div class="logo">
                        <a href="index.html"><img src="<?php echo base_url('assets/them/enzyme/images/logoMINI.png')?>" /></a>
                        <!-- Small Logo -->
                    </div>
                </div>
                <div class="twelve column alpha omega navagation-wrapper">
                    <select class="navagation">
                        <option value="" selected="selected">Site Navagation</option>
                    </select>
                </div>
            </div>
            <!-- Start of Mini Ends -->
        </div>
    </div>
</div>

