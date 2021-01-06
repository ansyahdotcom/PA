<?php

class Materi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/m_materi');
        $this->load->library('PrimsLib');
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
        $data['materi'] = $this->m_materi->get_materi($id);
        $data['sub'] = $this->m_materi->get_sub();
        $data['data'] = $this->m_materi->get_data();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/kelas/v_listmateri", $data);
        $this->load->view("admin/template_adm/v_footer");
    }

    public function upload_file() 
    {
        // print_r($_FILES); die;
        $ID_MT = htmlspecialchars($this->input->post('ID_MT'));
        $DETAIL_MT = htmlspecialchars($this->input->post('DETAIL_MT'));
        $FILE_MT = null;
    // menjalankan perintah untuk mengupload gambar
        if ($_FILES['FILE_MT']['name'] != null) {
        $FILE_MT = $_FILES['FILE_MT']['name'];
        $FILE_MT = $this->primslib->upload_file('FILE_MT', $FILE_MT, 'pdf|doc', '3024');
        }

        $data = array(
            'DETAIL_MT' => $DETAIL_MT,
            'FILE_MT' => $FILE_MT
            


        );
        $where = array(
            'ID_MT' => $ID_MT,
            
        );

        
        $this->m_materi->update_materi($where, $data, 'materi');
        $this->session->set_flashdata('message', 'socialSuccess');


        redirect("admin/materi/materikelas/$ID_MT");
    }

    //CREATE
	function create(){
        $id = $this->input->post('id_kelas', TRUE);
		$materi = $this->input->post('nama',TRUE);
		$detail = $this->input->post('detail',TRUE);
		$id_kelas = $id;
        $this->m_materi->create_($materi,$detail,$id_kelas);
        $this->session->set_flashdata('message', 'dataSuccess');
		redirect("admin/materi/materikelas/$id");
	}
    
	//UPDATE
	function update(){
        $id = $this->input->post('id_kelas',TRUE);
        $id_mt = $this->input->post('id_edit',TRUE);
        $nama = $this->input->post('nama',TRUE);
        $detail = $this->input->post('detail',TRUE);
        $data = array(
            'NM_MT' => $nama,
            'DETAIL_MT' => $detail
        );
        $where = array(
            'ID_MT' => $id_mt
        );
		$this->m_materi->update_($where, $data, 'materi');
        $this->session->set_flashdata('message', 'dataUpdate');
		redirect("admin/materi/materikelas/$id");
	}

	// DELETE
	function delete(){
        $id = $this->input->post('id_kelas',TRUE);
        $id_mt = $this->input->post('delete_id',TRUE);
        $where = array(
            'ID_MT' => $id_mt
        );
		$this->m_materi->delete_($where, 'materi');
		$this->session->set_flashdata('message', 'dataDelete');
		redirect("admin/materi/materikelas/$id");
	}
}