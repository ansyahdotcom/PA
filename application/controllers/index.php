<?php

class index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_landingpage');
    }


    /** Menampilkan Form Login */
    public function index()
    {
        $data['blog'] = $this->m_landingpage->tampil_blog_web()->result();
        $data['judul'] = 'Preneur Academy';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/index");
        $this->load->view("landingpage/template/footer");
    }

    public function detail_blog()
    {
        $this->load->view("landingpage/detail_blog");
    }
}