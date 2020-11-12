<?php
    class M_kelas extends CI_Model
    {
        public function getkelas()
        {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function getktg()
        {
            $ktg = $this->db->get('ktg_kelas')->result_array();
            return $ktg;
        }

        public function savekelas($data)
        {
            $save = $this->db->insert_batch('kelas', $data);
            return $save;
        }
    }
?>