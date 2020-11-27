<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Standar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_standar');
    }

    public function index()
    {
        $data = array(
            'list_standar' => $this->get_all_data(),
            'view' => 'standar_view'
        );
        $this->load->view('layout/master', $data);
    }

    private function get_all_data()
    {
        $list_data = array();
        $group_default = $this->model_standar->query_dt_default();
        $parent = 1;
        foreach ($group_default as $value) {
            $standar = $value->nama_standar;
            $parent = $parent;
            $level = '2';
            $data_standar = $this->model_standar->get_data_standar($parent, $level);
            array_push($list_data, array('standar' => $standar, 'sub_standar' => $data_standar));
            $parent++;
        }
        return $list_data;
    }
}

/* End of file Standar.php */
