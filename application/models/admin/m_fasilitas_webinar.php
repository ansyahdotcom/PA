<?php

class M_fasilitas_webinar extends CI_Model
{
    public function tampil_fasilitas()
    {
        $data = $this->db->query("SELECT ID_FA, NM_FA FROM fasilitas_webinar ORDER BY ID_FA ASC");
        return $data;
    }

    //hapus fasilitas
    public function hapus_fasilitas($ID_FA)
    {
        $hasil = $this->db->query("DELETE FROM fasilitas_webinar WHERE ID_FA='$ID_FA'");
        return $hasil;
    }

    // nyari data id fasilitas terakhir
    public function selectMaxID_FA()
    {
        $query = $this->db->query("SELECT MAX(ID_FA) AS ID_FA FROM fasilitas_webinar");
        $hasil = $query->row();
        return $hasil->ID_FA;
    }

    // tambah fasilitas
    function tmbh_fasilitas($ID_FA, $NM_FA)
    {
        $this->db->query("INSERT INTO fasilitas_webinar ( ID_FA, NM_FA ) VALUES('$ID_FA', '$NM_FA')");
    }

    //update fasilitas
    function update_fasilitas($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
