<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('google');
    }

    public function index()
    {
        $data = array(
            'auth_url' => $this->google->authURL(),
            'view' => 'auth_view'
        );
        $this->load->view('layout/master', $data);
    }

    public function proses()
    {
        if (isset($_GET['code'])) {
            $token = $this->google->fetchAccessTokenWithAuthCode($_GET['code']);
            $gpInfo = $this->google->getUserInfo();
            $this->session->set_userdata(array(
                'token' => $token,
                'email' => $gpInfo['email'],
                'nama' => $gpInfo['given_name'].' '.$gpInfo['family_name'],
                )
            );
            redirect('dashboard');
        }
    }

    public function hapus_sesi()
    {
        // $this->google->revokeToken($this->session->userdata('token'));
        $this->session->sess_destroy();
        redirect('auth');
    }
}

/* End of file Auth.php */
