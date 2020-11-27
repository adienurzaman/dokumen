<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_standar extends CI_Model
{
    public function query_dt_default()
    {
        #Default parent_standar, dan get data hasil
        return $this->db->from('standar')
            ->where(array('parent_standar' => '0', 'level_standar' => '1'))
            ->get()
            ->result();
    }
    public function get_data_standar($parent_standar, $level_standar)
    {
        #get data standar by parent dan level
        $query = $this->db->from('standar')
            ->where('parent_standar', $parent_standar)
            ->where('level_standar', $level_standar)
            ->order_by('id_standar', 'asc')
            ->get()
            ->result();

        return $query;
    }
}

/* End of file Model_standar.php */
