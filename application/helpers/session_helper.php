<?php
    function adm_logged_in()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('admin/auth');
        }
    }

    // function adm_logged_out()
    // {
    //     $var_ci = get_instance();
    //     if (!$var_ci->session->unset_userdata('email')) {
    //         redirect('admin/dashboard');
    //     }
    // }
?>