<?php

class M_materi extends CI_Model{
	
	// GET DATA MATERI
	function get_materi($id){
		$result = $this->db->query("SELECT * FROM detail_materi, kelas, materi WHERE
        detail_materi.ID_MT = materi.ID_MT AND kelas.ID_KLS = detail_materi.ID_KLS AND kelas.ID_KLS =$id");
		return $result->result_array();
	}

	// READ
	function get_data(){
		$result = $this->db->get('materi');
		return $result->result_array();
	}

	// GET DATA SUB
	function get_sub(){
		$result = $this->db->query(
			"SELECT * FROM materi, materi_sub 
			WHERE materi.ID_MT = materi_sub.ID_MT"
		);
		return $result->result_array();
	}

	// CREATE
	function create_($materi,$detail,$id_kelas){
		$this->db->trans_start();
			//INSERT KE MATERI
			$data  = array(
				'NM_MT' => $materi,
				'DETAIL_MT' => $detail
			);
			$this->db->insert('materi', $data);
			//GET ID MATERI
			$materi_id = $this->db->insert_id();
			$result = array();
				    $result[] = array(
				    	'ID_MT'  	=> $materi_id,
				    	'ID_KLS'  => $_POST['id_kelas']
				    );      
			//INSERT KE DETAIL TABLE
			$this->db->insert_batch('detail_materi', $result);
		$this->db->trans_complete();
	}
	
	// UPDATE
	function update_($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

	// DELETE
	function delete_($where, $table)
    {
        $this->db->delete($table, $where);
    }
}
?>