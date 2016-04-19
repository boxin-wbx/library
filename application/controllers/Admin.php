<?php

/**
 * Created by PhpStorm.
 * User: longmen
 * Date: 16/4/13
 * Time: 下午9:08
 */
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('home_model');
        if (!isset($_SESSION['name'])) $this->load->view('test');
    }

    public function addAdmin()
    {
        $this->load->library('form_validation');
        if ($_SESSION['id'] == 'root') {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_database');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
//            有待验证可靠性
                $this->load->view('addadmin');
            } else {
                $id = $this->input->post('username');
                $password = $this->input->post('password');
                $name = $this->input->post('name');
                $phone = $this->input->post('phone');
                $this->home_model->set($id, $password, $name, $phone);
                $this->load->view('test');
            }
        } else $this->load->view('test');
    }

    function check_database($username)
    {
        //Field validation succeeded.  Validate against database
        if (!$this->home_model->get($username)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'username exists!');
            return false;
        }
    }
}