<?php

class Landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    /** Menampilkan Form Login */
    public function index()
    {
        $this->load->view("landingpage/template/v_header");
        $this->load->view("landingpage/template/v_navbar");
        $this->load->view("landingpage/template/v_sidebar");
        $this->load->view("landingpage/index");
        $this->load->view("landingpage/template/v_footer");
    }
}
