<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('token')) {
            redirect('auth');
        }
        $this->load->model('model_standar');
    }

    public function index()
    {
        $data = array(
            'session' => $this->session->all_userdata(),
            'controller' => $this,
            'list_standar' => $this->get_all_data(),
            'view' => 'standar_view_v2'
        );
        $this->load->view('layout/master', $data);
    }

    private function get_all_data()
    {
        $list_data = array();
        $group_default = $this->model_standar->query_dt_default();
        foreach ($group_default as $dt) {
            $parent = $dt->id_standar;
            $standar = $dt->nama_standar;
            $sub_standar = $this->model_standar->get_data_standar($parent, '2');
            array_push($list_data, array('id_standar' => $parent, 'standar' => $standar, 'sub_standar' => $sub_standar));
        }
        return $list_data;
    }

    public function data_sub_sub_standar($parent)
    {
        return $this->model_standar->get_data_standar($parent, '3');
    }
}

/* End of file Standar.php */
