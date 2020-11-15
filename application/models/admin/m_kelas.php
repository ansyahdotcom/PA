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

        public function getgambar()
        {
            $this->db->select('GBR_KLS');
            $this->db->from('kelas');
            $query = $this->db->get()->result();
            return $query;
        }

        public function getktg()
        {
            $ktg = $this->db->get('ktg_kelas')->result_array();
            return $ktg;
        }

        public function savekls($data)
        {
            $save = $this->db->insert_batch('kelas', $data);
            return $save;
        }

        public function delkls($id)
        {
            $this->db->where('ID_KLS', $id);
            $this->db->delete('kelas');
            return $this->db;
        }

        public function drftkls($id)
        {
            $this->db->set('STAT', 0);
            $this->db->where('ID_KLS', $id);
            $this->db->update('kelas');
            return $this->db;
        }

        public function pubkls($id)
        {
            $this->db->set('STAT', 1);
            $this->db->where('ID_KLS', $id);
            $this->db->update('kelas');
            return $this->db;
        }
    }
?>