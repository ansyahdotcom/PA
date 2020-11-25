<?php
class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('peserta/m_kelas');
        psrt_logged_in();
        cekpsrt();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
        ])->row_array();

        $data['tittle'] = "Daftar Kelas";

        /** Function Search Data */
        if (isset($_POST['btn-search'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        /** Pagination halaman kelas */

        /** Query terakhir untuk helper search*/
        $this->db->like('TITTLE', $data['keyword']);
        $this->db->from('kelas');


        $config['total_rows'] = $this->db->count_all_results();
        $data['rows'] = $config['total_rows'];
        $config['per_page'] = 9;
        // $config['num_links'] = 3;

        /** Initialize library pagination */
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(4);


        /** Mengambil data kelas */
        $data['kls'] = $this->m_kelas->getkelas($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("peserta/template/v_header", $data);
        $this->load->view("peserta/template/v_navbar", $data);
        $this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view("peserta/kelas/v_kelas", $data);
        $this->load->view("peserta/template/v_footer");
    }
}
