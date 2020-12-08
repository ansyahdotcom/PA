<?php

class Fasilitas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_fasilitas');
        $this->load->library('upload');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Data Fasilitas";

        // buat id fasilitas
        $ID_T = $this->m_fasilitas->selectMaxID_FA();
        if ($ID_T == NULL) {
            $data['ID_FAS'] = 'FA0001';
        } else {
            $noT = substr($ID_T, 2, 4);
            $IDT = $noT + 1;
            $data['ID_FAS'] = 'FA' . sprintf("%04s", $IDT);
        }

        /** Ambil data fasilitas */
        $data['fasilitas'] = $this->m_fasilitas->tampil_fasilitas()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/webinar/v_fasilitas", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    //hapus fasilitas webinar
    public function hapus()
    {
        $ID_FA = $this->input->post('ID_FA');
        $this->m_fasilitas->hapus_fasilitas($ID_FA);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/fasilitas');
    }

    //tambah fasilitas di fasilitas webinar
    public function tambah_fasilitas()
    {
        $ID_FA = htmlspecialchars($this->input->post('ID_FA'));
        $NM_FA = htmlspecialchars($this->input->post('NM_FA'));
        $this->m_fasilitas->tmbh_fasilitas($ID_FA, $NM_FA);
        $this->session->set_flashdata('message', 'save');
        redirect('admin/fasilitas');
    }

    //update fasilitas
    public function update_fasilitas()
    {
        $ID_FA = htmlspecialchars($this->input->post('ID_FA'));
        $NM_FA = htmlspecialchars($this->input->post('NM_FA'));

        $data = array(
            'NM_FA' => $NM_FA
        );

        $where = array('ID_FA' => $ID_FA);

        $this->m_fasilitas->update_fasilitas($where, $data, 'fasilitas');
        $this->session->set_flashdata('message', 'edit');
        redirect('admin/fasilitas');
    }
}
