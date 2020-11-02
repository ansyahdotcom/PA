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

    // function ps_logged_in()
    // {
    //     $var_ci = get_instance();
    //     if ($var_ci->session->userdata('email')) {
    //         redirect('peserta/auth');
    //     } else {
    //         // redirect('admin/dashboard');
    //     }
    // }
?>