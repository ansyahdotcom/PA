<?php

class M_materi extends CI_Model{
	
	function get_materi(){
		$query = $this->db->get('materi');
		return $query->result_array();
	}

	function insert_materi($name){
		$data = array(
			'NM_MT' => $name
		);
		$this->db->insert('materi',$data);
	}

	public function hapus_materi($ID_MT)
    {
        $hasil = $this->db->query("DELETE FROM materi WHERE ID_MT='$ID_MT'");
        return $hasil;
    }
	
	function tmbh_materi($NM_MT)
    {
        $this->db->query("INSERT INTO materi ( NM_MT ) VALUES ('$NM_MT')");
	}

	
	
	function update_materi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
}