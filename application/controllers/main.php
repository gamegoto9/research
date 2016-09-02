<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("research_model");

        $val_lang = $this->session->userdata('language');

        if (!($this->session->userdata('language'))) {
            $this->session->set_userdata('language', 'english');
        }
    }

    public function index() {



        $data['mainMenu'] = $this->research_model->getMainMenu();
        $data['subMenu'] = $this->research_model->getSubMenu();


        $this->load->view('research/site/main_view',$data);
        

    }

    public function admin(){
       //$data['page'] = "0";
     $this->load->view('content_view');
 }

 function contentShow(){
     $this->load->view('research/site/content_view');
 }
 function slideShow(){
     $this->load->view('research/site/includes/slidebar');
 }

 function logIn(){
     $this->load->view('research/backend/login');
 }
 function logout(){

     $this->session->sess_destroy();
 }

 public function modi_mMenu(){
    $data['mainMenu'] = $this->research_model->getMainMenu();
    $data['id_menu'] = "0";
    $this->load->view('research/backend/mMenuTable',$data);
}

public function modi_mMajor(){
    $data['mainMenu'] = $this->research_model->getMajor();
    $data['id_menu'] = "0";
    $this->load->view('research/backend/mMajorTable',$data);
}

public function modi_sMenu(){

    $data['mainMenu'] = $this->research_model->getSubMenu();
    $data['id_menu'] = "1";
    $this->load->view('research/backend/mMenuTable',$data);
}
public function modi_mSubject(){

    $data['mainMenu'] = $this->research_model->getSubject();
    $data['id_menu'] = "1";
    $this->load->view('research/backend/mMajorTable',$data);
}

public function modi_user(){

    $data['mainMenu'] = $this->research_model->getUserData();
    
    $this->load->view('research/backend/userTable',$data);
}

public function view_menu($title){
    if($title == "main"){
        $data['title'] = "เพิ่ม หัวข้อวิจัย";
        $data['title_id'] = 0;
    }else{
        $data['title'] = "เพิ่ม หัวข้อโครงการ";
        $data['title_id'] = 1;
    }
    $this->load->view('research/backend/mMenu_view',$data);
}
public function view_major($title){
    if($title == "major"){
        $data['title'] = "เพิ่ม คณะ/หน่วยงาน";
        $data['title_id'] = 0;
    }else{
        $data['title'] = "เพิ่ม ภาควิชา/หลักสูตร";
        $data['title_id'] = 1;
    }
    $this->load->view('research/backend/mMajor_view',$data);
}
public function view_user(){

    $data['title'] = "เพิ่ม ข้อมูลนักวิจัย";

    
    $this->load->view('research/backend/user_view',$data);
}

public function view_money(){
    $data['title'] = "เพิ่ม ทุนวิจัย/โครงการ";  
    $data['mains'] = $this->research_model->getMainMenu();
    $data['projects'] = $this->research_model->getSubMenu(); 
    $this->load->view('research/backend/money_view',$data);
}

public function getDataTune(){

    $id = $this->input->post('id');

    $sql = "select tId,tName
    from tune
    where sMenuId = '$id'";


    $data = $this->db->query($sql)->result_array();

    echo json_encode(array(
        'is_successful' => TRUE,
        'data' => $data
        ));

}
public function check_login() {

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('username');
        $msg.= form_error('password');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');


        $query = $this->db->get_where('user', array('username' => $data['username'], 'password' => $data['password']));

        $rowcount = $query->num_rows();

        if ($rowcount > 0) {
//                $result = array('user','status','name','Pid');

            foreach ($query->result_array() as $row) {



                $dataArray = array(
                    'user'  => $data['username'],
                    'status'     => $row['statusId'],
                    'name' => $row['uName'],
                    'uId' => $row['uId']
                    
                    );

                $this->session->set_userdata($dataArray);
            }

//                $this->session->set_userdata($result);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => 'เรียบร้อย รอซักครู่'
                ));
        } else {
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'ข้อมูลไม่ถูกต้อง'
                ));
        }
    }
}

public function myAccount($uid){

}

public function mMenu_form($view,$id){

    if($id == 0){
        $data['send'] = "add";
        $data['menu_id'] = 0;
        $this->load->view('research/backend/mMenu_form',$data);
    }else{
        $data['send'] = "add";
        $data['menu_id'] = 1;
        $data['mainMenu'] = $this->research_model->getMainMenu();
        $this->load->view('research/backend/mMenu_form',$data);
    }
}

public function mMajor_form($view,$id){

    if($id == 0){
        $data['send'] = "add";
        $data['menu_id'] = 0;
        $this->load->view('research/backend/mMajor_form',$data);
    }else{
        $data['send'] = "add";
        $data['menu_id'] = 1;
        $data['mainMenu'] = $this->research_model->getMajor();
        $this->load->view('research/backend/mMajor_form',$data);
    }
}

public function user_form($view){


    $data['send'] = "add";
    $data['major'] = $this->research_model->getMajor();
    $data['subject'] = $this->research_model->getSubject();
    $data['status'] = $this->research_model->getStatusUser();
    $this->load->view('research/backend/user_form',$data);

}


public function money_form($view){


    $data['send'] = "add";
    $data['mains'] = $this->research_model->getMainMenu();
    $data['projects'] = $this->research_model->getSubMenu(); 
    $data['title'] = "เพิ่มทุน";
    $this->load->view('research/backend/money_form',$data);

}


public function user_form_view($id){



 $sql = "SELECT
 `user`.username,
 `user`.`password`,
 `user`.uName,
 status_user.statusName,
 `subject`.mSubjectName,
 major.mMajorName,
 `user`.note,
 `user`.uId,
 `user`.img
 FROM
 major
 INNER JOIN `subject` ON major.mMajorId = `subject`.mMajorId
 INNER JOIN `user` ON `subject`.mSubjectId = `user`.mSubjectId
 INNER JOIN status_user ON `user`.statusId = status_user.statusId
 WHERE  uId = '$id'
 ";

 $data['dataValue'] = $this->db->query($sql)->row_array();
 $this->load->view('research/backend/user_see_view',$data);

}

public function money_form_view($id){



 $sql = "SELECT
 tune.tName,
 submenu.sMenuName,
 mainmenu.mMenuName
 FROM
 tune
 INNER JOIN submenu ON tune.sMenuId = submenu.sMenuId
 INNER JOIN mainmenu ON submenu.mMenuId = submenu.sMenuId
 WHERE  tId = '$id'
 ";

 $data['dataValue'] = $this->db->query($sql)->row_array();
 $this->load->view('research/backend/money_see_view',$data);

}


public function mMenu_form_edit(){

    $id = $this->input->post('id');
    $menu_type = $this->input->post('menu_type');

    if($menu_type == 0){

        $sql = "select * from mainmenu where mMenuId = '$id'";
        $data['dataValue'] = $this->db->query($sql)->row_array();
        $data['send'] = "edit";
        $data['menu_id'] = 0;
    }else{
        $sql = "select sMenuId,sMenuName,mMenuName,submenu.mMenuId 
        from submenu,mainmenu 
        where submenu.mMenuId = mainmenu.mMenuId and
        sMenuId = '$id'";
        $data['dataValue'] = $this->db->query($sql)->row_array();
        $data['mainMenu'] = $this->research_model->getMainMenu();
        $data['send'] = "edit";
        $data['menu_id'] = 1;
    }

    $this->load->view('research/backend/mMenu_form',$data);
    
}

public function mMajor_form_edit(){

    $id = $this->input->post('id');
    $menu_type = $this->input->post('menu_type');

    if($menu_type == 0){

        $sql = "select * from major where mMajorId = '$id'";
        $data['dataValue'] = $this->db->query($sql)->row_array();
        $data['send'] = "edit";
        $data['menu_id'] = 0;
    }else{
        $sql = "select mSubjectId,mSubjectName,mMajorName,subject.mMajorId 
        from subject,major 
        where subject.mMajorId = major.mMajorId and
        mSubjectId = '$id'";
        $data['dataValue'] = $this->db->query($sql)->row_array();
        $data['mainMenu'] = $this->research_model->getMajor();
        $data['send'] = "edit";
        $data['menu_id'] = 1;
    }

    $this->load->view('research/backend/mMajor_form',$data);
    
}

public function money_form_edit(){

    $id = $this->input->post('id');
    $sql = "select * from tune where tId = '$id'";
    $data['dataValue'] = $this->db->query($sql)->row_array();
    $data['mains'] = $this->research_model->getMainMenu();
    $data['projects'] = $this->research_model->getSubMenu(); 
    
    $data['send'] = "edit";
    $data['title'] = "แก้ไขประเภททุน";
    $this->load->view('research/backend/money_form',$data);

}

public function user_form_edit(){

    $id = $this->input->post('id');

    if($id == 1){
        $sql = "SELECT * from user";
        $data['pass'] = "admin";

    }else{

        $sql = "SELECT
        `user`.username,
        `user`.`password`,
        `user`.uName,
        status_user.statusName,
        `user`.statusId,
        `user`.mSubjectId,
        `subject`.mSubjectName,
        `subject`.mMajorId,
        major.mMajorName,
        `user`.note,
        `user`.uId,
        img
        FROM
        major
        INNER JOIN `subject` ON major.mMajorId = `subject`.mMajorId
        INNER JOIN `user` ON `subject`.mSubjectId = `user`.mSubjectId
        INNER JOIN status_user ON `user`.statusId = status_user.statusId
        WHERE  uId = '$id' 
        ";
        $data['pass'] = "admin";

    }

    $data['dataValue'] = $this->db->query($sql)->row_array();
    $data['major'] = $this->research_model->getMajor();
    $data['subject'] = $this->research_model->getSubject();
    $data['status'] = $this->research_model->getStatusUser();

    $data['send'] = "edit";

    

    $this->load->view('research/backend/user_form_edit',$data);
    
}

public function edit_this(){
    $this->load->view('research/backend/user_edit');
}


public function dataTable_money($id){
    $sql = "select * from tune where sMenuId = '$id'";
    $data['dataValues'] = $this->db->query($sql)->result_array();
    $this->load->view('research/backend/moneyTable',$data);
}

public function select_money(){

    $id = $this->input->post('id');
    $sql = "select * from tune where sMenuId = '$id'";
    $data = $this->db->query($sql)->result_array();

    echo json_encode(array(
        'is_successful' => TRUE,
        'data' => $data
        ));
}

public function edit_admin(){

    $id = $this->input->post('uId');
    $this->load->library('form_validation');

    if($id == 1){

        $this->form_validation->set_rules('uName', 'ชื่อ-นามสกุล', 'required');
        $this->form_validation->set_rules('note', 'ความเชี่ยวชาญ', 'required');     
        $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'required');
        $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
        

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

          $msg = form_error('uName');
          $msg .= form_error('note'); 
          $msg .= form_error('username');
          $msg .= form_error('password');




          echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));


      } else {



        $uName = $this->input->post('uName');
        $uNote = $this->input->post('note');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $newpassword = $this->input->post('newpassword');
        $conpassword = $this->input->post('conpassword');

        $query = $this->db->get_where('user', array('password' => $password));

        $rowcount = $query->num_rows();

        if ($rowcount > 0) {

            if($newpassword == "" && $conpassword == ""){

                $sql = "update user set uName = '$uName',username = '$username',note = '$uNote' where uId = '$id'";
                $msg = 'แก้ไขข้อมูลเรียบร้อย';
                $con_1 = TRUE;
                $result = $this->db->query($sql);
            }else{
                if($newpassword == $conpassword){
                    $sql = "update user set uName = '$uName',username = '$username',password = '$newpassword',note = '$uNote' where uId = '$id'";
                    $msg = 'แก้ไขข้อมูลเรียบร้อย';
                    $con_1 = TRUE;
                    $result = $this->db->query($sql);
                }else{
                    $con_1 = FALSE;
                    $msg = 'รหัสผ่านใหม่ไม่ถูกต้อง';
                }
            }



            echo json_encode(array(
                'is_successful' => $con_1,
                'msg' =>  $msg
                ));
        }else{
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'รหัสผ่านไม่ถูกต้อง'
                ));

        }
    }

}else{

    $this->form_validation->set_rules('uName', 'ชื่อ-นามสกุล', 'required');
    $this->form_validation->set_rules('data_major', 'ชื่อคณะ/หน่วยงาน', 'required');
    $this->form_validation->set_rules('note', 'ความเชี่ยวชาญ', 'required');
    $this->form_validation->set_rules('data_subject', 'ภาควิชา/หลักสูตร', 'required');
    $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'required');
    $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
    

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('uName');
        $msg .= form_error('data_major');
        $msg .= form_error('note');
        $msg .= form_error('data_subject');
        $msg .= form_error('username');
        $msg .= form_error('password');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $uName = $this->input->post('uName');

        $uNote = $this->input->post('note');
        $uSubject = $this->input->post('data_subject');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $newpassword = $this->input->post('newpassword');
        $conpassword = $this->input->post('conpassword');

        $query = $this->db->get_where('user', array('password' => $password));

        $rowcount = $query->num_rows();

        if ($rowcount > 0) {


            if($newpassword == "" && $conpassword == ""){
                $sql = "update user set  username = '$username',uName = '$uName',mSubjectId='$uSubject',note = '$uNote' where uId = '$id'";
                $msg = 'แก้ไขข้อมูลเรียบร้อย';
                $con_1 = TRUE;
                $result = $this->db->query($sql);
                

            }else{
                if($newpassword == $conpassword){
                    $sql = "update user set  username = '$username', password = '$conpassword',uName = '$uName',mSubjectId='$uSubject',note = '$uNote' where uId = '$id'";
                    $msg = 'แก้ไขข้อมูลเรียบร้อย';
                    $con_1 = TRUE;
                    $result = $this->db->query($sql);

                }else{
                    $con_1 = FALSE;
                    $msg = 'รหัสผ่านใหม่ไม่ถูกต้อง';

                }
            }

            

            echo json_encode(array(
                'is_successful' => $con_1,
                'msg' =>  $msg
                ));
        }else{
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'รหัสผ่านไม่ถูกต้อง'
                ));

        }
    }
}

}


public function action_mMenu($actions,$menu_type){

    if($menu_type == 0){
        // mainMenu

        if($actions == "add"){


         $this->load->library('form_validation');
         $this->form_validation->set_rules('mMenuName_txt', 'ชื่อเมนู', 'required');

         $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

         if ($this->form_validation->run() == FALSE) {

            $msg = form_error('mMenuName_txt');
            

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));


        } else {

            $mMenuName = $this->input->post('mMenuName_txt');

            $sql = "insert into mainmenu (mMenuName) values ('$mMenuName')";
            $result = $this->db->query($sql);


            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' =>  'บันทึกข้อมูลเรียบร้อย'
                ));
        }
    }else if($actions == "edit"){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('mMenuName_txt', 'ชื่อเมนู', 'required');
        $this->form_validation->set_rules('mMenuId_txt', 'ไม่มีรหัส', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('mMenuName_txt');
            $msg = form_error('mMenuId_txt');



            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {

            $mMenuName = $this->input->post('mMenuName_txt');
            $mMenuId = $this->input->post('mMenuId_txt');

            $sql = "update mainmenu set  mMenuName = '$mMenuName' where mMenuId = '$mMenuId'";
            $result = $this->db->query($sql);


            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' =>  'แก้ไขข้อมูลเรียบร้อย'
                ));




        }

    }else if($actions == "delete"){

        $id = $this->input->post('id');
        $sql = "delete from mainmenu where mMenuId = '$id'";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' =>  'ลบข้อมูลเรียบร้อย'
            ));


    }
}else{
    // subMenu

    if($actions == "add"){


     $this->load->library('form_validation');
     $this->form_validation->set_rules('sMenuName_txt', 'ชื่อเมนูย่อย', 'required');
     $this->form_validation->set_rules('data_mMenu', 'หรือเพิ่ม เมนูหลักก่อน จึงจะสามารถเพิ่มเมนูย่อยได้', 'required');

     $this->form_validation->set_message('required', 'กรุุณาป้อน %s');


     if ($this->form_validation->run() == FALSE) {

        $msg = form_error('sMenuName_txt');
        $msg.= form_error('data_mMenu');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $sMenuName1 = $this->input->post('sMenuName_txt');
        $mMenuId1 = $this->input->post('data_mMenu');

        $sql = "insert into submenu (sMenuName,mMenuId) values ('$sMenuName1','$mMenuId1')";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกข้อมูลเรียบร้อย'
            ));
    }
}else if($actions == "edit"){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('sMenuName_txt', 'ชื่อเมนู', 'required');
    $this->form_validation->set_rules('sMenuId_txt', 'ไม่มีรหัส', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('sMenuName_txt');
        $msg = form_error('sMenuId_txt');



        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $sMenuName = $this->input->post('sMenuName_txt');
        $sMenuId = $this->input->post('sMenuId_txt');
        $mMenuId = $this->input->post('data_mMenu');

        $sql = "update submenu set  sMenuName = '$sMenuName',mMenuId = '$mMenuId' where sMenuId = '$sMenuId'";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' =>  'แก้ไขข้อมูลเรียบร้อย'
            ));




    }

}else if($actions == "delete"){

    $id = $this->input->post('id');
    $sql = "delete from submenu where sMenuId = '$id'";
    $result = $this->db->query($sql);


    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' =>  'ลบข้อมูลเรียบร้อย'
        ));


}

}

}


public function action_mMajor($actions,$menu_type){

    if($menu_type == 0){
        // mainMenu

        if($actions == "add"){


           $this->load->library('form_validation');
           $this->form_validation->set_rules('mMenuName_txt', 'ชื่อคณะ/หน่วยงาน', 'required');

           $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

           if ($this->form_validation->run() == FALSE) {

            $msg = form_error('mMenuName_txt');
            

            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));


        } else {

            $mMenuName = $this->input->post('mMenuName_txt');

            $sql = "insert into major (mMajorName) values ('$mMenuName')";
            $result = $this->db->query($sql);


            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' =>  'บันทึกข้อมูลเรียบร้อย'
                ));
        }
    }else if($actions == "edit"){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('mMenuName_txt', 'ชื่อคณะ/หน่วยงาน', 'required');
        $this->form_validation->set_rules('mMenuId_txt', 'ไม่มีคณะ/หน่วยงาน', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('mMenuName_txt');
            $msg = form_error('mMenuId_txt');



            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
                ));
        } else {

            $mMenuName = $this->input->post('mMenuName_txt');
            $mMenuId = $this->input->post('mMenuId_txt');

            $sql = "update major set  mMajorName = '$mMenuName' where mMajorId = '$mMenuId'";
            $result = $this->db->query($sql);


            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' =>  'แก้ไขข้อมูลเรียบร้อย'
                ));




        }

    }else if($actions == "delete"){

        $id = $this->input->post('id');
        $sql = "delete from major where mMajorId = '$id'";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' =>  'ลบข้อมูลเรียบร้อย'
            ));


    }
}else{
    // subMenu

    if($actions == "add"){


       $this->load->library('form_validation');
       $this->form_validation->set_rules('sMenuName_txt', 'ชื่อภาควิชา/หลักสูตร', 'required');
       $this->form_validation->set_rules('data_mMenu', 'หรือเพิ่ม คณะหรือหน่วยงานก่อน จึงจะสามารถเพิ่มภาควิชา/หลักสูตรได้', 'required');

       $this->form_validation->set_message('required', 'กรุุณาป้อน %s');


       if ($this->form_validation->run() == FALSE) {

        $msg = form_error('sMenuName_txt');
        $msg.= form_error('data_mMenu');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $sMenuName1 = $this->input->post('sMenuName_txt');
        $mMenuId1 = $this->input->post('data_mMenu');

        $sql = "insert into subject (mSubjectName,mMajorId) values ('$sMenuName1','$mMenuId1')";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกข้อมูลเรียบร้อย'
            ));
    }
}else if($actions == "edit"){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('sMenuName_txt', 'ชื่อภาควิชา/หลักสูตร', 'required');
    $this->form_validation->set_rules('sMenuId_txt', 'ไม่มีรหัสคณะ ไม่สามารถแก้ไขได้', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('sMenuName_txt');
        $msg = form_error('sMenuId_txt');



        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $sMenuName = $this->input->post('sMenuName_txt');
        $sMenuId = $this->input->post('sMenuId_txt');
        $mMenuId = $this->input->post('data_mMenu');

        $sql = "update subject set  mSubjectName = '$sMenuName',mMajorId = '$mMenuId' where mSubjectId = '$sMenuId'";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' =>  'แก้ไขข้อมูลเรียบร้อย'
            ));




    }

}else if($actions == "delete"){

    $id = $this->input->post('id');
    $sql = "delete from subject where mSubjectId = '$id'";
    $result = $this->db->query($sql);


    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' =>  'ลบข้อมูลเรียบร้อย'
        ));


}

}

}



public function action_money($actions){




    if($actions == "add"){


       $this->load->library('form_validation');
       $this->form_validation->set_rules('data_sub', 'หรือเพิ่ม ข้อมูลงานวิจัย/โครงการก่อน จึงจะสามารถเพิ่มประเภททุนได้', 'required');
       $this->form_validation->set_rules('data_tune', 'ชื่อประเภททุน', 'required');

       $this->form_validation->set_message('required', 'กรุุณาป้อน %s');


       if ($this->form_validation->run() == FALSE) {

        $msg = form_error('data_sub');
        $msg.= form_error('data_tune');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $sMenuId = $this->input->post('data_sub');
        $tName = $this->input->post('data_tune');

        $sql = "insert into tune (tName,sMenuId) values ('$tName','$sMenuId')";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกข้อมูลเรียบร้อย'
            ));
    }
}else if($actions == "edit"){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('data_sub', 'หรือเพิ่ม ข้อมูลงานวิจัย/โครงการก่อน จึงจะสามารถเพิ่มประเภททุนได้', 'required');
    $this->form_validation->set_rules('data_tune', 'ชื่อประเภททุน', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('data_sub');
        $msg = form_error('data_tune');



        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $tName = $this->input->post('data_tune');
        $sMenuId = $this->input->post('data_sub');
        $tId = $this->input->post('tId');

        $sql = "update tune set  tName = '$tName',sMenuId = '$sMenuId' where tId = '$tId'";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' =>  'แก้ไขข้อมูลเรียบร้อย'
            ));




    }

}else if($actions == "delete"){

    $id = $this->input->post('id');
    $sql = "delete from tune where tId = '$id'";
    $result = $this->db->query($sql);


    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' =>  'ลบข้อมูลเรียบร้อย'
        ));


}

}




public function action_user($actions){


    if($actions == "add"){


       $this->load->library('form_validation');
       $this->form_validation->set_rules('uName', 'ชื่อ-นามสกุล', 'required');
       $this->form_validation->set_rules('data_major', 'ชื่อคณะ/หน่วยงาน', 'required');
       $this->form_validation->set_rules('note', 'ความเชี่ยวชาญ', 'required');
       $this->form_validation->set_rules('data_subject', 'ภาควิชา/หลักสูตร', 'required');
       $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'required');
       $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
       $this->form_validation->set_rules('uStatus', 'สถานะ', 'required');

       $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

       if ($this->form_validation->run() == FALSE) {

        $msg = form_error('uName');
        $msg .= form_error('data_major');
        $msg .= form_error('note');
        $msg .= form_error('data_subject');
        $msg .= form_error('username');
        $msg .= form_error('password');
        $msg .= form_error('uStatus');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));


    } else {

        $uName = $this->input->post('uName');
        $uMajor = $this->input->post('data_major');
        $uNote = $this->input->post('note');
        $uSubject = $this->input->post('data_subject');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('uStatus');
        $img = "";

        foreach ($_FILES as $key => $value) {
            $config['upload_path'] = './assets/uploads/img';
            $part = $config['upload_path'];
            $config['allowed_types'] = '*';
            $config['max_size'] = '20971520';

            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!empty($value['tmp_name']) && $value['size'] > 0) {

                if (!$this->upload->do_upload($key)) {
                    $msg = $this->upload->display_errors();
                    echo json_encode(array(
                        'is_successful' => FALSE,
                        'msg' => $msg
                        ));

                } else {

                    $name = $this->upload->data();

                    $img = base_url().'assets/uploads/img/'.$name['file_name'];

                    $sql = "insert into user (username,password,uName,statusId,mSubjectId,note,img) 
                    values ('$username','$password','$uName','$status','$uSubject','$uNote','$img')";
                    $result = $this->db->query($sql);


                    echo json_encode(array(
                        'is_successful' => TRUE,
                        'msg' => 'บันทึกข้อมูลเรียบร้อย'
                        // 'msg' => $name['file_name']
                        ));

                }
                
            }else{
                echo json_encode(array(
                    'is_successful' => FALSE,
                    'msg' => 'ไม่มีไฟล์หรือไฟล์ใหญ่เกินไป'
                    ));
            }

        }


        
    }
}else if($actions == "edit"){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('uName', 'ชื่อ-นามสกุล', 'required');
    $this->form_validation->set_rules('data_major', 'ชื่อคณะ/หน่วยงาน', 'required');
    $this->form_validation->set_rules('note', 'ความเชี่ยวชาญ', 'required');
    $this->form_validation->set_rules('data_subject', 'ภาควิชา/หลักสูตร', 'required');
    $this->form_validation->set_rules('username', 'ชื่อผู้ใช้', 'required');
    $this->form_validation->set_rules('password', 'รหัสผ่าน', 'required');
    $this->form_validation->set_rules('uStatus', 'สถานะ', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('uName');
        $msg .= form_error('data_major');
        $msg .= form_error('note');
        $msg .= form_error('data_subject');
        $msg .= form_error('username');
        $msg .= form_error('password');
        $msg .= form_error('uStatus');

        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $uName = $this->input->post('uName');
        $uId = $this->input->post('uId');
        $uNote = $this->input->post('note');
        $uSubject = $this->input->post('data_subject');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $status = $this->input->post('uStatus');
        $img="";

        foreach ($_FILES as $key => $value) {
            $config['upload_path'] = './assets/uploads/img';
            $part = $config['upload_path'];
            $config['allowed_types'] = '*';
            $config['max_size'] = '20971520';

            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!empty($value['tmp_name']) && $value['size'] > 0) {

                if (!$this->upload->do_upload($key)) {
                    $msg = $this->upload->display_errors();
                    echo json_encode(array(
                        'is_successful' => FALSE,
                        'msg' => $msg
                        ));

                } else {

                    $name = $this->upload->data();

                    $img = base_url().'assets/uploads/img/'.$name['file_name'];
                }
                
            }
        }

        if($img == ""){

            $sql = "update user set  username = '$username', password = '$password',uName = '$uName', statusId = '$status',mSubjectId='$uSubject',note = '$uNote' where uId = '$uId'";

        }else{
            $sql = "update user set  username = '$username', password = '$password',uName = '$uName', statusId = '$status',mSubjectId='$uSubject',note = '$uNote',img = '$img' where uId = '$uId'";
        }

        $result = $this->db->query($sql);
        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' =>  'แก้ไขข้อมูลเรียบร้อย'
            ));

    }

}else if($actions == "delete"){

    $id = $this->input->post('id');
    $sql = "delete from user where uId = '$id'";
    $result = $this->db->query($sql);
    echo json_encode(array(
        'is_successful' => TRUE,
        'msg' =>  'ลบข้อมูลเรียบร้อย'
        ));
}
}


function select_type_major(){

    $majorId = $this->input->post('id');

    $sql = "select mSubjectId,mSubjectName
    from subject
    where mMajorId = '$majorId'";


    $data = $this->db->query($sql)->result_array();

    echo json_encode(array(
        'is_successful' => TRUE,
        'data' => $data
        ));
}

function change_image($uid){
    $data['uId'] = $uid;
    $this->load->view('research/backend/edit_img_user',$data);
}
function edit_img(){

    $uId = $this->input->post('uId234');

    //$uId2 = $this->input->post('image2');
    // if($this->input->post('images2')) {
    //     echo("<script>console.log('true');</script>");
    // }else{
    //     echo("<script>console.log('flase');</script>");
    // }

    $this->load->library('form_validation');

    if (empty($_FILES['images2']['name']))
    {
        $this->form_validation->set_rules('images2', 'รูปภาพ', 'required');

    }

    $this->form_validation->set_rules('uId234', 'error', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('uId234');
        $msg .= form_error('images2');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));


    } else {


        $img = "";


        foreach ($_FILES as $key => $value) {
            $config['upload_path'] = './assets/uploads/img';
            $part = $config['upload_path'];
            $config['allowed_types'] = '*';
            $config['max_size'] = '20971520';

            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!empty($value['tmp_name']) && $value['size'] > 0) {

                if (!$this->upload->do_upload($key)) {
                    $msg = $this->upload->display_errors();
                    echo json_encode(array(
                        'is_successful' => FALSE,
                        'msg' => $msg
                        ));

                } else {

                    $name = $this->upload->data();

                    $img = base_url().'assets/uploads/img/'.$name['file_name'];

                    $sql = "update user set img = '$img' where uId = '$uId'";
                    $result = $this->db->query($sql);


                    echo json_encode(array(
                        'is_successful' => TRUE,
                        'msg' => 'บันทึกข้อมูลเรียบร้อย'
                        // 'msg' => $name['file_name']
                        ));

                }
                
            }else{
                echo json_encode(array(
                    'is_successful' => FALSE,
                    'msg' => 'ไม่มีไฟล์หรือไฟล์ใหญ่เกินไป'
                    ));
            }

        }


        
    }
}

public function insert_rerearchs(){

    $tId = $this->input->post('tId');

    $this->load->library('form_validation');


    // $this->form_validation->set_rules('data_sub', 'ปรเภทงานวิจัย', 'required');
    if(empty($tId)){
        $this->form_validation->set_rules('data_tune', 'ประเภททุนวิจัย', 'required');
    }
    $this->form_validation->set_rules('name_re', 'ขื่องานวิจัย', 'required');
    $this->form_validation->set_rules('name_en_re', 'ชื่องานวิจัย อังกฤษ', 'required');
    $this->form_validation->set_rules('nickName', 'ชื่อผู้เข้าร่วมโครงการ', 'required');
    $this->form_validation->set_rules('year', 'ปีงบประมาณ', 'required');
    $this->form_validation->set_rules('txtStandard', 'ข้อมูลทั่วไป', 'required');
    $this->form_validation->set_rules('txtPrint', 'การพิมพ์และการเผยแพร่', 'required');
    $this->form_validation->set_rules('txtWork', 'การนำไปใช้งาน', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');


    if ($this->form_validation->run() == FALSE) {

        // $msg = form_error('data_sub');
        // $msg.= form_error('data_tune');
        $msg = form_error('name_re');

        $msg.= form_error('data_tune');

        $msg.= form_error('name_en_re');
        $msg.= form_error('nickName');
        $msg.= form_error('year');
        $msg.= form_error('txtStandard');
        $msg.= form_error('txtPrint');
        $msg.= form_error('txtWork');


        echo json_encode(array(
            'is_successful' => FALSE,
            'msg' => $msg
            ));
    } else {

        $sMenuId = $this->input->post('sMenuId');
        
        $nameTh = $this->input->post('name_re');
        $nameEn = $this->input->post('name_en_re');
        $nickName = $this->input->post('nickName');
        $year = $this->input->post('year');
        $txtStandard = $this->input->post('txtStandard');
        $txtPrint = $this->input->post('txtPrint');
        $txtWork = $this->input->post('txtWork');
        $uId = $this->session->userdata('uId');
        $ddate = date("Y-m-d");

        $sql = "insert into research (researchName,tId,sMenuId,researchName_en,researchPeple,researchYear,researchData_standard,researchData_print,researchData_work,uId,date) values ('nameTh','$tId','$sMenuId','$nameEn','$nickName','$year','$txtStandard','$txtPrint','$txtWork','$uId','$ddate')";
        $result = $this->db->query($sql);


        echo json_encode(array(
            'is_successful' => TRUE,
            'msg' => 'บันทึกข้อมูลเรียบร้อย'
            ));
    }
}


public function add_researchs(){
    $sql = "select sMenuId,sMenuName,submenu.mMenuId,mMenuName 
    from submenu,mainmenu 
    where submenu.mMenuId = mainmenu.mMenuId and
    submenu.mMenuId = 1";
    $data['projects'] =  $this->db->query($sql)->result_array();
    $data['nameMain'] =  $this->db->query($sql)->row_array();

    $sql = "SELECT MAX(researchId) as maxId
    FROM research";

    $data['maxid'] =  $this->db->query($sql)->row_array();
    

    $this->load->view('research/backend/add_research_form',$data);

}

public function add_projects(){
    $sql = "select sMenuId,sMenuName,submenu.mMenuId,mMenuName 
    from submenu,mainmenu 
    where submenu.mMenuId = mainmenu.mMenuId and
    submenu.mMenuId != 1";
    $data['projects'] =  $this->db->query($sql)->result_array();
    
    $sql = "select mMenuId,mMenuName 
    from mainmenu 
    where mMenuId != 1";

    $data['mains'] =  $this->db->query($sql)->result_array();

    $sql = "SELECT MAX(researchId) as maxId
    FROM research";

    $data['maxid'] =  $this->db->query($sql)->row_array();
    

    $this->load->view('research/backend/add_project_form',$data);

}
public function abcd(){
    $this->load->view('research/backend/demo');
}



function upload_file(){

    $post = $this->input->post();

    if(isset($post)){

    $config['upload_path'] = './assets/uploads/';
    $config['encrypt_name'] = true;
    $config['allowed_types'] = 'jpg|png|pdf|mp4|3gp|avi|flv';
    $config['max_size'] = '25000'; //25Mb

    $this->load->library('upload', $config);
        if($this->upload->do_upload('file'))
        {
            $file = $this->upload->data();
            $data = array('title'   => $file['orig_name'],
                'ext'       => $file['file_ext'],
                'size'      => $file['file_size'],
                'path'      => 'assets/uploads/'.$file['file_name'],
            );

            //Menyimpan Informasi File pada database;
            //$this->db->insert("tb_file",$data);
        }
    }else{
        return false;
    }
}





    function th() {
        $this->session->set_userdata('language', 'thai');

        redirect($this->session->userdata('LASTURL'));
    }

    function en() {
        $this->session->set_userdata('language', 'english');


        redirect($this->session->userdata('LASTURL'));
    }

    function ch() {
        $this->session->set_userdata('language', 'chaina');

        redirect($this->session->userdata('LASTURL'));
    }

}
