<?php

class index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_landingpage');
        $this->load->model('admin/m_medsos');
        $this->load->model('admin/m_navbar');
        $this->load->model('admin/m_kebijakan');
        $this->load->model('admin/m_blog');
    }


    /** Menampilkan Form Login */
    public function index()
    {
        $data['blog'] = $this->m_landingpage->tampil_blog_web()->result();
        $data['footer'] = $this->m_medsos->get_data(); 
        $data['header'] = $this->m_navbar->get_navbar(); 
        $data['kebijakan'] = $this->m_kebijakan->get_data(); 
        $data['judul'] = 'Preneur Academy';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/index");
        $this->load->view("landingpage/template/footer" , $data);
    }
    
    public function detail_blog()
    {
        $data['blog'] = $this->m_blog->tampil_dt_blog($ID_POST, 'post')->result();
        $data['detail_tags'] = $this->m_blog->tampil_dt_tags($ID_POST, 'detail_tags')->result();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $data['data'] = $this->m_medsos->get_data();
        $data['judul'] = 'Post Blog';
        $this->load->view("landingpage/template/headerblog" , $data);
        $this->load->view("landingpage/detail_blog");
        $this->load->view("landingpage/template/footer" , $data);
    }
}