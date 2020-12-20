<?php
class Webinar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_webinar');
        $this->load->model('admin/m_medsos');
        $this->load->library('upload');
        $this->load->helper('file');
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
        $ID_F = $this->m_webinar->selectMaxID_FA();
        if ($ID_F == NULL) {
            $kode = 'FA0001';
        } else {
            $noT = substr($ID_F, 2, 4);
            $IDF = $noT + 1;
            $kode = 'FA' . sprintf("%04s", $IDF);
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

        // buat id webinar
        $ID_W = $this->m_webinar->selectMaxID_WEBINAR();
        if ($ID_W == NULL) {
            $data['ID_WEBINAR'] = 'WB00001';
        } else {
            $noP = substr($ID_W, 2, 5);
            $IDW = $noP + 1;
            $data['ID_WEBINAR'] = 'WB' . sprintf("%05s", $IDW);
        }

        // form validation
        $this->form_validation->set_rules('JUDUL_WEBINAR', 'Judul', 'required|trim', [
            'required' => 'Kolom judul harus diisi!'
        ]);
        $this->form_validation->set_rules('HARGA', 'Harga', 'required|trim', [
            'required' => 'Kolom harga harus diisi!'
        ]);
        $this->form_validation->set_rules('PLATFORM', 'Platform', 'required|trim', [
            'required' => 'Kolom platform harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['fasilitas'] = $this->m_webinar->tampil_fasilitas()->result();
            $this->load->view("admin/template_adm/v_header", $data);
            $this->load->view("admin/template_adm/v_navbar", $data);
            $this->load->view("admin/template_adm/v_sidebar", $data);
            $this->load->view("admin/webinar/v_tambah_webinar", $data);
            $this->load->view("admin/template_adm/v_footer");
        } else {
            $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
            $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
            $JUDUL_WEBINAR = htmlspecialchars($this->input->post('JUDUL_WEBINAR'));
            $KONTEN_WEB = htmlspecialchars($this->input->post('KONTEN_WEB'));
            $ID_FA = $this->input->post('ID_FA');
            $FOTO_WEBINAR = htmlspecialchars($this->input->post('FOTO_WEBINAR'));
            $HARGA = htmlspecialchars($this->input->post('HARGA'));
            $PLATFORM = htmlspecialchars($this->input->post('PLATFORM'));
            $TGL_WEB = htmlspecialchars($this->input->post('TGL_WEB'));
            $TGL_POSTWEB = date('Y-m-d');
            // untuk upload foto web
            $config['upload_path']          = './assets/fotowebinar/';
            $config['allowed_types']        = 'jpg|jpeg|JPG';
            $config['max_size']             = 0;
            // $config['encrypt_name']         = true;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('FOTO_WEBINAR')) {
                $upload_data = $this->upload->data();
                //Compress Image buat foto web
                $config['image_library'] = 'gd2';
                $config['quality'] = '110%';
                $config['width'] = 500;
                $config['height'] = 500;
                $config['source_image'] = './assets/fotowebinar/' . $upload_data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data = array(
                    'ID_WEBINAR' => $ID_WEBINAR,
                    'ID_ADM' => $ID_ADM,
                    'JUDUL_WEBINAR' => str_replace(' ', '-', $JUDUL_WEBINAR),
                    'KONTEN_WEB' => $KONTEN_WEB,
                    'FOTO_WEBINAR' => $upload_data['file_name'],
                    'HARGA' => $HARGA,
                    'PLATFORM' => $PLATFORM,
                    'TGL_WEB' => $TGL_WEB,
                    'TGL_POSTWEB' => $TGL_POSTWEB
                );

                $this->m_webinar->insert($data, 'webinar');

                for ($i = 0; $i < count($ID_FA); $i++) {
                    $dt_fasilitas = array(
                        'ID_WEBINAR' => $ID_WEBINAR,
                        'ID_FA' => $ID_FA[$i]
                    );
                    $this->m_webinar->insert($dt_fasilitas, 'detail_fasilitas');
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
        $this->m_webinar->insert($data, 'fasilitas');
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
        $query = $this->db->query("SELECT FOTO_WEBINAR FROM webinar WHERE ID_WEBINAR = '$ID_WEBINAR'");
        foreach ($query->result() as $row){
            $FOTO = $row->FOTO_WEBINAR;
        }
        unlink(FCPATH. 'assets/fotowebinar/'. $FOTO);
        $this->m_webinar->delete($where, 'detail_fasilitas');
        $this->m_webinar->delete($where, 'webinar');
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/webinar');
    }

    public function edit($JUDUL_WEBINAR)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Edit Webinar";
        date_default_timezone_set('Asia/Jakarta');
        $where = array('JUDUL_WEBINAR' => $JUDUL_WEBINAR);

        $data['webinar'] = $this->m_webinar->tampil_edit($where, 'webinar')->result();
        $data['dt_fasilitas'] = $this->m_webinar->tampil_edit_fasilitas($JUDUL_WEBINAR, 'detail_fasilitas')->result();
        $data['fasilitas'] = $this->m_webinar->tampil_fasilitas()->result();
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
        $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
        $JUDUL_WEBINAR = htmlspecialchars($this->input->post('JUDUL_WEBINAR'));
        $KONTEN_WEB = htmlspecialchars($this->input->post('KONTEN_WEB'));
        $FOTO_WEBINAR = htmlspecialchars($this->input->post('FOTO_WEBINAR'));
        $HARGA = htmlspecialchars($this->input->post('HARGA'));
        $PLATFORM = htmlspecialchars($this->input->post('PLATFORM'));
        $TGL_WEB = htmlspecialchars($this->input->post('TGL_WEB'));
        $TGL_POSTWEB = date('Y-m-d');
        $ID_FA = $this->input->post('ID_FA');

        $where = array('ID_WEBINAR' => $ID_WEBINAR);

        $data = array(
            'JUDUL_WEBINAR' => str_replace(' ', '-', $JUDUL_WEBINAR),
            'ID_ADM' => $ID_ADM,
            'KONTEN_WEB' => $KONTEN_WEB,
            'FOTO_WEBINAR' => $FOTO_WEBINAR,
            'HARGA' => $HARGA,
            'PLATFORM' => $PLATFORM,
            'TGL_WEB' => $TGL_WEB,
            'TGL_POSTWEB' => $TGL_POSTWEB
        );

        $this->m_webinar->update($where, $data, 'webinar');
        $this->m_webinar->delete($where, 'detail_fasilitas');

        for ($i = 0; $i < count($ID_FA); $i++) {
            $dt_fasilitas = array(
                'ID_WEBINAR' => $ID_WEBINAR,
                'ID_FA' => $ID_FA[$i]
            );
            $this->m_webinar->insert($dt_fasilitas, 'detail_fasilitas');
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
        $data['dt_fasilitas'] = $this->m_webinar->tampil_dt_fasilitas($ID_WEBINAR, 'detail_fasilitas')->result();
        $this->load->view("admin/webinar/pratinjau/headerwebinar", $data);
        $this->load->view('admin/webinar/detail_webinar', $data);
        $this->load->view("admin/webinar/pratinjau/footer", $data);
    }
}
