<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('token')) {
            redirect('auth');
        }
        $this->load->library('google');
    }

    public function index()
    {
        $data = array(
            'session' => $this->session->all_userdata(),
            'view' => 'dashboard'
        );
        $this->load->view('layout/master', $data);
    }
}

/* End of file Dashboard.php */
