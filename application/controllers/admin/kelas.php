<?php
class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_kelas');
        $this->load->library('upload');
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

    /** Mengambil data kategori kelas */
    public function get_diskon()
    {
        $diskon = $this->m_kelas->getdiskon();
        echo json_encode($diskon);
    }

    /** Simpan Semua Data Kelas */
    public function saveall()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Data Kelas';
        
        $this->form_validation->set_rules('namakls', 'Namakls', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('link', 'Link', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric|is_natural', [
            'required' => 'Kolom ini harus diisi',
            'is_natural' => 'data yang diinputkan salah'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Kolom ini harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            /** Mengambil data kelas */
            $data['kelas'] = $this->m_kelas->getkelas();
            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/kelas/v_kelas', $data);
            $this->load->view('admin/template_adm/v_footer');
            $this->session->set_flashdata('message', 'formempty');
        } else {
            $namakls = htmlspecialchars($this->input->post('namakls'));
            $tgl_mulai = htmlspecialchars($this->input->post('tgl_mulai'));
            $tgl_selesai = htmlspecialchars($this->input->post('tgl_selesai'));
            $lok_kls = htmlspecialchars($this->input->post('lok_kls'));
            $hari = htmlspecialchars($this->input->post('hari'));
            $jam_mulai = htmlspecialchars($this->input->post('jam_mulai'));
            $jam_selesai = htmlspecialchars($this->input->post('jam_selesai'));
            $kategori = htmlspecialchars($this->input->post('ktg'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $link = htmlspecialchars($this->input->post('link'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            
            /** upload gambar */
            $upload_image = $_FILES['gbrkls']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path']  = './assets/dist/img/kelas/';

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('gbrkls')) {
                    echo $this->upload->display_errors();
                } else {
                    $image = $this->upload->data('file_name');
                }
            } else {
                $image = 'default.jpg';
            }

            /** Proses insert ke database */
            $kelas = [
                'ID_ADM' => $data['admin']['ID_ADM'],
                'ID_KTGKLS' => $kategori,
                'ID_DISKON' => 0,
                'TITTLE' => $namakls,
                'TGL_MULAI' => $tgl_mulai,
                'TGL_SELESAI' => $tgl_selesai,
                'LOK_KLS' => $lok_kls,
                'HARI' => $hari,
                'JAM_MULAI' => $jam_mulai,
                'JAM_SELESAI' => $jam_selesai,
                'PERMALINK' => $link,
                'GBR_KLS' => $image,
                'DESKRIPSI' => $deskripsi,
                'PRICE' => $harga,
                'STAT' => 0,
                'DATE_KLS' => time(),
                'UPDATE_KLS' => 0
            ];

            $this->m_kelas->saveall($kelas);
            $this->session->set_flashdata('message', 'save');
            redirect('admin/kelas');
        }
    }

    /** Edit data kelas */
    public function editkls()
    {
        $email = $this->session->userdata('email');
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' => $email
        ])->row_array();
        $data['tittle'] = 'Data Kelas';

        /** Mengambil data kelas */
        $data['kelas'] = $this->m_kelas->getkelas();

        $this->form_validation->set_rules('namakls', 'Namakls', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('link', 'Link', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'Kolom ini harus diisi',
            'numeric' => 'Data harus berisi angka'
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/template_adm/v_header', $data);
            $this->load->view('admin/template_adm/v_navbar', $data);
            $this->load->view('admin/template_adm/v_sidebar', $data);
            $this->load->view('admin/kelas/v_kelas', $data);
            $this->load->view('admin/template_adm/v_footer');
        } else {
            $id = $this->input->post('id');
            $nama = htmlspecialchars($this->input->post('namakls'));
            $tgl_mulai = htmlspecialchars($this->input->post('tgl_mulai'));
            $tgl_selesai = htmlspecialchars($this->input->post('tgl_selesai'));
            $lok_kls = htmlspecialchars($this->input->post('lok_kls'));
            $hari = htmlspecialchars($this->input->post('hari'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $link = htmlspecialchars($this->input->post('link'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $kategori = htmlspecialchars($this->input->post('ktg'));
            $oldimg = $this->input->post('old');

            /** Proses edit gambar */
            $upload_image = $_FILES['gbrkls']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/kelas/';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('gbrkls')) {
                    if ($oldimg != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/kelas/' . $oldimg);
                    }
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $new_image = $oldimg;
            }

            $edit = [
                'TITTLE' => $nama,
                'TGL_MULAI' => $tgl_mulai,
                'TGL_SELESAI' => $tgl_selesai,
                'LOK_KLS' => $lok_kls,
                'HARI' => $hari,
                'PERMALINK' => $link,
                'GBR_KLS' => $new_image,
                'DESKRIPSI' => $deskripsi,
                'PRICE' => $harga,
                'ID_DISKON' => 0,
                'ID_KTGKLS' => $kategori,
                'UPDATE_KLS' => time(),
            ];

            $this->m_kelas->editkls($edit, $id);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/kelas');
        }
    }

    public function hapuskls()
    {
        $id = $this->input->post('id');
        $this->m_kelas->delkls($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/kelas');
    }

    public function draftkls()
    {
        $id = $this->input->post('id');
        $this->m_kelas->drftkls($id);
        $this->session->set_flashdata('message', 'draft');
        redirect('admin/kelas');
    }

    public function publishkls()
    {
        $id = $this->input->post('id');
        $this->m_kelas->pubkls($id);
        $this->session->set_flashdata('message', 'publish');
        redirect('admin/kelas');
    }
}
