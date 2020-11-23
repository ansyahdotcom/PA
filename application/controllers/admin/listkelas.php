<?php

class Listkelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_listkelas');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "List Kelas";
        $data['kyui'] = $this->m_listkelas->tampil();
        // $this->load->view('admin/coba/coba', $data);
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/kelas/v_listkelas", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function tambah_materi()
    {


        $ID_MT = htmlspecialchars($this->input->post('ID_MT'));
        $NM_MT = htmlspecialchars($this->input->post('NM_MT'));
        $this->m_listkelas->tmbh_materi($ID_MT, $NM_MT);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
        Kategori berhasil dibuat!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/listkelas');
    }
}