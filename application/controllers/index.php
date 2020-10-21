<?php

class index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    /** Menampilkan Form Login */
    public function index()
    {
        $data['judul'] = 'Preneur Academy';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/index");
        $this->load->view("landingpage/template/footer");
    }
}