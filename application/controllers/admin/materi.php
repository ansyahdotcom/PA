<?php

class Materi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_materi');
        adm_logged_in();
        cekadm();
    }

    public function materikelas($id)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Materi";
        $data['materi'] = $this->m_materi->get_materi();
        // $this->load->view('admin/coba/coba', $data);
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/kelas/v_listmateri", $data);
        $this->load->view("admin/template_adm/v_footer");
    }
}