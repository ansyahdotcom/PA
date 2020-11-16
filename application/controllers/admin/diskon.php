<?php
class Diskon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_diskon');
        adm_logged_in();
        cekadm();
    }

    /** Menampilkan data diskon */
    public function index()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Data Diskon';

        /** mengambil data diskon */
        $data['dis'] = $this->m_diskon->getdiskon();
        $this->load->view('admin/template_adm/v_header', $data);
        $this->load->view('admin/template_adm/v_navbar', $data);
        $this->load->view('admin/template_adm/v_sidebar', $data);
        $this->load->view('admin/diskon/v_diskon', $data);
        $this->load->view('admin/template_adm/v_footer');
    }
}
?>


