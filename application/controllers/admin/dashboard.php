<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    /** Menampilkan Form Login */
    public function index()
    {
        $this->load->view("admin/template/v_header");
        $this->load->view("admin/template/v_navbar");
        $this->load->view("admin/template/v_sidebar");
        $this->load->view("admin/index");
        $this->load->view("admin/template/v_footer");
    }
}
