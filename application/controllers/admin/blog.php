<?php 

Class Blog extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_blog');
        $this->load->helper('url');
        
    }

    public function index(){
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

    public function tulis_blog(){
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        // buat id kategori
        $ID = $this->m_blog->selectMaxID_CT();
        if ($ID == NULL) {
            $data['ID_CT'] = 'CT0001';
        } else {
            $nourut = substr($ID, 2, 4);
            $ID_NOW = $nourut + 1;
            $data['ID_CT'] = 'CT'.sprintf("%04s", $ID_NOW);
        }

        $data['category'] = $this->m_blog->tampil_kategori()->result();
        $data['tags'] = $this->m_blog->tampil_tags()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/blog/v_tulis_blog", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function pr_tmbh_kategori(){
        $ID_CT = htmlspecialchars($this->input->post('ID_CT'));
        $NM_CT = htmlspecialchars($this->input->post('NM_CT'));
        $this->m_blog->tmbh_kategori($ID_CT, $NM_CT);
        redirect('admin/blog/tulis_blog');
    }
}
?>