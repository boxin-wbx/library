<?php

/**
 * Created by PhpStorm.
 * User: longmen
 * Date: 16/4/13
 * Time: 下午9:08
 */
class home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('home_model');
    }

    public function homepage()
    {
        $this->load->view('header');
        $this->load->view('footer');
    }

    public function search($page = 1)
    {
        $this->load->view('header');
        $this->load->view('search');
        $this->load->view('footer');

    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        } else {
            $this->load->view('header');
            $this->load->view('footer');
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /library/index.php/home/homepage'); // file name where you want to redirect after logout
        exit();
    }

    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        if($result = $this->home_model->login($username, $password))
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'name' => $row->name
                );
                $this->session->set_userdata($sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}