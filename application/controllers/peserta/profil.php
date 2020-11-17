<?php
    class Profil extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('peserta/m_peserta');
            $this->load->library('form_validation');
            $this->load->library('upload');
            adm_logged_in();
            cekadm();
        }

        public function index()
        {
            $email = $this->session->userdata('email');
            $data['tittle'] = "Profil Saya";
            /** Ambil data admin */
            $data['peserta'] = $this->m_peserta->peserta($email);

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required ', [
                'required' => 'kolom ini harus diisi',
            ]);

            $this->form_validation->set_rules('hp', 'Hp', 'trim|numeric|min_length[11]|max_length[13]', [
                'numeric' => 'kolom ini harus berisi angka',
                'min_length' => 'format yang di masukkan salah',
                'max_length' => 'format yang di masukkan salah'
            ]);


            if ($this->form_validation->run() == false) {
                $this->load->view("peserta/template/v_header", $data);
                $this->load->view("peserta/template/v_navbar", $data);
                $this->load->view("peserta/template/v_sidebar", $data);
                $this->load->view("peserta/profil/v_profil", $data);
                $this->load->view("peserta/template/v_footer");
            } else {
                $nama = htmlspecialchars($this->input->post('nama'));
                $hp = htmlspecialchars($this->input->post('hp'));
                $jeniskelamin = htmlspecialchars($this->input->post('jk'));
                $pekerjaan = htmlspecialchars($this->input->post('pekerjaan'));
                $agama = htmlspecialchars($this->input->post('agama'));
                $kotsal = htmlspecialchars($this->input->post('kotsal'));

                /** Proses Edit Gambar */
                $upload_image = $_FILES['image']['name'];

                if ($upload_image) {
                        $config['allowed_types'] = 'gif|jpg|jpeg|png';
                        $config['max_size'] = '2048';
                        $config['upload_path'] = './assets/dist/img/peserta/';

                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('image')) {
                            $old_image = $data['peserta']['FTO_PS'];
                            if ($old_image != 'default.jpg') {
                                unlink(FCPATH . 'assets/dist/img/peserta/' . $old_image);
                            }
                            $new_image = $this->upload->data('file_name');
                            $this->db->set('FTO_PS', $new_image);
                        } else {
                            echo $this->upload->display_errors();
                        }
                }        

                $edit = [
                    'NM_PS' => $nama,
                    'HP_PS' => $hp,
                    'JK' => $jeniskelamin,
                    'PEKERJAAN' => $pekerjaan,
                    'AGAMA' => $agama,
                    'KOTSAL' => $kotsal,
                ];

                $this->db->set($edit);
                $this->db->where('EMAIL_PS', $email);
                $this->db->update('peserta');
                $this->session->set_flashdata('message', 'Ubah Profil');
                redirect('peserta/profil');
            }
        }
    }