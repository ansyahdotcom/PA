<?php
class M_webinar extends CI_Model
{
    function tampil_webinar()
    {
        $data = $this->db->query("SELECT * FROM webinar, admin WHERE webinar.ID_ADM = admin.ID_ADM
                                AND webinar.ST_POSTWEB = 1
                                ORDER BY webinar.TGL_WEB DESC");
        return $data;
    }
}