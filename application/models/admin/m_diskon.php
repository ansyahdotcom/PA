<?php 
class M_diskon extends CI_Model
{
    public function getdiskon()
    {
        $diskon = $this->db->get('diskon')->result_array();
        return $diskon;
    }
}
?>