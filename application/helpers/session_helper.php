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

    function psrt_logged_in()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('peserta/auth/login');
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
            redirect('peserta/dashboard');
            die;
        }
    }

    function cekpsrt()
    {
        $var_ci = get_instance();
        $data = $var_ci->session->userdata('email');

        $user = $var_ci->db->get_where('peserta', [
            'EMAIL_PS' => $data
        ])->row_array();
        if($user['ID_ROLE'] != 2) {
            redirect('admin/dashboard');
            die;
        }
    }
?>