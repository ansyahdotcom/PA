<?php
    class Peserta extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin/m_peserta');
            // $this->load->helper('form', 'url');
            adm_logged_in();
        }
    
        public function index()
        {
            $data['admin'] = $this->db->get_where('admin', [
                'EMAIL_ADM' =>
                $this->session->userdata('email')
            ])->row_array();
            $data['tittle'] = "Data Peserta";
            
            /** Ambil data peserta */
            $data['ps'] = $this->m_peserta->peserta();
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/peserta/v_peserta", $data);
            $this->load->view("admin/template_adm/v_footer");
        }
    }
