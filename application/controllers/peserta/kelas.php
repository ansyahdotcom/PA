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
            if(isset($_POST['btn-search']))
            {
                $data['keyword'] = $this->input->post('keyword');
                $this->session->set_userdata('keyword', $data['keyword']);
            } else {
                $data['keyword'] = $this->session->userdata('keyword');
            }

            /** Pagination halaman kelas */

            /** Query terakhir untuk helper search*/
            $this->db->like('TITTLE', $data['keyword']);
            $this->db->from('kelas');

            $config['base_url'] = 'http://localhost/PA/peserta/kelas/index';
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 9;
            // $config['num_links'] = 3;

            /** Styling pagination */
            $config['full_tag_open'] = '<nav aria-label="Page"><ul class="pagination justify-content-center">';
            $config['full_tag_close'] = '</ul></nav>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li class="page-item">';
            $config['first_tag_close'] = '</li>';
            
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li class="page-item">';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li class="page-item">';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="page-item">';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li class="page-item">';
            $config['num_tag_close'] = '</li>';

            $config['attributes'] = array('class' => 'page-link');

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
