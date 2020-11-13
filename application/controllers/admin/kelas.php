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
        
        /** Mengambil data kategori kelas */
        public function get_ktgkls()
        {
            $ktgkls = $this->m_kelas->getktg();
            echo json_encode($ktgkls);
        }

        public function saveall()
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

            if($this->request->isAjax()) {
                $id;
                $nama = $this->request->getVar('nama');
                $link = $this->request->getVar('link');
                $hrg = $this->request->getVar('hrg');
                $disc = $this->request->getVar('disc');
                $deskripsi = $this->request->getVar('deskripsi');
                $b = 0;

                $jmldata = count($id);

                for($i = 0; $i < $jmldata; $i++) {
                    $datakls = [
                        'ID_KLS' => $id[$i],
                        'TITTLE' => $nama[$i],
                        'PERMALINK' => $link[$i],
                        'GBR_KLS' => 'default.jpg'[$i],
                        'DESKRIPSI' => $deskripsi[$i],
                        'PRICE' => $hrg[$i],
                        'DISC' => $disc[$i],
                        'STAT' => $b[$i],
                        'ID_KTGKLS' => $b[$i],
                        'DATE_CREATE' => time()[$i],
                        'LAST_UPDATE' => $b[$i],
                    ];

                    $this->m_kelas->savekls($datakls);
                }

                $msg = [
                    'sukses' => "$jmldata data kelas berhasil disimpan"
                ];

                echo json_encode($msg);
            }
            
        }
    }

