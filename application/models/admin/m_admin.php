<?php
    class M_admin extends CI_Model
    {
        function admin($email)
        {
            $admin = $this->db->get_where('admin', [
                'EMAIL_ADM' => $email
            ])->row_array();
            return $admin;
        }

        function edit($edit, $email)
        {
            $this->db->set($edit);
            $this->db->where('EMAIL_ADM', $email);
            $this->db->update('admin');
            return $this->db;
        }

        function ubhpsw($pswhash, $email)
        {
            $this->db->set('PSW_ADM', $pswhash);
            $this->db->where('EMAIL_ADM', $email);
            $this->db->update('admin');
            return $this->db;
        }

        function editimg($new_image, $email)
        {
            $this->db->set('FOTO_ADM', $new_image);
            $this->db->where('EMAIL_ADM', $email);
            $this->db->update('admin');
            return $this->db;
        }
    }
?>
