<?php

class M_webinar extends CI_Model
{

    function tampil_webinar()
    {
        $data = $this->db->query("SELECT * FROM webinar ORDER BY ID_WEBINAR ASC");
        return $data;
    }

    function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }

    function tampil_edit($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // pratinjau
    function tampil_dt_webinar($TEMA)
    {
        $data = $this->db->query("SELECT * FROM webinar WHERE webinar.TEMA =  '$TEMA'");
        return $data;
    }
}
