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

        /** Ambil data webinar */
        $data['webinar'] = $this->m_webinar->tampil_webinar()->result();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/webinar/v_webinar", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    //hapus webinar
    public function hapus()
    {
        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $where = array(
            'ID_WEBINAR' => $ID_WEBINAR
        );
        $this->m_webinar->delete($where, 'webinar');
        $this->session->set_flashdata('message', 'hapus');
        redirect('admin/webinar');
    }

    public function edit($ID_WEBINAR)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Edit Webinar";
        $where = array('ID_WEBINAR' => $ID_WEBINAR);

        $data['webinar'] = $this->m_webinar->tampil_edit($where, 'webinar')->result();
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

        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $TEMA = htmlspecialchars($this->input->post('TEMA'));
        $PEMATERI = htmlspecialchars($this->input->post('PEMATERI'));
        // $FOTO_POST = htmlspecialchars($this->input->post('FOTO_POST'));
        $HARGA = htmlspecialchars($this->input->post('HARGA'));
        $PLATFORM = htmlspecialchars($this->input->post('PLATFORM'));
        $TGL_WEB = date('Y-m-d', strtotime($this->input->post('TGL_WEB')));
        $TGL_POSTWEB = date('Y-m-d');

        $where = array('ID_WEBINAR' => $ID_WEBINAR);

        $data = array(
            'TEMA' => $TEMA,
            'PEMATERI' => $PEMATERI,
            // 'FOTO_POST' => $FOTO_POST,
            'HARGA' => $HARGA,
            'PLATFORM' => $PLATFORM,
            'TGL_WEB' => $TGL_WEB,
            'TGL_POSTWEB' => $TGL_POSTWEB
        );

        $this->m_webinar->update($where, $data, 'webinar');
        $this->session->set_flashdata('message', 'edit');
        redirect('admin/webinar');
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

    // pratinjau / lihat post / lihat postingan webinar
    public function pratinjau($ID_WEBINAR)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = "Detail Webinar";
        $data['data'] = $this->m_medsos->get_data();
        $data['webinar'] = $this->m_webinar->tampil_dt_webinar($ID_WEBINAR, 'webinar')->result();
        $this->load->view("admin/webinar/pratinjau/headerwebinar", $data);
        $this->load->view('admin/webinar/detail_webinar', $data);
        $this->load->view("admin/webinar/pratinjau/footer", $data);
    }
}
