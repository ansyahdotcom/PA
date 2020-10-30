<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('peserta/m_auth');
	}

	/** Menampilkan Form beranda */
	public function index()
	{
		// if (!$this->session->userdata('email')) {
		// 	redirect('peserta/auth');
		// }
		$data['judul'] = 'Preneur Academy | Beranda';
		$this->load->view("landingpage/template/header", $data);
		$this->load->view("landingpage/index");
		$this->load->view("landingpage/template/footer");
	}

	/** Menampilkan Login */
	public function login()
	{
		// if ($this->session->userdata('email')) {
		// 	redirect('peserta/auth');
		// }
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom ini harus di isi',
			'valid_email' => 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Kolom ini harus di isi',
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Preneur Academy | Masuk';
			$this->load->view("landingpage/template/header", $data);
			$this->load->view("landingpage/auth/login");
			$this->load->view("landingpage/template/footer");
		} else {
			$this->_login();
		}
	}

	/**Fungsi Login */
	private function _login()
	{
		$email = htmlspecialchars(($this->input->post('email')));
		$password = htmlspecialchars(($this->input->post('password')));
		$user = $this->m_auth->emailverif($email);

		if ($user) {
			if ($user['ACTIVE'] == 1) {
				if (password_verify($password, $user['PSW_PS'])) {
					$data = [
						'email' => $user['EMAIL_PS'],
						'name' => $user['NM_PS'],
						'role' => $user['ID_ROLE']
					];
					$this->session->set_userdata($data);
					if ($user['ID_ROLE'] == 2) {
						$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5><i class="icon fas fa-check"></i> Anda berhasil login!</h5></div>');
						redirect('peserta/auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-ban"></i> Email/Password salah!</h5></div>');
					redirect('peserta/auth/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> Email belum diaktivasi!</h5></div>');
				redirect('peserta/auth/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<h5><i class="icon fas fa-ban"></i> Email belum terdaftar!</h5></div>');
			redirect('peserta/auth/login');
		}
	}

	/** Menampilkan Register */
	public function register()
	{
		// if ($this->session->userdata('email')) {
		// 	redirect('peserta/auth');
		// }

		$tabel = $this->m_auth->idpsr();
		$num = $tabel + 1;

		if ($tabel >= 0 && $tabel < 10) {
			$id = "PSR0000" . $num;
		} elseif ($tabel >= 10 && $tabel < 100) {
			$id = "PSR000" . $num;
		} elseif ($tabel >= 100 && $tabel < 1000) {
			$id = "PSR00" . $num;
		} elseif ($tabel >= 1000 && $tabel < 10000) {
			$id = "PSR0" . $num;
		} elseif ($tabel >= 10000 && $tabel < 100000) {
			$id = "PSR" . $num;
		}

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Kolom ini harus diisi'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[peserta.EMAIL_PS]', [
			'required' => 'Kolom ini harus diisi',
			'valid_email' => 'Email tidak valid',
			'is_unique' => 'Email ini sudah terdaftar'
		]);

		$this->form_validation->set_rules('nomorwa', 'Nomorwa', 'required|trim|min_length[11]|max_length[13]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Nomor terlalu pendek',
			'max_length' => 'Nomor terlalu panjang'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => ''
		]);

		$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[8]|matches[password]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => 'Konfirmasi password salah'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Preneur Academy | Buat akun';
			$this->load->view("landingpage/template/header", $data);
			$this->load->view("landingpage/auth/register");
			$this->load->view("landingpage/template/footer");
		} else {
			/** Proses insert ke database */
			$name = htmlspecialchars($this->input->post('nama', true));
			$email = htmlspecialchars($this->input->post('email', true));
			$nohp = htmlspecialchars($this->input->post('nomorwa', true));
			$password = htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT));

			/** membuat token untuk aktivasi */
			$token = base64_encode(random_bytes(32));
			$token_user = [
				'EMAIL' => $email,
				'TOKEN' => $token,
				'DATE' => time()
			];

			$register = [
				'ID_PS' => $id,
				'NM_PS' => $name,
				'HP_PS' => $nohp,
				'EMAIL_PS' => $email,
				'PSW_PS' => $password,
				'ID_ROLE' => 2,
				'ACTIVE' => 0,
				'DATE_CREATE' => time()
			];

			/** Insert ke database */
			$this->db->insert('token', $token_user);
			$this->m_auth->regpeserta($register);

			$this->_sendMail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p class="text-center"><i class="icon fas fa-check"></i><b> Buat akun baru berhasil </b></br></hr>silahkan cek email anda untuk mengaktivasi akun anda!</p></div>');
			redirect('peserta/auth/login');
		}
	}
	

	/**Konfigurasi kirim email */
	private function _sendMail($token, $type)
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
		$name['user'] = $this->db->get_where('peserta', [
			'EMAIL_PS' => $email
		])->row_array();
		$this->email->from('turtleninjaaa77@gmail.com', 'Preneur Academy');
		$this->email->to($email);

		/** Pesan jika register akun baru */
		$AktivasiEmail = "
			<html>
			<head>
				<title>Verifikasi Akun</title>
			</head>
			<body>
				<h2>Yang Terhormat Saudara " . $name['user']['NM_PS'] . "</h2>
				<h4>Terimakasih telah mendaftarkan diri anda</h4>
				<p>Akun Anda</p>
				<p>Email : " . $email . "</p>
				<p>Tolong Klik Link Dibawah ini untuk mengaktivasi akun anda !,</p>
				<p>link otomatis akan kadaluarsa dalam waktu 2 X 24 jam.</p>
				<h4><a href='" . base_url() . "peserta/auth/verify?email=" . $email . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
			</body>
			</html>
		";

		/**Pesan email jika ubah password */
		$UbahPassword = "
			<html>
			<head>
				<title>Kode Ubah Password</title>
			</head>
			<body>
				<h2>Yang terhormat saudara " . $name['user']['NM_PS'] . "</h2>
				<p>Anda ingin mengubah password akun anda</p>
				<p>Email anda : " . $email . "</p>
				<p>Klik link di bawah ini untuk mengubah password anda !,</p> 
				<p>link otomatis akan kadaluarsa dalam waktu 2 jam. </p>
				<h4><a href='" . base_url() . "peserta/auth/ubahpassword?email=" . $email . "&token=" . urlencode($token) . "'>Ubah Password!!</a></h4>
			</body>
			</html>
		";

		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun Baru');
			$this->email->message($AktivasiEmail);
			$this->email->set_mailtype('html');
		} elseif ($type == 'forgot') {
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

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->m_auth->emailverif($email);

		if ($user) {

			$user_token = $this->db->get_where('token', [
				'TOKEN' => $token
			])->row_array();

			if ($user_token) {
				if (time() - $user_token['DATE'] < (60 * 60 * 48)) {

					$this->m_auth->activ($email);

					$this->db->delete('token', [
						'EMAIL' => $email
					]);
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p class="text-center"><i class="icon fas fa-check"></i><b> Akun berhasil di aktivasi </b></br>silahkan login!</p></div>');
					redirect('peserta/auth/login');
				} else {
					$this->m_auth->del($email);

					$this->db->delete('token', [
						'EMAIL' => $email
					]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p class="text-center"><i class="icon fas fa-ban"></i><b> Token sudah kadaluarsa!</b></p></div>');
					redirect('peserta/auth/login');
				}
			} else {
				$this->m_auth->del($email);

				$this->db->delete('token', [
					'EMAIL' => $email
				]);

				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="text-center"><i class="icon fas fa-ban"></i><b> Token anda salah!</b></p></div>');
				redirect('peserta/auth/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p class="text-center"><i class="icon fas fa-ban"></i><b> Aktivasi akun gagal!</b></p></div>');
			redirect('peserta/auth/login');
		}
	}

	/**Fungsi untuk meminta link form ubah password yang dikirim lewat email */
	public function lupapsw()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom ini harus diisi',
			'valid_email' => 'Email tidak valid'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Preneur Academy | Lupa Password';
			$this->load->view("landingpage/template/header", $data);
			$this->load->view("landingpage/auth/forgot");
			$this->load->view("landingpage/template/footer");
		} else {
			$email = htmlspecialchars($this->input->post('email', true));
			$user = $this->m_auth->activacount($email);

			if ($user) {

				$token = base64_encode(random_bytes(32));
				$user_token = [
					'EMAIL' => $email,
					'TOKEN' => $token,
					'DATE' => time()
				];
				$this->db->insert('token', $user_token);
				$this->_sendMail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="text-center"><i class="icon fas fa-check"></i><b> Silahkan cek email anda untuk ubah password!</b></p></div>');
				redirect('peserta/auth/lupapsw');
			} else {

				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="text-center"><i class="icon fas fa-ban"></i><b> Email belum terdaftar/aktif!</b></p></div>');
				redirect('peserta/auth/lupapsw');
			}
		}
	}

	/**Fungsi untuk menangkap email dan token yang dikirim lewat url */
	public function ubahpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->m_auth->emailverif($email);

		if ($user) {

			$user_token = $this->db->get_where('token', [
				'TOKEN' => $token
			])->row_array();

			if ($user_token) {
				if (time() - $user_token['DATE'] < (60 * 60 * 2)) {

					$this->session->set_userdata('reset_email', $email);
					$this->recoverpsw();

					$this->db->delete('token', [
						'EMAIL' => $email
					]);
				} else {

					$this->db->delete('token', [
						'EMAIL' => $email
					]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p class="text-center"><i class="icon fas fa-ban"></i><b> Token sudah kadaluarsa!</b></p></div>');
					redirect('peserta/auth/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p class="text-center"><i class="icon fas fa-ban"></i><b> Reset password gagal!</b> token salah</p></div>');
				redirect('peserta/auth/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p class="text-center"><i class="icon fas fa-ban"></i><b> Reset password gagal!</b> email salah</p></div>');
			redirect('peserta/auth/login');
		}
	}

	/**Fungsi untuk mengubah password */
	public function recoverpsw()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('peserta/auth/login');
		}

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password1]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => ''
		]);

		$this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[8]|matches[password]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => 'Konfirmasi password salah'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Preneur Academy | Password Baru';
			$this->load->view("landingpage/template/header", $data);
			$this->load->view("landingpage/auth/recover");
			$this->load->view("landingpage/template/footer");
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->m_auth->ubahpsw($email, $password);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p class="text-center"><i class="icon fas fa-check"></i><b> Password berhasil diubah!</b> Silahkan login kembali</p></div>');
			redirect('peserta/auth/login');
		}
	}

	/**Fungsi Log out */
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5 class="text-center"><i class="icon fas fa-exclamation-triangle"></i> Anda telah keluar!</h5></div>');
		redirect('peserta/auth');
	}
}
