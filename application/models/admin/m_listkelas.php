<?php

class M_listkelas extends CI_Model
{
    function tampil(){
        $result = $this->db->query("SELECT * FROM kelas WHERE kelas.STAT = '1' ");
		return $result->result();
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