<?php
    function adm_logged_in()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('admin/auth');
        } else {
            // redirect('admin/dashboard');
        }
    }

    function cekadm()
    {
        $var_ci = get_instance();
        $data = $var_ci->session->userdata('email');

        $user = $var_ci->db->get_where('admin', [
            'EMAIL_ADM' => $data
        ])->row_array();
        if($user['ID_ROLE'] != 1) {
            redirect('peserta/auth');
            die;
        }
    }
?>