<?php

class M_webinar extends CI_Model
{

    function tampil_webinar()
    {
        $data = $this->db->query("SELECT * FROM webinar, admin WHERE webinar.ID_ADM = admin.ID_ADM
                                ORDER BY webinar.TGL_WEB DESC");
        return $data;
    }

    // tampil fasilitas di select
    function tampil_fasilitas()
    {
        $data = $this->db->query("SELECT ID_FA, NM_FA FROM fasilitas ORDER BY ID_FA ASC");
        return $data;
    }

    // nyari data id webinar terakhir
    function selectMaxID_WEBINAR()
    {
        $query = $this->db->query("SELECT MAX(ID_WEBINAR) AS ID_WEBINAR FROM webinar");
        $hasil = $query->row();
        return $hasil->ID_WEBINAR;
    }

    // nyari data id tag terakhir
    function selectMaxID_FA()
    {
        $query = $this->db->query("SELECT MAX(ID_FA) AS ID_FA FROM fasilitas");
        $hasil = $query->row();
        return $hasil->ID_FA;
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

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    function tampil_edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // menampilkan fasilitas yg mau diedit
    function tampil_edit_fasilitas($JUDUL_WEBINAR)
    {
        $query = $this->db->query("SELECT detail_fasilitas_wbnr.ID_WEBINAR, detail_fasilitas_wbnr.ID_FA, fasilitas.NM_FA 
                                    FROM detail_fasilitas_wbnr, webinar, fasilitas 
                                    WHERE detail_fasilitas_wbnr.ID_WEBINAR = webinar.ID_WEBINAR
                                    AND detail_fasilitas_wbnr.ID_FA = fasilitas.ID_FA
                                    AND webinar.JUDUL_WEBINAR = '$JUDUL_WEBINAR'");
        return $query;
    }

    // pratinjau
    function tampil_dt_webinar($JUDUL_WEBINAR)
    {
        $data = $this->db->query("SELECT * FROM webinar, admin WHERE webinar.ID_ADM = admin.ID_ADM AND
                                     webinar.JUDUL_WEBINAR =  '$JUDUL_WEBINAR'");
        return $data;
    }

    // tampil fasilitas
    // function tampil_dt_fasilitas($ID_WEBINAR)
    // {
    //     $data = $this->db->query("SELECT detail_fasilitas.ID_WEBINAR, detail_fasilitas.ID_FA, fasilitas.NM_FA 
    //                             FROM detail_fasilitas, fasilitas, webinar 
    //                             WHERE detail_fasilitas.ID_FA = fasilitas.ID_FA
    //                             AND detail_fasilitas.ID_WEBINAR = webinar.ID_WEBINAR
    //                             AND webinar.ID_WEBINAR = '$ID_WEBINAR'");
    //     return $data;
    // }
}
