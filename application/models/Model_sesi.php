<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sesi extends CI_Model
{

    public function get_dt_sesi()
    {
        #mengambil semua data sesi
        return $this->db->from('sesi')->get();
    }

    public function query_get_dt_sesi_by_id($id_sesi)
    {
        #mengambil data berdasarkan id sesi
        return $this->db->where('id_sesi', $id_sesi)->get('sesi');
    }

    public function query_save_dt_sesi()
    {
        $data = array(
            'kode_prodi' => $this->input->post('kode_prodi', true),
            'tahun_akreditasi' => $this->input->post('tahun_akreditasi', true)
        );
        if ($this->db->insert('sesi', $data)) {
            return true;
        } else {
            return false;
        }
    }

    public function query_edit_dt_sesi()
    {
        $data = array(
            'kode_prodi' => $this->input->post('kode_prodi', true),
            'tahun_akreditasi' => $this->input->post('tahun_akreditasi', true)
        );
        $this->db->where('id_sesi', $this->input->post('id_sesi', true));
        $query = $this->db->update('sesi', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function query_hapus_dt_sesi($id_sesi)
    {
        $query = $this->db->delete('sesi', array('id_sesi' => $id_sesi));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file Model_sesi.php */
