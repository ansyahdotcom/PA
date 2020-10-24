<?php
    class M_auth extends CI_Model
    {
        public function idpsr() {
            /** Membuat id peserta */ 
		    $tabel = $this->db->get('peserta')->num_rows();
            return $tabel;
        }

        public function regpeserta($register)
        {
            $insert = $this->db->insert('peserta', $register);
            return $insert;
        }

        public function emailverif($email)
        {
            $user = $this->db->get_where('peserta', [
                'EMAIL_PS' => $email
            ])->row_array();

            return $user;
        }

        public function activ($email)
        {
            $this->db->set('ACTIVE', 1);
            $this->db->where('email', $email);
            $this->db->update('peserta');
        }

        public function del($email)
        {
            $this->db->delete('peserta', ['EMAIL_PS' => $email]);
        }
    }
?>