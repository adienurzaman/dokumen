<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sesi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_sesi');
        if (!$this->session->userdata('token')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data = array(
            'view' => 'sesi_view'
        );
        $this->load->view('layout/master', $data);
    }

    public function ajax_get_dt_sesi()
    {
        #ambil data
        $query = $this->model_sesi->get_dt_sesi();
        $data_sesi = array();
        $url = 'https://data.unma.ac.id/ref/prodi';
        foreach ($query->result() as $value) {
            $output_url = file_get_contents($url . '?kode_prodi=' . $value->kode_prodi);
            foreach (json_decode($output_url) as $output) {
                $push_data = array(
                    'id_sesi' => $value->id_sesi,
                    'kode_prodi' => $value->kode_prodi,
                    'nama_prodi' => $output->nama_prodi,
                    'tahun_akreditasi' => $value->tahun_akreditasi
                );
                array_push($data_sesi, $push_data);
            }
        }
        $data = array('data_sesi' => $data_sesi);
        $this->load->view('content/tabel_sesi', $data);
    }

    public function ajax_save_dt_sesi()
    {
        $query = $this->model_sesi->query_save_dt_sesi();
        if ($query) {
            $json = array(
                'status' => true,
                'pesan' => 'Simpan data sesi. Berhasil'
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Simpan data sesi. Gagal'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function ajax_edit_dt_sesi()
    {
        $query = $this->model_sesi->query_edit_dt_sesi();
        if ($query) {
            $json = array(
                'status' => true,
                'pesan' => 'Edit data sesi. Berhasil'
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Edit data sesi. Gagal'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function ajax_get_dt_sesi_by_id($id_sesi)
    {
        $query = $this->model_sesi->query_get_dt_sesi_by_id($id_sesi);
        if ($query) {
            $json = array(
                'status' => true,
                'data_sesi' => $query->row(),
                'pesan' => 'Get data sesi. Berhasil'
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Get data sesi. Gagal'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }

    public function ajax_hapus_dt_sesi($id_sesi)
    {
        $query = $this->model_sesi->query_hapus_dt_sesi($id_sesi);
        if ($query) {
            $json = array(
                'status' => true,
                'pesan' => 'Hapus data sesi. Berhasil'
            );
        } else {
            $json = array(
                'status' => false,
                'pesan' => 'Hapus data sesi. Gagal'
            );
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($json));
    }
}

/* End of file Sesi.php */
