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

    function tampil_daftar_wbnr($JUDUL_WEBINAR)
    {
        $data = $this->db->query("SELECT * FROM webinar WHERE JUDUL_WEBINAR = '$JUDUL_WEBINAR'");
        return $data;
    }

    function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // mywebinar
    function mywebinar($email)
    {
        $data = $this->db->query("SELECT peserta_wbnr.ID_PS, webinar.ID_WEBINAR, webinar.JUDUL_WEBINAR, webinar.FOTO_WEBINAR,
                                    webinar.PLATFORM, webinar.LINK_ZOOM, webinar.ST_LINK, webinar.SRT_WEBINAR, webinar.ST_SRT,
                                    webinar.TGL_WEB, webinar.ST_POSTWEB, admin.NM_ADM
                                    FROM peserta_wbnr, webinar, peserta, admin 
                                    WHERE webinar.ID_WEBINAR = peserta_wbnr.ID_WEBINAR 
                                    AND peserta_wbnr.ID_PS = peserta.ID_PS
                                    AND admin.ID_ADM = webinar.ID_ADM
                                    AND peserta.EMAIL_PS = '$email'");
        return $data;
    }
}