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
        $this->load->view("peserta/template/v_header");
        $this->load->view("peserta/template/v_navbar");
        $this->load->view("peserta/template/v_sidebar");
        $this->load->view("peserta/index");
        $this->load->view("peserta/template/v_footer");
    }
}
