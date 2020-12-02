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

        public function myclass($email)
        {
            $this->db->select('*');
            $this->db->from('kelas');
            $this->db->join('ktg_kelas', 'ktg_kelas.ID_KTGKLS = kelas.ID_KTGKLS', 'left');
            $this->db->join('detail_kelas', 'detail_kelas.ID_KLS = kelas.ID_KLS', 'left');
            $this->db->join('peserta', 'peserta.ID_PS = detail_kelas.ID_PS', 'left');
            $this->db->where('EMAIL_PS', $email);
            $query = $this->db->get()->row_array();
            return $query;
        }

        public function cekmyclass($email)
        {
            $this->db->select('detail_kelas.ID_PS');
            $this->db->from('detail_kelas');
            $this->db->join('peserta', 'peserta.ID_PS = detail_kelas.ID_PS', 'left');
            $this->db->where('EMAIL_PS', $email);
            $query = $this->db->get()->row_array();
            return $query;
        }

        // public function getidkelas($id)
        // {
        //     $hasil = $this->db->query('SELECT * FROM kelas 
        //     WHERE kelas.ID_KLS = $id');

        //     return $hasil->row();
        // }

        public function getmateri($id){
            $result = $this->db->query("SELECT * FROM detail_materi, kelas, materi
            WHERE detail_materi.ID_MT = materi.ID_MT AND kelas.ID_KLS AND kelas.ID_KLS = $id");
            return $result;
        }
        public function getsub(){
            $result = $this->db->query("SELECT * FROM materi, materi_sub WHERE materi.ID_MT = materi_sub.ID_MT");
            return $result;
        }
    }

?>