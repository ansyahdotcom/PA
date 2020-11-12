<?php
    class Kelas extends CI_Controller
    {   
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/m_kelas');
            adm_logged_in();
            cekadm();
        }   

        /** Menampilkan data kelas */
        public function index()
        {
            $email = $this->session->userdata('email');
            $data['admin'] = $this->db->get_where('admin', [
                'EMAIL_ADM' => $email
            ])->row_array();
            $data['tittle'] = 'Data Kelas';

            /** Mengambil data kelas */
            $data['kelas'] = $this->m_kelas->getkelas();
            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/kelas/v_kelas', $data);
            $this->load->view('admin/template_adm/v_footer');
        }

        /** Tambah data kelas */
        public function addkelas()
        {
            $email = $this->session->userdata('email');
            $data['admin'] = $this->db->get_where('admin', [
                'EMAIL_ADM' => $email
            ])->row_array();
            $data['tittle'] = 'Tambah Kelas';

            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/kelas/v_addkelas', $data);
            $this->load->view('admin/template_adm/v_footer');
        }

        
        /** Mengambil data kategori kelas */
        public function get_ktgkls()
        {
            $ktgkls = $this->m_kelas->getktg();
            echo json_encode($ktgkls);
        }

        public function savekelas()
        {
            $tabel = $this->db->get('kelas')->num_rows();
            $num = $tabel + 1;

            if ($tabel >= 0 && $tabel < 10) {
                $id = "PSR0000" . $num;
            } elseif ($tabel >= 10 && $tabel < 100) {
                $id = "PSR000" . $num;
            } elseif ($tabel >= 100 && $tabel < 1000) {
                $id = "PSR00" . $num;
            } elseif ($tabel >= 1000 && $tabel < 10000) {
                $id = "PSR0" . $num;
            } elseif ($tabel >= 10000 && $tabel < 100000) {
                $id = "PSR" . $num;
            }

            return $id;
            var_dump($id);
            $kelas = htmlspecialchars($this->input->post('namakls'));
            $link = htmlspecialchars($this->input->post('link'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $diskon = htmlspecialchars($this->input->post('diskon'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $data = array();

            $index = 0;
            foreach ($id as $i) {
                array_push($data, array(
                    'ID_KLS' => $i,
                    'TITTLE' => $kelas[$index],
                    'PERMALINK' => $link[$index],
                    'GBR_KLS' => "",
                    'DESKRIPSI' => $deskripsi[$index],
                    'PRICE' => $harga[$index],
                    'DISC' => $diskon[$index],
                    'STAT' => 0,
                    'ID_KTGKLS' => "",
                    'DATE_CREATE' => time(),
                    'LAST_UPDATE' => 0
                ));
                $index++;
            }

            $sve = $this->m_kelas->savekelas($data);
            var_dump($sve);
            redirect('admin/kelas');
        }
    }

