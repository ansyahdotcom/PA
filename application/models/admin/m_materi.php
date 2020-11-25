<?php

class M_materi extends CI_Model{
	
	function get_materi(){
		$query = $this->db->get('materi');
		return $query->result_array();
	}

	function insert_materi($name){
		$data = array(
			'NM_MT' => $name,
			'FILE_MT' => $file 
		);
		$this->db->insert('materi',$data);
	}

	public function hapus_materi($ID_MT)
    {
        $hasil = $this->db->query("DELETE FROM materi WHERE ID_MT='$ID_MT'");
        return $hasil;
    }
	
	function tmbh_materi($ID_TAGS, $NM_MT)
    {
        $this->db->query("INSERT INTO materi ( ID_MT, NM_MT ) VALUES ( '$ID_MT', '$NM_MT')");
	}
	
	function update_materi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    
}