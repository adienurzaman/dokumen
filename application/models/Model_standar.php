<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_standar extends CI_Model
{
    public function group_dt_parent()
    {
        #Group kan parent_standar, dan get data hasil
        return $this->db->from('standar')->group_by('parent_standar')->get()->result();
    }
    public function get_data_standar($parent_id)
    {
        #get data standar by parent_id
        $list = array();
        $query = $this->db->from('standar')
            ->where('parent_standar', $parent_id)
            ->order_by('parent_standar', 'asc')
            ->get()
            ->result();

        #data query di masukan ke dalam array untuk dioperasikan di controller/view
        foreach ($query as $data) {
            array_push($list, $data);
        }

        return $list;
    }
}

/* End of file Model_standar.php */
