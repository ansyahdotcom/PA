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
    }
?>
