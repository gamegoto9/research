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
        $data['title'] = "เพิ่ม แก้ไข เมนูหลัก";
        $data['title_id'] = 0;
    }else{
        $data['title'] = "เพิ่ม แก้ไข เมนูย่อย";
        $data['title_id'] = 1;
    }
    $this->load->view('research/backend/mMenu_view',$data);
}
public function view_major($title){
    if($title == "major"){
        $data['title'] = "เพิ่ม แก้ไข คณะ/หน่วยงาน";
        $data['title_id'] = 0;
    }else{
        $data['title'] = "เพิ่ม แก้ไข เมนูย่อย";
        $data['title_id'] = 1;
    }
    $this->load->view('research/backend/mMajor_view',$data);
}
public function view_user(){

    $data['title'] = "เพิ่ม แก้ไข ผู้ใช้งานระบบ";

    
    $this->load->view('research/backend/user_view',$data);
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
                    'status'     => $row['status'],
                    'name' => $row['uName']
                    );

                $this->session->set_userdata($dataArray);
            }

//                $this->session->set_userdata($result);

            echo json_encode(array(
                'is_successful' => TRUE,
                'msg' => $row['uName']
                ));
        } else {
            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => 'ข้อมูลไม่ถูกต้อง'
                ));
        }
    }
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

        $sql = "insert into major values ('$username','$password','$uName','$uStatus','$uSubject','$uNote')";
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
