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

        public function blokps($id)
        {
            $this->db->set('ACTIVE', 2);
            $this->db->where('ID_PS', $id);
            $this->db->update('peserta');
            return $this->db;
        }

        public function unblokps($id)
        {
            $this->db->set('ACTIVE', 1);
            $this->db->where('ID_PS', $id);
            $this->db->update('peserta');
            return $this->db;
        }

        public function jmlps()
        {
            $jml = $this->db->get('peserta')->num_rows();
            return $jml;
        }
    }
?>