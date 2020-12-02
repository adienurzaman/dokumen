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
        $this->load->library('google');
        if (!empty($_SESSION['token'])) {
            $this->google->setAccessToken($this->session->userdata('token'));
            if ($this->google->isAccessTokenExpired()) {
                $this->session->unset_userdata('token');
            }
        }
        $this->load->model('model_standar');
    }

    public function index($segment3 = null, $segment4 = null, $segment5 = null)
    {
        if ($segment3 != "" && $segment4 != "") {
            $view = 'standar_view_v3';
            $list_standar = $this->get_data_by_uri($segment3, $segment4);
        } else {
            $segment3 = 0;
            $segment4 = 1;
            $view = 'standar_landing';
            $list_standar = $this->get_data_pertama($segment3, $segment4);
        }
        // var_dump($list_standar);
        // die;
        $data = array(
            'segment3' => $segment3,
            'segment4' => $segment4,
            'segment5' => $segment5,
            'session' => $this->session->all_userdata(),
            'controller' => $this,
            'list_standar' => $list_standar,
            'view' => $view
        );
        $this->load->view('layout/master', $data);
    }

    public function all()
    {
        $data = array(
            'session' => $this->session->all_userdata(),
            'controller' => $this,
            'list_standar' => $this->get_all_data(),
            'view' => 'standar_view_v2'
        );
        $this->load->view('layout/master', $data);
    }

    private function get_data_pertama($id_parent, $level)
    {
        $list_data = array();
        $group_default = $this->model_standar->query_dt_default($id_parent, $level);
        foreach ($group_default as $dt) {
            $id_standar = $dt->id_standar;
            $standar = $dt->nama_standar;
            array_push($list_data, array('id_standar' => $id_standar, 'standar' => $standar));
        }
        return $list_data;
    }


    private function get_data_by_uri($id_parent, $level)
    {
        $list_data = array();
        $group_default = $this->model_standar->get_data_by_id($id_parent);
        foreach ($group_default as $dt) {
            $id_standar = $dt->id_standar;
            $standar = $dt->nama_standar;
            $sub_standar = $this->model_standar->get_data_standar($id_parent, $level);
            array_push($list_data, array('id_standar' => $id_standar, 'standar' => $standar, 'sub_standar' => $sub_standar));
        }
        return $list_data;
    }

    private function get_all_data()
    {
        $list_data = array();
        $group_default = $this->model_standar->query_dt_default('0', '1');
        foreach ($group_default as $dt) {
            $parent = $dt->id_standar;
            $standar = $dt->nama_standar;
            $sub_standar = $this->model_standar->get_data_standar($parent, '2');
            array_push($list_data, array('id_standar' => $parent, 'standar' => $standar, 'sub_standar' => $sub_standar));
        }
        return $list_data;
    }

    public function data_standar_parent($id_standar)
    {
        return $this->model_standar->get_data_by_id($id_standar);
    }
    public function data_sub_standar($parent)
    {
        return $this->model_standar->get_data_standar($parent, '2');
    }

    public function data_sub_sub_standar($parent)
    {
        return $this->model_standar->get_data_standar($parent, '3');
    }
}

/* End of file Standar.php */
