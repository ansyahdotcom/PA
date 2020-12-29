<?php

class legal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_landingpage');
        $this->load->model('admin/m_medsos');
        $this->load->model('admin/m_navbar');
        $this->load->model('admin/m_kebijakan');
    }

    public function terms()
    {
        $data['legal'] = $this->m_landingpage->kebijakan();
        $data['footer'] = $this->m_medsos->get_data(); 
        $data['header'] = $this->m_navbar->get_navbar(); 
        $data['kebijakan'] = $this->m_kebijakan->get_data(); 
        $data['judul'] = 'Preneur Academy | Legal';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/legal/terms");
        $this->load->view("landingpage/template/footer", $data);
    }
    
    public function privacy()
    {
        $data['legal'] = $this->m_landingpage->kebijakan();
        $data['footer'] = $this->m_medsos->get_data(); 
        $data['header'] = $this->m_navbar->get_navbar(); 
        $data['kebijakan'] = $this->m_kebijakan->get_data(); 
        $data['judul'] = 'Preneur Academy | Legal';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/legal/privacy");
        $this->load->view("landingpage/template/footer", $data);
    }
    
    public function services()
    {
        $data['legal'] = $this->m_landingpage->kebijakan();
        $data['footer'] = $this->m_medsos->get_data(); 
        $data['header'] = $this->m_navbar->get_navbar(); 
        $data['kebijakan'] = $this->m_kebijakan->get_data(); 
        $data['judul'] = 'Preneur Academy | Legal';
        $this->load->view("landingpage/template/header", $data);
        $this->load->view("landingpage/legal/services");
        $this->load->view("landingpage/template/footer", $data);
    }
}