<?php

class M_webinar extends CI_Model
{

    function tampil_webinar()
    {
        $data = $this->db->query("SELECT webinar.ID_WEBINAR, webinar.TEMA, webinar.PEMBICARA, webinar.FOTO_PEMBICARA,
                                webinar.HARGA, webinar.PLATFORM, webinar.TGL_WEB, webinar.TGL_POSTWEB, webinar.ST_POSTWEB, GROUP_CONCAT(fasilitas_webinar.NM_FA) AS NM_FA
                                FROM webinar, detail_fasilitas_webinar, fasilitas_webinar
                                WHERE webinar.ID_WEBINAR = detail_fasilitas_webinar.ID_WEBINAR 
                                AND detail_fasilitas_webinar.ID_FA = fasilitas_webinar.ID_FA
                                GROUP BY webinar.ID_WEBINAR
                                ORDER BY webinar.TEMA ASC");
        return $data;
    }

    // tampil fasilitas di select
    function tampil_fasilitas_webinar()
    {
        $data = $this->db->query("SELECT ID_FA, NM_FA FROM fasilitas_webinar ORDER BY ID_FA ASC");
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
        $query = $this->db->query("SELECT MAX(ID_FA) AS ID_FA FROM fasilitas_webinar");
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
    function tampil_edit_fasilitas($ID_WEBINAR)
    {
        $query = $this->db->query("SELECT detail_fasilitas_webinar.ID_WEBINAR, detail_fasilitas_webinar.ID_FA FROM detail_fasilitas_webinar, webinar 
                                    WHERE webinar.ID_WEBINAR = '$ID_WEBINAR' AND detail_fasilitas_webinar.ID_WEBINAR = webinar.ID_WEBINAR");
        return $query;
    }

    // pratinjau
    function tampil_dt_webinar($ID_WEBINAR)
    {
        $data = $this->db->query("SELECT * FROM webinar WHERE webinar.ID_WEBINAR =  '$ID_WEBINAR'");
        return $data;
    }

    // tampil fasilitas
    function tampil_dt_fasilitas_webinar($ID_WEBINAR)
    {
        $data = $this->db->query("SELECT detail_fasilitas_webinar.ID_WEBINAR, detail_fasilitas_webinar.ID_FA, fasilitas_webinar.NM_FA 
                                FROM detail_fasilitas_webinar, fasilitas_webinar, webinar 
                                WHERE detail_fasilitas_webinar.ID_FA = fasilitas_webinar.ID_FA
                                AND detail_fasilitas_webinar.ID_WEBINAR = webinar.ID_WEBINAR
                                AND webinar.ID_WEBINAR = '$ID_WEBINAR'");
        return $data;
    }
}
