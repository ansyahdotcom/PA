<?php

class Materi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_materi');
        adm_logged_in();
        cekadm();
    }

    public function materikelas($id)
    {
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Materi";
        $data['materi'] = $this->m_materi->get_materi();
        // $this->load->view('admin/coba/coba', $data);
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/kelas/v_listmateri", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function tambah_materi()
    {


        $ID_MT = htmlspecialchars($this->input->post('ID_MT'));
        $NM_MT = htmlspecialchars($this->input->post('NM_MT'));
        $this->m_materi->tmbh_materi($ID_MT, $NM_MT);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
        Materi berhasil dibuat!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect("admin/materi/materikelas/$ID_MT");
    }

    public function hapus()
    {
        $ID_MT = $this->input->post('ID_MT');
        $this->m_materi->hapus_materi($ID_MT);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
															Materi berhasil dihapus!
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>');
        redirect("admin/materi/materikelas/$ID_MT");
    }

    public function update_materi()
    {
        $ID_MT = htmlspecialchars($this->input->post('ID_MT'));
        $NM_MT = htmlspecialchars($this->input->post('NM_MT'));

        $data = array(
            'NM_MT' => $NM_MT
        );

        $where = array('ID_MT' => $ID_MT);

        $this->m_materi->update_materi($where, $data, 'materi');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
															Materi berhasil diedit!
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>');
        redirect("admin/materi/materikelas/$ID_MT");
    }
}