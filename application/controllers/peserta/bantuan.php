<?php

class Bantuan extends CI_Controller{

    public function __construct(){
        parent::__construct();
        psrt_logged_in();
        cekpsrt();
    }

    public function index(){
        $email = $this->session->userdata('email');
        $data ['peserta'] = $this->db->get_where('peserta', ['EMAIL_PS' => $email])->row_array();
        $data ['tittle'] = "FAQ";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/bantuan/v_faq", $data);
        $this->load->view("peserta/template/v_footer");
    }
}
