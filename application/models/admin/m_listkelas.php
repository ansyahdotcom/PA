<?php

class M_listkelas extends CI_Model
{
    function tampil(){
        $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('diskon', 'diskon.ID_DISKON = kelas.ID_DISKON', 'left');
            $this->db->join('admin', 'admin.ID_ADM = kelas.ID_ADM', 'left');
            $this->db->where('STAT', 1);
            $query = $this->db->get()->result();
            return $query;
    }

    // function tampil()
    // {
    //     $query = $this->db->query("SELECT * FROM kelas WHERE STAT = 1");
    //     return $query;
    // }

    // function tmbh_materi($NM_MT)
    // {
    //     $this->db->query("INSERT INTO materi ( NM_MT ) VALUES ( '$NM_MT')");
    // }
}