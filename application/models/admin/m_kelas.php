<?php
    class M_kelas extends CI_Model
    {
        public function getkelas()
        {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('diskon', 'diskon.ID_DISKON = kelas.ID_DISKON', 'left');
            $this->db->join('admin', 'admin.ID_ADM = kelas.ID_ADM', 'left');
            $query = $this->db->get()->result_array();
            return $query;
        }

        public function link()
        {
            $this->db->select('PERMALINK');
            $this->db->from('kelas');
            $query = $this->db->get()->row_array();
            return $query;
        }

        public function getktg()
        {
            $ktg = $this->db->get('ktg_kelas')->result_array();
            return $ktg;
        }

        public function getdiskon()
        {
            $diskon = $this->db->get_where('diskon', [
                'STATUS' => 1
            ])->result_array();
            return $diskon;
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