<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
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
        $view_embed = "";
        if ($this->input->get('v') == 'grid') {
            $view_embed = 'grid';
        } else {
            $view_embed = 'list';
        }

        $this->google->setAccessToken($this->session->userdata('token'));
        $this->google->getAccessToken();

        $data = array(
            'allFiles' => $this->google->getAllFiles(),
            'view_embed' => $view_embed,
            'session' => $this->session->all_userdata(),
            'view' => 'upload_data'
        );
        $this->load->view('layout/master', $data);
    }

    public function proses()
    {
        /* METHOD UPLOAD FILE */
        $config = array(
            'upload_path'   => './public/upload/',
            'allowed_types' => 'pdf|jpg|png|xls|xlxs|gif|doc|docs',
            'max_size'        => '100000',
            'overwrite'     => 1
        );
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_upload')) {
            $this->google->setAccessToken($this->session->userdata('token'));
            $this->google->getAccessToken();

            $parent_id = "1N0cKQ7rnANbCTIBiOQL9Y0pEznrOd43C"; // ID folder drive
            $data_upload = $this->upload->data();
            $config_upload = array(
                'data' => file_get_contents('./public/upload/' . $data_upload['file_name']),
                'mimeType' => 'application/octet-stream',
                'uploadType' => 'multipart'
            );
            $this->google->file_set_name($data_upload['file_name']);
            $this->google->parent_folder($parent_id);
            $result = $this->google->proses_upload_file($config_upload);
            $lokasi = './public/upload/';
            if ($result) {
                # hapus semua data upload lokal
                $files = glob($lokasi . '*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                $this->session->set_flashdata('pesan', 'ID : ' . $result->id . ' Upload data ' . $result->name . ' berhasil, cek google drive anda');
                redirect('upload');
            } else {
                # hapus semua data upload lokal
                $files = glob($lokasi . '*');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                $this->session->set_flashdata('pesan', 'ID : ' . $result->id . 'Gagal Upload ' . $result->name . ' ke drive gagal');
                redirect('upload');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Upload gagal. File corrupt');
            redirect('upload');
        }
    }

    public function delete_file($fileId)
    {
        $this->google->setAccessToken($this->session->userdata('token'));
        $this->google->getAccessToken();

        $aksi = $this->google->delete_file($fileId);
        if ($aksi) {
            $this->session->set_flashdata('pesan', 'Delete berhasil. Cek google drive');
            redirect('upload');
        } else {
            $this->session->set_flashdata('pesan', 'Delete gagal. Cek google drive');
            redirect('upload');
        }
    }
}

/* End of file Upload.php */
