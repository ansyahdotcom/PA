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
}