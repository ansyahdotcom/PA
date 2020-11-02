<?php
    Class M_peserta extends CI_Model
    {
        public function peserta()
        {
            $peserta  = $this->db->get('peserta')->result_array();
            return $peserta;
        }

        public function delps($id)
        {
            $this->db->where('ID_PS', $id);
            $this->db->delete('peserta');
            return $this->db;
        }
    }
?>