<?php
    class Profile extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin/m_admin');
            adm_logged_in();
            cekadm();
        }
    
        public function index()
        {
            $email = $this->session->userdata('email');
            $data['tittle'] = "Profil Saya";
            
            /** Ambil data admin */
            $data['admin'] = $this->m_admin->admin($email);
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/profile/v_profile", $data);
            $this->load->view("admin/template_adm/v_footer");
        }
    }
