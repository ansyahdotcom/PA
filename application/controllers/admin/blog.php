<?php

class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_blog');
        $this->load->model('admin/m_medsos');
        $this->load->library('upload');
        adm_logged_in();
        cekadm();
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Data Blog";

        /** Ambil data blog */
        $data['blog'] = $this->m_blog->tampil_blog()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_blog", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    // buat id kategori
    public function buat_id_ct()
    {
        $ID_K = $this->m_blog->selectMaxID_CT();
        if ($ID_K == NULL) {
            $kode = 'CT0001';
        } else {
            $noK = substr($ID_K, 2, 4);
            $IDK = $noK + 1;
            $kode = 'CT' . sprintf("%04s", $IDK);
        }
        return $kode;
    }
    // buat id tags
    public function buat_id_tags()
    {
        $ID_T = $this->m_blog->selectMaxID_TAGS();
        if ($ID_T == NULL) {
            $kode = 'TG0001';
        } else {
            $noT = substr($ID_T, 2, 4);
            $IDT = $noT + 1;
            $kode = 'TG' . sprintf("%04s", $IDT);
        }
        return $kode;
    }

    public function tulis_blog()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Tulis Artikel";

        $ID_CT = $this->buat_id_ct();
        $data['ID_CT'] = $ID_CT;
        $ID_TAGS = $this->buat_id_tags();
        $data['ID_TAGS'] = $ID_TAGS;

        // nyari id_adm yg login
        $email = $this->session->userdata('email');
        $query = $this->db->query("SELECT ID_ADM FROM admin WHERE EMAIL_ADM = '$email'");
        foreach ($query->result() as $que) {
            $ID_ADM = $que->ID_ADM;
        }
        $data['ID_ADM'] = $ID_ADM;

        // buat id blog
        $ID_P = $this->m_blog->selectMaxID_POST();
        if ($ID_P == NULL) {
            $data['ID_POST'] = 'PS00001';
        } else {
            $noP = substr($ID_P, 2, 5);
            $IDP = $noP + 1;
            $data['ID_POST'] = 'PS' . sprintf("%05s", $IDP);
        }

        $data['category'] = $this->m_blog->tampil_kategori()->result();
        $data['tags'] = $this->m_blog->tampil_tags()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_tulis_blog", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    //tambah kategori di tulis blog
    public function pr_tmbh_kategori()
    {
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $NM_CT = htmlspecialchars($this->input->post('NM_CT'));
        $this->m_blog->tmbh_kategori($ID_CT, $NM_CT);
        redirect('admin/blog/tulis_blog');
    }

    //tambah tags di tulis blog
    public function pr_tmbh_tags()
    {
        $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
        $NM_TAGS = htmlspecialchars($this->input->post('NM_TAGS'));
        $this->m_blog->tmbh_tags($ID_TAGS, $NM_TAGS);
        redirect('admin/blog/tulis_blog');
    }

    // proses tambah artikel
    public function pr_tmbh_blog()
    {
        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
        $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
        $JUDUL_POST = htmlspecialchars($this->input->post('JUDUL_POST'));
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $ID_TAGS = $this->input->post('ID_TAGS');
        $FOTO_POST = htmlspecialchars($this->input->post('FOTO_POST'));
        $KONTEN_POST = htmlspecialchars($this->input->post('KONTEN_POST'));
        $TGL_POST = date('Y-m-d');
        $UPDT_TRAKHIR = date('Y-m-d');

        // untuk upload proposal
        $config['upload_path']          = './assets/fotoblog/';
        $config['allowed_types']        = 'jpg|jpeg|JPG';
        $config['max_size']             = 0;
        // $config['encrypt_name']         = true;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($this->upload->do_upload('FOTO_POST')) {
            $upload_data = $this->upload->data();
            //Compress Image buat foto web
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/fotoblog/' . $upload_data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $config['width'] = 160;
            $config['height'] = 130;
            $config['new_image'] = './assets/fotoblog/fotoweb/' . $upload_data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data = array(
                'ID_POST' => $ID_POST,
                'ID_ADM' => $ID_ADM,
                'JUDUL_POST' => $JUDUL_POST,
                'ID_CT' => $ID_CT,
                'FOTO_POST' => $upload_data['file_name'],
                'KONTEN_POST' => $KONTEN_POST,
                'TGL_POST' => $TGL_POST,
                'UPDT_TRAKHIR' => $UPDT_TRAKHIR
            );
            
            $this->m_blog->tmbh_blog($data, 'post');
            for ($i=0; $i < count($ID_TAGS); $i++){
                $dt_tags = array(
                'ID_POST' => $ID_POST,
                'ID_TAGS' => $ID_TAGS[$i]
            );
            $this->m_blog->tmbh_dt_tags($dt_tags, 'detail_tags');
            }
            

            $this->session->set_flashdata('message', 'blSuccess');
            redirect('admin/blog');
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/blog', $error);
        }
    }

    // proses posting artikel
    public function pr_posting()
    {
        $ST_POST = htmlspecialchars($this->input->post('ST_POST'));
        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));

        if ($ST_POST == 0) {
            $ST_POST++;
            $this->m_blog->posting($ST_POST, $ID_POST);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
															Artikel berhasil dipublikasikan!
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>');
            redirect('admin/blog');
        } else {
            $ST_POST--;
            $this->m_blog->posting($ST_POST, $ID_POST);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
															Artikel dikembalikan ke draf!
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>');
            redirect('admin/blog');
        }
    }

    public function hapus_artikel()
    {
        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
        $this->m_blog->hapus_artikel_dttags($ID_POST);
        $this->m_blog->hapus_artikel_post($ID_POST);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
                                                    Data telah dihapus!
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        redirect('admin/blog');
    }

    public function edit_artikel($ID_POST)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Edit Artikel";
        $where = array('ID_POST' => $ID_POST);

        $ID_CT = $this->buat_id_ct();
        $data['ID_CT'] = $ID_CT;
        $ID_TAGS = $this->buat_id_tags();
        $data['ID_TAGS'] = $ID_TAGS;

        $data['post'] = $this->m_blog->edit_artikel($where, 'post')->result();
        $data['category'] = $this->m_blog->tampil_kategori()->result();
        $data['tags'] = $this->m_blog->tampil_tags()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_edit_artikel", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    //tambah kategori di edit artikel
    // public function pr_tmbh_kategori2()
    // {
    //     $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
    //     $NM_CT = htmlspecialchars($this->input->post('NM_CT'));
    //     $this->m_blog->tmbh_kategori($ID_CT, $NM_CT);
    //     redirect('admin/blog/edit_artikel');
    // }

    //tambah tags di edit artikel
    // public function pr_buat_tags2()
    // {
    //     $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
    //     $NM_TAGS = htmlspecialchars($this->input->post('NM_TAGS'));
    //     $this->m_blog->buat_tags($ID_TAGS, $NM_TAGS);
    //     redirect('admin/blog/edit_artikel');
    // }

    public function update_artikel()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
        $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
        $JUDUL_POST = htmlspecialchars($this->input->post('JUDUL_POST'));
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
        $FOTO_POST = htmlspecialchars($this->input->post('FOTO_POST'));
        $KONTEN_POST = htmlspecialchars($this->input->post('KONTEN_POST'));
        $TGL_POST = date('Y-m-d');
        $UPDT_TRAKHIR = date('Y-m-d');

        $data = array(
            'JUDUL_POST' => $JUDUL_POST,
            'ID_ADM' => $ID_ADM,
            'ID_CT' => $ID_CT,
            'FOTO_POST' => $FOTO_POST,
            'KONTEN_POST' => $KONTEN_POST,
            'TGL_POST' => $TGL_POST,
            'UPDT_TRAKHIR' => $UPDT_TRAKHIR
        );

        $dt_tags = array(
            'ID_POST' => $ID_POST,
            'ID_TAGS' => $ID_TAGS
        );

        $where = array('ID_POST' => $ID_POST);

        $this->m_blog->update_artikel($where, $data, 'post');
        $this->m_blog->update_dt_tags($where, $dt_tags, 'detail_tags');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
															Artikel berhasil diedit!
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>');
        redirect('admin/blog');
    }

    // pratinjau / lihat post / lihat artikel
    public function pratinjau($ID_POST)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = "Detail Blog";
        $data['data'] = $this->m_medsos->get_data();
        $data['blog'] = $this->m_blog->tampil_dt_blog($ID_POST, 'post')->result();
        $data['detail_tags'] = $this->m_blog->tampil_dt_tags($ID_POST, 'detail_tags')->result();
        $data['kategori'] = $this->m_blog->tampil_kategori()->result();
        $this->load->view("landingpage/template/headerblog", $data);
        $this->load->view('landingpage/detail_blog', $data);
        $this->load->view("landingpage/template/footer", $data);
    }

    // lihat artikel yg kategori sama
    public function lihat_post_ktg($NM_CT)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['blog'] = $this->m_blog->post_ktg($NM_CT, 'post')->result();
        $this->load->view('landingpage/v_post_ktg', $data);
    }

    // lihat artikel yg tag sama
    public function lihat_post_tag($NM_TAGS)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['dt_tags'] = $this->m_blog->post_tag($NM_TAGS, 'detail_tags')->result();
        $this->load->view('landingpage/v_post_tag', $data);
    }
}
