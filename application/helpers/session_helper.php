<?php
    function adm_logged_in()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('authadm');
        }
    }

    function psrt_logged_in()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('auth');
        }
    }

    function cekadm()
    {
        $var_ci = get_instance();
        if($user['role'] != 1) {
            redirect('peserta/dashboard');
            die;
        }
    }

    function cekpsrt()
    {
        $var_ci = get_instance();
        if($user['role'] != 2) {
            redirect('admin/dashboard');
            die;
        }
    }
?>