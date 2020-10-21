<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	/** Menampilkan Form Login */
	public function index()
	{
		if ($this->session->userdata('email')) {
			redirect('admin/dashboard');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom ini harus di isi',
			'valid_email' => 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Kolom ini harus di isi',
		]);

		if ($this->form_validation->run() == false) {
			$data['tittle'] = 'Log in';
			$this->load->view("admin/template_adm/header", $data);
			$this->load->view("admin/auth/login");
			$this->load->view("admin/template_adm/footer");
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = htmlspecialchars(($this->input->post('email')));
		$password = htmlspecialchars(($this->input->post('password')));
		$user = $this->db->get_where('admin', ['EMAIL_ADM' => $email])->row_array();

		if ($user) {
			if ($user['ACTIVE'] == 1) {
				if (password_verify($password, $user['PSW_ADM'])) {
					$data = [
						'email' => $user['EMAIL_ADM'],
						'name' => $user['NM_ADM'],
						'role' => $user['ID_ROLE']
					];
					$this->session->set_userdata($data);
					if ($user['ID_ROLE'] == 1) {
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="icon fas fa-check"></i> Anda berhasil login!</h5></div>');
						redirect('admin/dashboard');
					} 
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-ban"></i> Email/Password salah!</h5></div>');
					redirect('admin/auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> Email belum diaktivasi!</h5></div>');
				redirect('admin/auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-ban"></i> Email belum terdaftar!</h5></div>');
			redirect('admin/auth');
		}
	}

	public function forgotpsw()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom ini harus diisi',
			'valid_email' => 'Email tidak valid'
		]);

		if ($this->form_validation->run() == false) {
			$data['tittle'] = 'Lupa Password';
			$this->load->view("admin/template_adm/header", $data);
			$this->load->view("admin/auth/forgot-password");
			$this->load->view("admin/template_adm/footer");
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-exclamation-triangle"></i> Anda telah keluar!</h5></div>');
		redirect('admin/auth');
	}
}
