<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("sports_model");



        $val_lang = $this->session->userdata('language');

        if (!($this->session->userdata('language'))) {
            $this->session->set_userdata('language', 'english');
        }
    }

    public function index() {

         $this->load->view('login');
        
      
    }
    public function main(){
         $data['page'] = "0";
        $this->load->view('content_view', $data);
    }

    public function check_login() {

       

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'ชื่อ', 'required');
        $this->form_validation->set_rules('sex', 'เพศ', 'required');

        $this->form_validation->set_message('required', 'กรุุณาป้อน %s');

        if ($this->form_validation->run() == FALSE) {

            $msg = form_error('name');
            $msg.= form_error('sex');


            echo json_encode(array(
                'is_successful' => FALSE,
                'msg' => $msg
            ));
        } else {
            $data['name'] = $this->input->post('name');
            $data['sex'] = $this->input->post('sex');

//            $sql = "select * from personal where username = '".$data['name']."' and password = '".$data['name']."'";
            $query = $this->db->get_where('login_sport_2015', array('username' => $data['name'], 'password' => $data['sex']));

            $rowcount = $query->num_rows();

            if ($rowcount > 0) {
//                $result = array('user','status','name','Pid');

                foreach ($query->result_array() as $row) {
                    
                    $dataArray = array(
                        'user'  => $data['name'],
                        'status'     => $row['status'],
                        'name' => $row['name'],
                        'Lid' => $row['Lid']
                    );

                    $this->session->set_userdata($dataArray);
                }

//                $this->session->set_userdata($result);

                echo json_encode(array(
                    'is_successful' => TRUE,
                    'msg' => $row['name']
                ));
            } else {
                echo json_encode(array(
                    'is_successful' => FALSE,
                    'msg' => 'ข้อมูลไม่ถูกต้อง'
                ));
            }
        }
    }

    public function default_() {


        $this->load->view('default_view');
    }

    public function listAllsport() {

        $sports = $this->sports_model->ListAll();
        print_r(json_encode($sports));


        // print_r(json_encode(array(array('name'=>'Kaio Santos', 'city'=>'abc'), array('name'=>'Bruna Santos', 'city'=>'abc'), array('name'=>'Julia Santos', 'city'=>'abc') )));
    }
    
    
    public function listPlayer($id) {
        
      
       
       
        $player = $this->sports_model->ListPlay($id);
        print_r(json_encode($player));


        // print_r(json_encode(array(array('name'=>'Kaio Santos', 'city'=>'abc'), array('name'=>'Bruna Santos', 'city'=>'abc'), array('name'=>'Julia Santos', 'city'=>'abc') )));
    }
    

    public function Regis_foot() {

        $this->load->view('regis');
    }

    public function add() {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $name = $request->name;
        $lname = $request->lname;
        
     
        
        $id = $this->sports_model->AddUser($name, $lname);

        $return = array();

        if ($id) {
            $return['status'] = 'success';
            $return['message'] = 'Item successfully added.';
        } else {
            $return['status'] = 'error';
            $return['message'] = 'Error adding the item, try again.';
        }


        print_r(json_encode($return));
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
