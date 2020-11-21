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
            'controller' => $this,
            'group_list' => $this->model_standar->group_dt_parent(),
            'view' => 'standar_view'
        );
        $this->load->view('layout/master', $data);
    }

    public function get_data_standar($parent_id)
    {
        return $this->model_standar->get_data_standar($parent_id);
    }
}

/* End of file Standar.php */
