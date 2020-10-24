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
			redirect('admin/auth');
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

	/**Fungsi Login */
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

	/**Konfigurasi kirim email */
	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_hodt' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'turtleninjaaa77@gmail.com',
			'smtp_pass' => '@12Turtleninja',
			'smtp_port' => 587,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		$this->load->library('email', $config);

		$email = htmlspecialchars($this->input->post('email'));
		$name['user'] = $this->db->get_where('admin', [
			'EMAIL_ADM' => $email
		])->row_array();
		$this->email->from('turtleninjaaa77@gmail.com', 'Preneur Academy');
		$this->email->to($email);

		// $AktivasiEmail = "
		//                         <html>
		//                         <head>
		//                             <title>Kode Verifikasi</title>
		//                         </head>
		//                         <body>
		//                             <h2>Terimakasih telah Mendaftarkan akun anda</h2>
		//                             <p>Akun Anda</p>
		//                             <p>Email : " . $emailAkun . "</p>
		//                             <p>Tolong Klik Link Dibawah ini untuk aktivasi akun!</p>
		//                             <h4><a href='" . base_url() . "auth/verify?email=" . $emailAkun . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
		//                         </body>
		//                         </html>
		// ";

		/**Pesan email jika ubah password */
		$UbahPassword = "
			<html>
			<head>
				<title>Kode Ubah Password</title>
			</head>
			<body>
				<h2>Yang terhormat saudara " . $name['user']['NM_ADM'] . "</h2>
				<p>Anda ingin mengubah password akun anda</p>
				<p>Email anda : " . $email . "</p>
				<p>Klik link di bawah ini untuk mengubah password anda!</p>
				<h4><a href='" . base_url() . "admin/auth/ubahpassword?email=" . $email . "&token=" . urlencode($token) . "'>Ubah Password!!</a></h4>
			</body>
			</html>
        ";

		if ($type == 'forgot') {
			$this->email->subject('Ubah Password');
			$this->email->message($UbahPassword);
			$this->email->set_mailtype('html');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	/**Fungsi untuk meminta link form ubah password yang dikirim lewat email */
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
		} else {
			$email = $this->input->post('email', true);
			$user = $this->db->get_where('admin', [
				'EMAIL_ADM' => $email,
				'ACTIVE' => 1
			])->row_array();

			if ($user) {

				$token = base64_encode(random_bytes(32));
				$user_token = [
					'EMAIL' => $email,
					'TOKEN' => $token,
					'DATE' => time()
				];
				$this->db->insert('token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p><i class="icon fas fa-check"></i> Silahkan cek email anda </br>untuk ubah password!</p></div>');
				redirect('admin/auth/forgotpsw');
			} else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p><i class="icon fas fa-ban"></i> Email belum terdaftar/aktif!</p></div>');
				redirect('admin/auth/forgotpsw');
			}
		}
	}

	/**Fungsi untuk menangkap email dan token yang dikirim lewat url */
	public function ubahpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('admin', [
			'EMAIL_ADM' => $email
		])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('token', [
				'TOKEN' => $token
			])->row_array();

			if ($user_token) {
				if (time() - $user_token['DATE'] < (60 * 60 * 48)) {

					$this->session->set_userdata('reset_email', $email);
					$this->recoverpsw();

					$this->db->delete('TOKEN', [
						'EMAIL' => $email
					]);
				} else {

					$this->db->delete('TOKEN', [
						'EMAIL' => $email
					]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p><i class="icon fas fa-ban"></i> Token sudah kadaluarsa!</p></div>');
					redirect('admin/auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p><i class="icon fas fa-ban"></i> Reset password gagal! token salah</p></div>');
				redirect('admin/auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p><i class="icon fas fa-ban"></i> Reset password gagal! email salah</p></div>');
			redirect('admin/auth');
		}
	}

	/**Fungsi untuk mengubah password */
	public function recoverpsw()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('admin/auth');
		}

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[newpassword]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => ''
		]);

		$this->form_validation->set_rules('newpassword', 'Newpassword', 'trim|required|min_length[8]|matches[password]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Password minimal berjumlah 8 karakter',
			'matches' => 'Konfirmasi password salah'
		]);

		if ($this->form_validation->run() == false) {
			$data['tittle'] = 'Password Baru';
			$this->load->view("admin/template_adm/header", $data);
			$this->load->view("admin/auth/recover-password");
			$this->load->view("admin/template_adm/footer");
		} else {
			$password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('PSW_ADM', $password);
			$this->db->where('EMAIL_ADM', $email);
			$this->db->update('admin');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p><i class="icon fas fa-check"></i> Password berhasil diubah! Silahkan login kembali</p></div>');
			redirect('admin/auth');
		}
	}

	/**Fungsi Log out */
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
