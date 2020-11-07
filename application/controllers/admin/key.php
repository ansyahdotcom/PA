<?php

class Key extends CI_Controller
{

    function __construct(){
		parent::__construct();
		// $this->load->model('admin/m_key','key_model');
        adm_logged_in();
        cekadm();
    }

    function index(){
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['tittle'] = 'Data API Key';
        
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'kolom ini harus diisi',
        ]);

        $this->form_validation->set_rules('hp', 'Hp', 'trim|numeric|min_length[11]|max_length[13]', [
            'numeric' => 'kolom ini harus berisi angka',
            'min_length' => 'format yang di masukkan salah',
            'max_length' => 'format yang di masukkan salah'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'trim');

        if ($this->form_validation->run() == false) {
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/setting/v_key", $data);
            $this->load->view("admin/template_adm/v_footer");
        } else {
            $nama = htmlspecialchars($this->input->post('nama'));
            $hp = htmlspecialchars($this->input->post('hp'));
            $alamat = htmlspecialchars($this->input->post('alamat'));

            /** Proses Edit Gambar */
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/admin/';

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('image')) {
                        $old_image = $data['admin']['FTO_ADM'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/dist/img/admin/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('FTO_ADM', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
            }        

            $edit = [
                'NM_ADM' => $nama,
                'HP_ADM' => $hp,
                'ALMT_ADM' => $alamat,
            ];

            $this->db->set($edit);
            $this->db->where('EMAIL_ADM', $email);
            $t = $this->db->update('admin');
            $this->session->set_flashdata('message', 'Ubah Profil');
            redirect('admin/profile');
        }
    }

    function update(){

    }

    function delete(){

    }
}