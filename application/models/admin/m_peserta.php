<?php
    Class M_peserta extends CI_Model
    {
        public function peserta()
        {
            $peserta  = $this->db->get('peserta')->result_array();
            return $peserta;
        }
    }
?>