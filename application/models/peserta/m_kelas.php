<?php
    class M_kelas extends CI_Model
    {
        public function getkelas($limit, $start, $keyword = null)
        {
            if($keyword) {
                $this->db->like('TITTLE', $keyword);
            }

            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('diskon', 'diskon.ID_DISKON = kelas.ID_DISKON', 'left');
            $this->db->join('admin', 'admin.ID_ADM = kelas.ID_ADM', 'left');
            $this->db->limit($limit, $start);
            $this->db->where('STAT', 1);
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function countkls()
        {
            return $this->db->get('kelas')->num_rows();
        }
    }
?>