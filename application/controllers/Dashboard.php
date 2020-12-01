<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('google');
        if (!$this->session->userdata('token')) {
            redirect('auth');
        }
        if (!empty($_SESSION['upload_token'])) {
            $this->client->setAccessToken($this->session->userdata('token'));
            if ($this->client->isAccessTokenExpired()) {
                $this->session->unset_userdata('token');
            }
        }
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
