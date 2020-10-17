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
        $this->load->view("user/template/v_header");
        $this->load->view("user/template/v_navbar");
        $this->load->view("user/template/v_sidebar");
        $this->load->view("user/index");
        $this->load->view("user/template/v_footer");
    }
}
