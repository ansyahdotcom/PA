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

    
}