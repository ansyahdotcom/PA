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
        $this->load->view("landingpage/template/footer", $data);
    }
    
    public function lihat_post($JUDUL_POST)
    {
        $data['blog'] = $this->m_blog->tampil_dt_blog($JUDUL_POST, 'post')->result();
        $data['detail_tags'] = $this->m_blog->tampil_dt_tags($JUDUL_POST, 'detail_tags')->result();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $data['data'] = $this->m_medsos->get_data();
        $data['judul'] = 'Post Blog';
        $this->load->view("landingpage/template/headerblog" , $data);
        $this->load->view("landingpage/lihat_post", $data);
        $this->load->view("landingpage/template/footer", $data);
    }
    
    
    // lihat artikel yg kategori sama
    public function kategori($NM_CT)
    {
        
        $data['kategori'] = $this->m_landingpage->category($NM_CT, 'post')->result();
        $this->load->view("landingpage/template/headerblog" , $data);
        $this->load->view('landingpage/v_post_ktg', $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    // lihat artikel yg tag sama
    public function lihat_post_tag($NM_TAGS)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['dt_tags'] = $this->m_blog->post_tag($NM_TAGS, 'detail_tags')->result();
        $this->load->view('landingpage/v_post_tag', $data);
    }
}