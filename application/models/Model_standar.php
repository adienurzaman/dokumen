<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_standar extends CI_Model
{
    public function query_get_standar($parent, $level)
    {
        if ($parent) {
            return $this->db->from('standar')
                ->where(array('parent_standar' => $parent))
                ->get();
        }
        if ($level) {
            return $this->db->from('standar')
                ->where(array('level_standar' => $level))
                ->get();
        }
    }

    public function query_get_standar_by_id($id_standar)
    {
        return $this->db->from('standar')
            ->where(array('id_standar' => $id_standar))
            ->get();
    }

    public function query_simpan_standar()
    {
        $data = array(
            'parent_standar' => $this->input->post('parent_standar'),
            'level_standar' => $this->input->post('level_standar'),
            'nama_standar' => $this->input->post('nama_standar', true)
        );
        return $this->db->insert('standar', $data);
    }

    public function query_update_standar()
    {
        $data = array(
            'parent_standar' => $this->input->post('parent_standar'),
            'level_standar' => $this->input->post('level_standar'),
            'nama_standar' => $this->input->post('nama_standar', true)
        );
        $this->db->where('id_standar', $this->input->post('id_standar'));
        return $this->db->update('standar', $data);
    }

    public function query_hapus_standar($id_standar)
    {
        return $this->db->delete('standar', array('id_standar' => $id_standar));
    }

    public function query_dt_default($parent, $level)
    {
        #Default parent_standar, dan get data hasil
        return $this->db->from('standar')
            ->where(array('parent_standar' => $parent, 'level_standar' => $level))
            ->get()
            ->result();
    }
    public function get_data_standar($parent_standar, $level_standar)
    {
        #get data standar by parent dan level
        $query = $this->db->from('standar')
            ->where('parent_standar', $parent_standar)
            ->where('level_standar', $level_standar)
            ->order_by('id_standar', 'desc')
            ->get()
            ->result();

        return $query;
    }
    public function get_data_by_id($id_standar)
    {
        return $this->db->from('standar')
            ->where(array('id_standar' => $id_standar))
            ->get()
            ->result();
    }
}

/* End of file Model_standar.php */
