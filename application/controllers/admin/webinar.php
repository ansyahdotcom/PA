<?php
class Webinar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_webinar');
        $this->load->model('admin/m_medsos');
        $this->load->library('upload');
        // $this->load->library('form_validation');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Data Webinar";
        date_default_timezone_set('Asia/Jakarta');

        /** Ambil data webinar */
        $data['webinar'] = $this->m_webinar->tampil_webinar()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/webinar/v_webinar", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    // buat id fasilitas
    public function buat_id_fasilitas()
    {
        $ID_T = $this->m_webinar->selectMaxID_FA();
        if ($ID_T == NULL) {
            $kode = 'FA0001';
        } else {
            $noT = substr($ID_T, 2, 4);
            $IDT = $noT + 1;
            $kode = 'FA' . sprintf("%04s", $IDT);
        }
        return $kode;
    }

    public function tambah_webinar()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Tambah Webinar";
        // nyari id_adm yg login
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT ID_ADM FROM admin WHERE EMAIL_ADM = '$email'");
        foreach ($query->result() as $que) {
            $ID_ADM = $que->ID_ADM;
        }
        $data['ID_ADM'] = $ID_ADM;

        //buat id fasilitas
        $ID_FA = $this->buat_id_fasilitas();
        $data['ID_FA'] = $ID_FA;

        $ID_WEBINAR = $this->m_webinar->selectMaxID_WEBINAR();
        $data['ID_WEBINAR'] = $ID_WEBINAR;

        // form validation
        $this->form_validation->set_rules('TEMA', 'Tema', 'required|trim', [
            'required' => 'Kolom tema harus diisi!'
        ]);
        $this->form_validation->set_rules('FOTO_PEMBICARA', 'Foto', 'required|trim', [
            'required' => 'Kolom foto harus diisi!'
        ]);
        $this->form_validation->set_rules('HARGA', 'Harga', 'required|trim', [
            'required' => 'Kolom harga harus diisi!'
        ]);
        $this->form_validation->set_rules('PLATFORM', 'Platform', 'required|trim', [
            'required' => 'Kolom platform harus diisi!'
        ]);
        $this->form_validation->set_rules('TGL_WEB', 'Tanggal Webinar', 'required|trim', [
            'required' => 'Harap pilih tanggal webinar!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['fasilitas_webinar'] = $this->m_webinar->tampil_fasilitas_webinar()->result();
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/webinar/v_tambah_webinar", $data);
            $this->load->view("admin/template_adm/v_footer");
        } else {
            $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
            $TEMA = htmlspecialchars($this->input->post('TEMA'));
            $ID_FA = $this->input->post('ID_FA');
            $FOTO_PEMBICARA = htmlspecialchars($this->input->post('FOTO_PEMBICARA'));
            $HARGA = htmlspecialchars($this->input->post('HARGA'));
            $PLATFORM = htmlspecialchars($this->input->post('PLATFORM'));
            $TGL_WEB = date('d-F-Y', strtotime($this->input->post('TGL_WEB')));
            $TGL_POSTWEB = date('Y-m-d');
            // untuk upload foto web
            $config['upload_path']          = './assets/fotowebinar/';
            $config['allowed_types']        = 'jpg|jpeg|JPG|PNG';
            $config['max_size']             = 0;
            // $config['encrypt_name']         = true;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('FOTO_PEMBICARA')) {
                $upload_data = $this->upload->data();
                //Compress Image buat foto web
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/fotowebinar/' . $upload_data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 160;
                $config['height'] = 130;
                $config['new_image'] = './assets/fotowebinar/fotoweb/' . $upload_data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'ID_WEBINAR' => $ID_WEBINAR,
                    'TEMA' => $TEMA,
                    'FOTO_PEMBICARA' => $upload_data['file_name'],
                    'HARGA' => $HARGA,
                    'PLATFORM' => $PLATFORM,
                    'TGL_WEB' => $TGL_WEB,
                    'TGL_POSTWEB' => $TGL_POSTWEB
                );

                $this->m_webinar->insert($data, 'webinar');

                for ($i = 0; $i < count($ID_FA); $i++) {
                    $dt_fasilitas_webinar = array(
                        'ID_WEBINAR' => $ID_WEBINAR,
                        'ID_FA' => $ID_FA[$i]
                    );
                    $this->m_webinar->insert($dt_fasilitas_webinar, 'detail_fasilitas_webinar');
                }


                // $this->session->set_flashdata('message', 'blSuccess');
                $this->session->set_flashdata('message', 'save');
                redirect('admin/webinar');
            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/webinar', $error);
            }
        }
    }

    //tambah fasilitas di tambah webinar
    public function pr_tmbh_fasilitas()
    {
        $ID_FA = htmlspecialchars($this->input->post('ID_FA'));
        $NM_FA = htmlspecialchars($this->input->post('NM_FA'));
        $data = array(
            'ID_FA' => $ID_FA,
            'NM_FA' => $NM_FA
        );
        $this->m_webinar->insert($data, 'fasilitas_webinar');
        redirect('admin/webinar/tambah_fasilitas');
    }

    // proses posting webinar
    public function pr_posting()
    {
        $ST_POSTWEB = htmlspecialchars($this->input->post('ST_POSTWEB'));
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR
        );

        if ($ST_POSTWEB == 0) {
            $ST_POSTWEB++;
            $data = array(
                'ST_POSTWEB' => $ST_POSTWEB
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'posting');
            redirect('admin/webinar');
        } else {
            $ST_POSTWEB--;
            $data = array(
                'ST_POSTWEB' => $ST_POSTWEB
            );
            $this->m_webinar->update($where, $data, 'webinar');
            $this->session->set_flashdata('message', 'draf');
            redirect('admin/webinar');
        }
    }

    //hapus webinar
    public function hapus()
    {
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR
        );
        $this->m_webinar->delete($where, 'detail_fasilitas_webinar');
        $this->m_webinar->delete($where, 'webinar');
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/webinar');
    }

    public function edit($TEMA)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Edit Webinar";
        date_default_timezone_set('Asia/Jakarta');
        $where = array('TEMA' => $TEMA);

        $ID_FA = $this->buat_id_fasilitas();
        $data['ID_FA'] = $ID_FA;

        $data['webinar'] = $this->m_webinar->tampil_edit($where, 'webinar')->result();
        $data['dt_fasilitas_webinar'] = $this->m_webinar->tampil_edit_fasilitas($TEMA, 'detail_fasilitas_webinar')->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/webinar/v_edit", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function update()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        date_default_timezone_set('Asia/Jakarta');

        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $TEMA = htmlspecialchars($this->input->post('TEMA'));
        $PEMBICARA = htmlspecialchars($this->input->post('PEMBICARA'));
        // $FOTO_PEMBICARA = htmlspecialchars($this->input->post('FOTO_PEMBICARA'));
        $HARGA = htmlspecialchars($this->input->post('HARGA'));
        $PLATFORM = htmlspecialchars($this->input->post('PLATFORM'));
        $TGL_WEB = date('Y-m-d');
        $TGL_POSTWEB = date('Y-m-d');
        $ID_FA = $this->input->post('ID_FA');

        $where = array('ID_WEBINAR' => $ID_WEBINAR);

        $data = array(
            'TEMA' => str_replace(' ', '-', $TEMA),
            'PEMBICARA' => $PEMBICARA,
            // 'FOTO_PEMBICARA' => $FOTO_PEMBICARA,
            'HARGA' => $HARGA,
            'PLATFORM' => $PLATFORM,
            'TGL_WEB' => $TGL_WEB,
            'TGL_POSTWEB' => $TGL_POSTWEB
        );

        $this->m_webinar->update($where, $data, 'webinar');
        $this->m_webinar->delete($where, 'detail_fasilitas_webinar');

        for ($i = 0; $i < count($ID_FA); $i++) {
            $dt_fasilitas_webinar = array(
                'ID_WEBINAR' => $ID_WEBINAR,
                'ID_FA' => $ID_FA[$i]
            );
            $this->m_webinar->insert($dt_fasilitas_webinar, 'detail_fasilitas_webinar');
        }

        $this->session->set_flashdata('message', 'edit');
        redirect('admin/webinar');
    }

    // pratinjau / lihat post / lihat postingan webinar
    public function pratinjau($ID_WEBINAR)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        date_default_timezone_set('Asia/Jakarta');

        $data['judul'] = "Detail Webinar";
        $data['data'] = $this->m_medsos->get_data();
        $data['webinar'] = $this->m_webinar->tampil_dt_webinar($ID_WEBINAR, 'webinar')->result();
        $data['dt_fasilitas_webinar'] = $this->m_webinar->tampil_dt_fasilitas_webinar($ID_WEBINAR, 'detail_fasilitas_webinar')->result();
        $this->load->view("admin/webinar/pratinjau/headerwebinar", $data);
        $this->load->view('admin/webinar/detail_webinar', $data);
        $this->load->view("admin/webinar/pratinjau/footer", $data);
    }
}
