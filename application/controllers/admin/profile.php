<?php
    class Profile extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('admin/m_admin');
            $this->load->library('form_validation');
            adm_logged_in();
            cekadm();
        }

        public function index()
        {
            $email = $this->session->userdata('email');
            $data['tittle'] = "Profil Saya";

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha', [
                'required' => 'kolom ini harus diisi',
                'alpha' => 'harus berisi huruf'
            ]);

            $this->form_validation->set_rules('hp', 'Hp', 'trim|numeric|min_length[11]|max_length[13]', [
                'numeric' => 'harus berisi angka',
                'min_length' => 'format yang di masukkan salah',
                'max_length' => 'format yang di masukkan salah'
            ]);

            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

            if ($this->form_validation->run() == false) {
                /** Ambil data admin */
                $data['admin'] = $this->m_admin->admin($email);
                $this->load->view("admin/template_adm/v_header", $data);
                $this->load->view("admin/template_adm/v_navbar", $data);
                $this->load->view("admin/template_adm/v_sidebar", $data);
                $this->load->view("admin/profile/v_profile", $data);
                $this->load->view("admin/template_adm/v_footer");
            } else {
                $nama = htmlspecialchars($this->input->post('nama'));
                $hp = htmlspecialchars($this->input->post('hp'));
                $alamat = htmlspecialchars($this->input->post('alamat'));

                $edit = [
                    'NM_ADM' => $nama,
                    'HP_ADM' => $hp,
                    'ALMT_ADM' => $alamat,
                ];

                $this->m_admin->edit($edit, $email);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Profil berhasil diubah!</h5></div>');
                redirect('admin/profile');
            }
        }
    }
?>