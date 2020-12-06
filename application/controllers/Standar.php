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

    public function index($parent = null, $level = null)
    {
        if ($parent) {
            $standar = $parent;
        } else {
            $standar = 0;
        }

        if ($level) {
            $level_standar = $level;
        } else {
            $level_standar = 1;
        }
        $data = array(
            'parent' => $standar,
            'level' => $level_standar,
            'session' => $this->session->all_userdata(),
            'view' => 'standar_index'
        );
        $this->load->view('layout/master', $data);
    }

    public function ajax_get_standar($parent, $level)
    {
        $standar = $this->model_standar->query_get_standar($parent, $level);
        $data['standar'] = $standar->result();
        $this->load->view('content/tabel_standar', $data);
    }

    public function ajax_get_standar_by_id($id_standar)
    {
        $standar = $this->model_standar->query_get_standar_by_id($id_standar);
        if ($standar) {
            $json = array(
                'status' => true,
                'pesan' => 'Get data edit, berhasil',
                'data' => $standar->row()
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Get data edit, gagal'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function ajax_simpan_standar()
    {
        $standar = $this->model_standar->query_simpan_standar();
        if ($standar) {
            $json = array(
                'status' => true,
                'pesan' => 'Simpan data standar, berhasil'
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Simpan data standar, gagal'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function ajax_update_standar()
    {
        $standar = $this->model_standar->query_update_standar();
        if ($standar) {
            $json = array(
                'status' => true,
                'pesan' => 'Update data standar, berhasil'
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Update data standar, gagal'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function ajax_hapus_standar($id_standar)
    {
        $standar = $this->model_standar->query_hapus_standar($id_standar);
        if ($standar) {
            $json = array(
                'status' => true,
                'pesan' => 'Hapus data standar, berhasil'
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Hapus data standar gagal, standar ini sudah memiliki sub data standar, yang saling berkaitan'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    private function index_temp($segment3 = null, $segment4 = null, $segment5 = null)
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
