<?php

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();
        psrt_logged_in();
        cekpsrt();
    }

    public function index(){
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['tittle'] = "Beranda";
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/index");
        $this->load->view("peserta/template/v_footer");
    }


}
?>