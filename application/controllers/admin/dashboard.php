<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        adm_logged_in();
    }


    /** Menampilkan Dashboard Admin */
    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/index");
        $this->load->view("admin/template_adm/v_footer");
    }
}
