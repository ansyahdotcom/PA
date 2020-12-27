<?php
header('Access-Control-Allow-Origin: *');
header('*Access-Control-Allow-Method: GET, OPTIONS*');

class Webinar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('peserta/m_webinar');
		$params = array('server_key' => 'SB-Mid-server-tNBThkCAIbSjBODU1WuDkHfU', 'production' => false);
		$this->load->library('midtrans');
        $this->load->library('upload');
		$this->midtrans->config($params);
		psrt_logged_in();
		cekpsrt();
    }

    public function index()
	{
		$email = $this->session->userdata('email');
		$data['peserta'] = $this->db->get_where('peserta', [
			'EMAIL_PS' => $email
		])->row_array();

        $data['tittle'] = "Daftar Webinar";
        $data['webinar'] = $this->m_webinar->tampil_webinar()->result();
        $this->load->view("peserta/template/v_header", $data);
		$this->load->view("peserta/template/v_navbar", $data);
		$this->load->view("peserta/template/v_sidebar", $data);
		$this->load->view("peserta/webinar/v_webinar", $data);
		$this->load->view("peserta/template/v_footer");
	}
	
	public function daftar($JUDUL_WEBINAR)
	{
		$email = $this->session->userdata('email');
		$data['peserta'] = $this->db->get_where('peserta', [
			'EMAIL_PS' => $email
		])->row_array();
	
		$data['tittle'] = "Form Daftar Webinar";
		$data['webinar'] = $this->m_webinar->tampil_daftar_wbnr($JUDUL_WEBINAR)->result();
		$this->load->view("peserta/template/v_header", $data);
		$this->load->view("peserta/template/v_navbar", $data);
		$this->load->view("peserta/template/v_sidebar", $data);
		$this->load->view("peserta/webinar/v_daftar_wbnr", $data);
		$this->load->view("peserta/template/v_footer");
	}
    
	public function daftar_webinar()
    {
        $email = $this->session->userdata('email');
		$data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
            ])->row_array();
        // $data['tittle'] = "Form Daftar Webinar";

        $ID_WEBINAR = htmlspecialchars($this->input->post('ID_WEBINAR'));
        $ID_PS = htmlspecialchars($this->input->post('ID_PS'));
        $FTO_PS = htmlspecialchars($this->input->post('FTO_PS'));
        $HAPUS_FOTO = $this->input->post('HAPUS_FOTO');
        $NM_PS = htmlspecialchars($this->input->post('NM_PS'));
        $HP_PS = htmlspecialchars($this->input->post('HP_PS'));
        $ALMT_PS = $this->input->post('ALMT_PS');
        $JK_PS = htmlspecialchars($this->input->post('JK_PS'));
        $PEKERJAAN = $this->input->post('PEKERJAAN');
        $AGAMA_PS = htmlspecialchars($this->input->post('AGAMA_PS'));
        $ALASAN = htmlspecialchars($this->input->post('ALASAN'));
        $DATE_PS_WBNR = date("h:i:s");
        // untuk upload foto webinar
        $config['upload_path']          = './assets/dist/img/peserta/';
        $config['allowed_types']        = 'jpg|jpeg|JPG';
        $config['max_size']             = 0;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ($FTO_PS != $HAPUS_FOTO){
            if ($this->upload->do_upload('FTO_PS')) {
                $upload_data = $this->upload->data();
                unlink(FCPATH. './assets/dist/img/peserta/'. $HAPUS_FOTO);
                $config['image_library'] = 'gd2';
                $config['quality'] = '100%';
                $config['width'] = 1000;
                $config['height'] = 1000;
                $config['source_image'] = './assets/dist/img/peserta/' . $upload_data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $where = array('ID_PS' => $ID_PS);
        
                $data = array(
                    'NM_PS' => $NM_PS,
                    'HP_PS' => $HP_PS,
                    'ALMT_PS' => $ALMT_PS,
                    'FTO_PS' => $upload_data['file_name'],
                    'JK_PS' => $JK_PS,
                    'PEKERJAAN' => $PEKERJAAN,
                    'AGAMA_PS' => $AGAMA_PS
                );
                $data2 = array(
                    'ID_WEBINAR' => $ID_WEBINAR,
                    'ID_PS' => $ID_PS,
                    'ALASAN' => $ALASAN,
                    'DATE_PS_WBNR' => $DATE_PS_WBNR
                );
        
                $this->m_webinar->update($where, $data, 'peserta');
                $this->m_webinar->insert($data2, 'peserta_wbnr');
        
                $this->session->set_flashdata('message', 'berhasil_daftar');
                redirect('peserta/webinar');
            } 
            else {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('peserta/webinar/v_webinar', $error);
            }
        } else {
            $where = array('ID_PS' => $ID_PS);
        
                $data = array(
                    'NM_PS' => $NM_PS,
                    'HP_PS' => $HP_PS,
                    'ALMT_PS' => $ALMT_PS,
                    // 'FTO_PS' => $upload_data['file_name'],
                    'JK_PS' => $JK_PS,
                    'PEKERJAAN' => $PEKERJAAN,
                    'AGAMA_PS' => $AGAMA_PS
                );

                $data2 = array(
                    'ID_WEBINAR' => $ID_WEBINAR,
                    'ID_PS' => $ID_PS,
                    'ALASAN' => $ALASAN,
                    'DATE_PS_WBNR' => $DATE_PS_WBNR
                );
        
                $this->m_webinar->update($where, $data, 'peserta');
                $this->m_webinar->insert($data2, 'peserta_wbnr');
        
                // $this->session->set_flashdata('message', 'edit');
                redirect('peserta/webinar');
        }
    }

    public function mywebinar()
    {
        $email = $this->session->userdata('email');
		$data['peserta'] = $this->db->get_where('peserta', [
            'EMAIL_PS' => $email
            ])->row_array();
        $data['tittle'] = "Webinar Saya";

        $data['pesertaa'] = $this->m_webinar->mywebinar($email)->result();
        
        $this->load->view("peserta/template/v_header", $data);
		$this->load->view("peserta/template/v_navbar", $data);
		$this->load->view("peserta/template/v_sidebar", $data);
        $this->load->view('peserta/webinar/v_mywebinar', $data);
		$this->load->view("peserta/template/v_footer");
    }
}