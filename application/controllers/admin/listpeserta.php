<?php

class Listpeserta extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_listpeserta');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "List Peserta";

        $data['listpeserta'] = $this->m_listpeserta->tampil()->result();
        // $this->load->view('admin/coba/coba', $data);
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/kelas/v_listpeserta", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    //hapus peserta dari list
    public function hapus()
    {
        $ID_KLS = $this->input->post('ID_KLS');
        $this->m_listpeserta->hapus_listpeserta($ID_KLS);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/listpeserta');
    }
}
