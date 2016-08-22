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
    $this->load->view('research/backend/mMenuTable',$data);
}

public function view_menu(){
    $this->load->view('research/backend/mMenu_view');
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


public function mMenu_form($view){

    if($view == "add"){
        $data['send'] = "add";
        $this->load->view('research/backend/mMenu_form',$data);
    }
}

public function mMenu_form_edit(){

    $id = $this->input->post('id');

    $sql = "select * from mainmenu where mMenuId = '$id'";
    $data['dataValue'] = $this->db->query($sql)->row_array();
    $data['send'] = "edit";

    $this->load->view('research/backend/mMenu_form',$data);
    
}

public function action_mMenu($actions){

    if($actions == "add"){


       $this->load->library('form_validation');
       $this->form_validation->set_rules('mMenuName_txt', 'mMenuName_txt', 'required');

       $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

       if ($this->form_validation->run() == FALSE) {

        $msg = form_error('ชื่อเมนู');



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
            'msg' =>  $mMenuName
            ));

        


    }
}else if($actions == "edit"){

    $this->load->library('form_validation');
    $this->form_validation->set_rules('mMenuName_txt', 'mMenuName_txt', 'required');
    $this->form_validation->set_rules('mMenuId_txt', 'mMenuId_txt', 'required');

    $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

    if ($this->form_validation->run() == FALSE) {

        $msg = form_error('ชื่อเมนู');
        $msg = form_error('ไม่มีรหัส');



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
            'msg' =>  $mMenuName
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
