<?php

class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_blog');
        $this->load->helper('form', 'url');
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['blog'] = $this->m_blog->tampil_blog()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_blog", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function tulis_blog()
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

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

        // buat id kategori
        $ID_K = $this->m_blog->selectMaxID_CT();
        if ($ID_K == NULL) {
            $data['ID_CT'] = 'CT0001';
        } else {
            $noK = substr($ID_K, 2, 4);
            $IDK = $noK + 1;
            $data['ID_CT'] = 'CT' . sprintf("%04s", $IDK);
        }

        // buat id tags
        $ID_T = $this->m_blog->selectMaxID_TAGS();
        if ($ID_T == NULL) {
            $data['ID_TAGS'] = 'TG0001';
        } else {
            $noT = substr($ID_T, 2, 4);
            $IDT = $noT + 1;
            $data['ID_TAGS'] = 'TG' . sprintf("%04s", $IDT);
        }

        $data['category'] = $this->m_blog->tampil_kategori()->result();
        $data['tags'] = $this->m_blog->tampil_tags()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_tulis_blog", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function pr_tmbh_kategori()
    {
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $NM_CT = htmlspecialchars($this->input->post('NM_CT'));
        $this->m_blog->tmbh_kategori($ID_CT, $NM_CT);
        redirect('admin/blog/tulis_blog');
    }

    public function pr_buat_tags()
    {
        $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
        $NM_TAGS = htmlspecialchars($this->input->post('NM_TAGS'));
        $this->m_blog->buat_tags($ID_TAGS, $NM_TAGS);
        redirect('admin/blog/tulis_blog');
    }


    public function pr_tmbh_blog()
    {
        $ID_POST = htmlspecialchars($this->input->post('ID_POST'));
        $ID_ADM = htmlspecialchars($this->input->post('ID_ADM'));
        $JUDUL_POST = htmlspecialchars($this->input->post('JUDUL_POST'));
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $ID_TAGS = htmlspecialchars($this->input->post('ID_TAGS'));
        $FOTO_POST = htmlspecialchars($this->input->post('ID_TAGS'));
        $KONTEN_POST = htmlspecialchars($this->input->post('KONTEN_POST'));

        $data = array(
            'ID_POST' => $ID_POST,
            'ID_ADM' => $ID_ADM,
            'JUDUL_POST' => $JUDUL_POST,
            'ID_CT' => $ID_CT,
            'FOTO_POST' => $FOTO_POST,
            'KONTEN_POST' => $KONTEN_POST
        );

        $dt_tags = array(
            'ID_POST' => $ID_POST,
            'ID_TAGS' => $ID_TAGS
        );

        $this->m_blog->tmbh_blog($data, 'post');
        $this->m_blog->tmbh_dt_tags($dt_tags, 'detail_tags');
        redirect('admin/blog');
    }

    public function hapus_artikel($ID_POST)
    {
        $where = array('ID_POST' => $ID_POST);
        $this->m_blog->hapus_artikel_dttags($where, 'detail_tags');
        $this->m_blog->hapus_artikel_post($where, 'post');
        $this->session->set_userdata('hapus_sukses', 'ubah');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
															Data berhasil dihapus!
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>');
        redirect('admin/blog');
    }

    public function edit()
    {
    }
}
