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
        
        $this->form_validation->set_rules('nama[]', 'Nama', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('link[]', 'Link', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('hrg[]', 'Hrg', 'required|trim|numeric|is_natural', [
            'required' => 'Kolom ini harus diisi',
            'is_natural' => 'data yang diinputkan salah'
        ]);

        $this->form_validation->set_rules('disc[]', 'Disc', 'trim|numeric', [
            // 'required' => 'Kolom ini harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'formempty');
            redirect('admin/kelas');
        } else {
            /** upload gambar */
            // $upload_image = $_FILES['gbr']['name'];
            // if ($upload_image) {
            //     $config['upload_path']  = './assets/dist/img/kelas/';
            //     $config['allowed_type'] = 'jpg|jpeg|png|gif';
            //     $config['max_size'] = '2048';

            //     // $this->load->library('upload', $config);
            //     $this->upload->initialize($config);
            //     $is_upload = $this->upload->do_upload('gbr[]');

            //     if (($is_upload)) {
            //         $image = $this->upload->data('file_name');
            //         $img = $image;
            //     } else {
            //         echo $this->upload->display_errors();
            //         $img = 'default.jpg';
            //     }
            // } else {
            //     $img = 'default.jpg';
            // }

            /** Proses insert ke database */
            $nama = $this->input->post('nama');
            $img = 'default.jpg';
            $id_adm = $data['admin']['ID_ADM'];
            $result = array();
            foreach ($nama as $key => $val) {
                $result[] = array(
                    'ID_ADM' => $id_adm,
                    'TITTLE' => $_POST['nama'][$key],
                    'PERMALINK' => $_POST['link'][$key],
                    'GBR_KLS' => $img,
                    'DESKRIPSI' => $_POST['deskripsi'][$key],
                    'PRICE' => $_POST['hrg'][$key],
                    'ID_DISKON' => $_POST['disc'][$key],
                    'STAT' => 0,
                    'ID_KTGKLS' => $_POST['ktg'][$key],
                    'DATE_KLS' => time(),
                    'UPDATE_KLS' => 0,
                );
            }

            $this->db->insert_batch('kelas', $result);
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
            $id = htmlspecialchars($this->input->post('id'));
            $nama = htmlspecialchars($this->input->post('namakls'));
            $harga = htmlspecialchars($this->input->post('harga'));
            $diskon = htmlspecialchars($this->input->post('diskon'));
            $link = htmlspecialchars($this->input->post('link'));
            $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
            $kategori = htmlspecialchars($this->input->post('ktg'));

            /** Proses edit gambar */
            $upload_image = $_FILES['gbrkls']['name'];

            if ($upload_image) {
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/dist/img/kelas/';

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('gbrkls')) {
                        $old_image = $data['kelas']['GBR_KLS'];
                        if ($old_image != 'default.jpg') {
                            unlink(FCPATH . 'assets/dist/img/kelas/' . $old_image);
                        }
                        $new_image = $this->upload->data('file_name');
                        $this->db->set('GBR_KLS', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
            }

            $edit = [
                'TITTLE' => $nama,
                'PERMALINK' => $link,
                'DESKRIPSI' => $deskripsi,
                'PRICE' => $harga,
                'ID_DISKON' => $diskon,
                'ID_KTGKLS' => $kategori,
                'UPDATE_KLS' => time(),
            ];

            $this->db->set($edit);
            $this->db->where('ID_KLS', $id);
            $this->db->update('kelas');
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
