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
		$data['judul'] = 'Preneur Academy | Beranda';
		$this->load->view("landingpage/template/header", $data);
		$this->load->view("landingpage/index");
		$this->load->view("landingpage/template/footer");
	}

	/** Menampilkan Login */
	public function login()
	{
		$data['judul'] = 'Preneur Academy | Masuk';
		$this->load->view("landingpage/template/header", $data);
		$this->load->view("landingpage/auth/login");
		$this->load->view("landingpage/template/footer");
	}

	/** Menampilkan Register */
	public function register()
	{
		if ($this->session->userdata('email')) {
			redirect('peserta/auth');
		}

		$tabel = $this->m_auth->idpsr();

		var_dump($tabel);

		if ($tabel >= 0 && $tabel < 10) {
			$id = "PSR0000" . $tabel;
		} elseif ($tabel >= 10 && $tabel < 100) {
			$id = "PSR000" . $tabel;
		} elseif ($tabel >= 100 && $tabel < 1000) {
			$id = "PSR00" . $tabel;
		} elseif ($tabel >= 1000 && $tabel < 10000) {
			$id = "PSR0" . $tabel;
		} elseif ($tabel >= 10000 && $tabel < 100000) {
			$id = "PSR" . $tabel;
		}

		var_dump($id);

		$this->form_validation->set_rules('name', 'Name', 'required|trim', [
			'required' => 'Kolom ini harus diisi'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[peserta.EMAIL_PS]', [
			'required' => 'Kolom ini harus diisi',
			'valid_email' => 'Email tidak valid',
			'is_unique' => 'Email ini sudah terdaftar'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password1]', [
			'required' => 'Kolom ini harus diisi',
			'min_length' => 'Password terlalu pendek',
			'matches' => ''
		]);

		$this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[8]|matches[password1]', [
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
			$name = htmlspecialchars($this->input->post('name', true));
			$email = htmlspecialchars($this->input->post('email', true));
			$password = htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT));

			$token = base64_encode(random_bytes(32));
			$token_user = [
				'EMAIL' => $email,
				'TOKEN' => $token,
				'DATE' => time()
			];

			$register = [
				'ID_PS' => $id,
				'NM_PS' => $name,
				'EMAIL_PS' => $email,
				'PSW_PS' => $password,
				'ID_ROLE' => 2,
				'ACTIVE' => 0,
				'DATE_CREATE' => time()
			];

			$this->db->insert('token', $token_user);
			$this->m_auth->regpeserta($register);

			$this->_sendMail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p><i class="icon fas fa-check"></i> Buat akun baru berhasil </br>silahkan cek email anda untuk mengaktivasi akun anda!</p></div>');
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
				<p>Tolong Klik Link Dibawah ini untuk mengaktivasi akun anda!</p>
				<h4><a href='" . base_url() . "peserta/auth/verify?email=" . $email . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
			</body>
			</html>
		";

		/**Pesan email jika ubah password */
		// $UbahPassword = "
		//                         <html>
		//                         <head>
		//                             <title>Kode Ubah Password</title>
		//                         </head>
		//                         <body>
		//                             <h2>Yang terhormat saudara " . $name['user']['NM_ADM'] . "</h2>
		//                             <p>Anda ingin mengubah password akun anda</p>
		//                             <p>Email anda : " . $email . "</p>
		//                             <p>Klik link di bawah ini untuk mengubah password anda!</p>
		//                             <h4><a href='" . base_url() . "admin/auth/ubahpassword?email=" . $email . "&token=" . urlencode($token) . "'>Ubah Password!!</a></h4>
		//                         </body>
		//                         </html>
		// ";

		if ($type == 'verify') {
			$this->email->subject('Verifikasi Akun Baru');
			$this->email->message($AktivasiEmail);
			$this->email->set_mailtype('html');
		} // elseif ($type == 'forgot') {
		// 	// $this->email->subject('Ubah Password');
		// 	// $this->email->message($UbahPassword);
		// 	// $this->email->set_mailtype('html');
		// }

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
		$token = $this->input->post('token');

		$user = $this->m_auth->emailverif($email);

		if ($user) {
			$user_token = $this->db->get_where('token', [
				'TOKEN' => $token
			])->row_array();
			if ($user_token) {
				if (time() - $user_token['DATE'] < (60 * 60 * 48)) {
					$this->m_auth->activ($email);

					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p><i class="icon fas fa-check"></i> Akun berhasil di aktivasi </br>silahkan login!</p></div>');
					redirect('peserta/auth/login');

					$this->db->delete('TOKEN', [
						'EMAIL' => $email
					]);
				} else {
					$this->m_auth->del($email);

					$this->db->delete('TOKEN', [
						'EMAIL' => $email
					]);

					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p><i class="icon fas fa-ban"></i> Token sudah kadaluarsa!</p></div>');
					redirect('peserta/auth/login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<p><i class="icon fas fa-ban"></i> Token anda salah!</p></div>');
				redirect('peserta/auth/login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p><i class="icon fas fa-ban"></i> Aktivasi akun gagal!</p></div>');
			redirect('peserta/auth/login');
		}
	}
}
