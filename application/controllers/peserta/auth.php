<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->library('facebook');
		$this->load->model('peserta/m_auth');
		$this->load->model('admin/m_medsos');
		$this->load->model('admin/m_navbar');
		$this->load->model('admin/m_kebijakan');
	}

	/** Menampilkan Login */
	public function login()
	{
		$data['footer'] = $this->m_medsos->get_data();
		$data['header'] = $this->m_navbar->get_navbar();
		$data['kebijakan'] = $this->m_kebijakan->get_data();
		if ($this->session->userdata('email')) {
			redirect('peserta/dashboard');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom ini harus di isi',
			'valid_email' => 'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Kolom ini harus di isi',
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Preneur Academy | Masuk';
			$this->load->view("landingpage/template/headerauth", $data);
			$this->load->view("landingpage/auth/login");
			$this->load->view("landingpage/template/footerauth");
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

		// Menerima inputan post berupa checklist
		$captcha_response = trim($this->input->post('g-recaptcha-response'));

		// Mengecek apakah terdapat inputan atau tidak, jika tidak maka tampil notif
		if ($captcha_response != '') {
			// Screet-key recaptcha
			$keySecret = '6LduckEaAAAAAKIDlV4mwAiTkndH3AneAGEwTDcY';

			// Membuat variabel sebagai penampung data Key, untuk dicocokan dengan data dari recaptcha google
			$check = array(
				'secret'		=>	$keySecret,
				'response'		=>	$this->input->post('g-recaptcha-response')
			);

			// Membuat HTTP Request untuk cek data validasi recaptcha
			$startProcess = curl_init();

			curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

			curl_setopt($startProcess, CURLOPT_POST, true);

			curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

			curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

			curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

			// Eksekusi data
			$receiveData = curl_exec($startProcess);

			// Merubah format penulisan
			$finalResponse = json_decode($receiveData, true);

			if ($user) {
				if ($user['ACTIVE'] == 1) {
					if (password_verify($password, $user['PSW_PS'])) {
						$data = [
							'id_ps' => $user['ID_PS'],
							'email' => $user['EMAIL_PS'],
							'name' => $user['NM_PS'],
							'role' => $user['ID_ROLE']
						];
						$this->session->set_userdata($data);
						if ($user['ID_ROLE'] == 2) {
							$this->session->set_flashdata('message', 'isLogin');
							redirect('peserta/dashboard');
						}
					} else {
						$this->session->set_flashdata('message', 'email/pswwrong');
						redirect('auth');
					}
				} elseif ($user['ACTIVE'] == 2) {
					$this->session->set_flashdata('message', 'blocked');
					redirect('auth');
				} else {
					$this->session->set_flashdata('message', 'emailnotactivate');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', 'emailnotreg');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', 'captcha');
			redirect('auth');
		}
	}

	// Membuat Auth Facebook
	public function facebook_auth()
	{

		$settings['facebook_app_id']                = '2840323672909333';
		$settings['facebook_app_secret']            = 'bf7431080a6a7d37d0ce1cdb88d43961';
		$settings['facebook_login_redirect_url']    = 'facebook';
		$settings['facebook_logout_redirect_url']   = 'peserta/auth/logout';
		$settings['facebook_login_type']            = 'web';
		$settings['facebook_permissions']           = array('email');
		$settings['facebook_graph_version']         = 'v3.2';
		$settings['facebook_auth_on_load']          = TRUE;

		$this->load->library('facebook', $settings);

		if ($this->facebook->is_authenticated()) {

			$response = $this->facebook->is_authenticated();

			if (!empty($response['error'])) {
				redirect('auth');
			}

			$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,picture.width(100).height(100),email');

			/**
			 * Remove access_token
			 */
			$this->facebook->destroy_session();

			/**
			 * Checking Email jika email telah ada maka dibuat session
			 */
			$read = $this->db->get_where('peserta', ['EMAIL_PS' => $userProfile['email']]);
			if ($read->num_rows() > 0) {

				$read_data = $read->row_array();

				if ($read_data['ACTIVE'] == '2') {
					return 'user_blocked';
				}

				$this->session->set_userdata(array(
					'id_ps' => $read_data['ID_PS'],
					'email' => $read_data['EMAIL_PS'],
					'name' => $read_data['NM_PS'],
					'role' => $read_data['ID_ROLE']
				));
				if ($read_data['ACTIVE'] == 2) {
					$this->session->set_flashdata('message', 'blocked');
					redirect('auth');
				} else {
					$this->session->set_flashdata('message', 'isLogin');
					redirect('peserta/dashboard');
				}
			} else {
				/**
				 * Save Image
				 */
				$url = $userProfile['picture']['data']['url'];
				$photoname = $userProfile['id'] . date('-YmdHis') . '.jpg';
				file_put_contents('assets/dist/img/peserta/' . $photoname, file_get_contents($url));

				/** Ambil id terakhir */
				$getID = $this->m_auth->idps()->row_array();

				/** Periksa apa ada data di tabel peserta */
				$tabel = $this->m_auth->idps()->num_rows();
				if ($tabel > 0) :
					$id_ps = autonumber($getID['ID_PS'], 2, 8);
				else :
					$id_ps = 'PS00000001';
				endif;

				$register = [
					'ID_PS' => $id_ps,
					'NM_PS' => $userProfile['first_name'] . ' ' . $userProfile['last_name'],
					'PSW_PS' => '',
					'EMAIL_PS' => $userProfile['email'],
					'HP_PS' => '',
					'FTO_PS' => $photoname,
					'ID_ROLE' => 2,
					'ACTIVE' => 1,
					'DATE_CREATE' => time(),
					'STATUS_BELI' => 0
				];

				/**
				 * Insert ke database
				 */
				$insert = $this->m_auth->regpeserta($register);
				if ($insert) {
					$this->session->set_userdata(array(
						'id_ps' => $insert,
						'email' => $register['EMAIL_PS'],
						'name' => $register['NM_PS'],
						'role' => $register['ID_ROLE']
					));
					$this->session->set_flashdata('message', 'isLogin');
					redirect('peserta/dashboard');
				}
			}
		} else {
			redirect($this->facebook->login_url());
		}
	}

	// Menggunakan google auth
	public function google_auth()
	{

		$settings['client_id']        = '957966632057-qi76k843ntkrngb3dil2a2dbk18garni.apps.googleusercontent.com';
		$settings['client_secret']    = 'wnlgn5_cRVgz69Zwgwn1GG_G';
		$settings['redirect_uri']     = base_url('google');
		$settings['application_name'] = 'Preneur Academy';
		$settings['api_key']          = '';
		$settings['scopes']           = array();

		$this->load->library('google', $settings);

		if (isset($_GET['code'])) {

			// menggunakan google authentikasi 
			if ($this->google->getAuthenticate()) {

				/**
				 * Mendapatkan (Get) user info dari google
				 */
				$userProfile = $this->google->getUserInfo();

				/**
				 * Reset OAuth access token 
				 */
				$this->google->revokeToken();

				/**
				 * Checking Email jika email telah ada maka dibuat session
				 */
				$read = $this->db->get_where('peserta', ['EMAIL_PS' => $userProfile['email']]);
				if ($read->num_rows() > 0) {

					$read_data = $read->row_array();

					if ($read_data['ACTIVE'] == '2') {
						return 'user_blocked';
					}

					$this->session->set_userdata(array(
						'id_ps' => $read_data['ID_PS'],
						'email' => $read_data['EMAIL_PS'],
						'name' => $read_data['NM_PS'],
						'role' => $read_data['ID_ROLE']
					));
					if ($read_data['ACTIVE'] == 2) {
						$this->session->set_flashdata('message', 'blocked');
						redirect('auth');
					} else {
						$this->session->set_flashdata('message', 'isLogin');
						redirect('peserta/dashboard');
					}
				} else {

					/**
					 * Save Image
					 */
					$url = $userProfile['picture'];
					$photoname = $userProfile['id'] . date('-YmdHis') . '.jpg';
					file_put_contents('assets/dist/img/peserta/' . $photoname, file_get_contents($url));

					/** Ambil id terakhir */
					$getID = $this->m_auth->idps()->row_array();

					/** Periksa apa ada data di tabel peserta */
					$tabel = $this->m_auth->idps()->num_rows();
					if ($tabel > 0) :
						$id_ps = autonumber($getID['ID_PS'], 2, 8);
					else :
						$id_ps = 'PS00000001';
					endif;

					$register = [
						'ID_PS' => $id_ps,
						'NM_PS' => $userProfile['name'],
						'PSW_PS' => '',
						'EMAIL_PS' => $userProfile['email'],
						'HP_PS' => '',
						'FTO_PS' => $photoname,
						'ID_ROLE' => 2,
						'ACTIVE' => 1,
						'DATE_CREATE' => time(),
						'STATUS_BELI' => 0
					];

					/**
					 * Insert to database
					 */
					$insert = $this->m_auth->regpeserta($register);
					if ($insert) {
						$this->session->set_userdata(array(
							'id_ps' => $insert,
							'email' => $register['EMAIL_PS'],
							'name' => $register['NM_PS'],
							'role' => $register['ID_ROLE']
						));
						$this->session->set_flashdata('message', 'isLogin');
						redirect('peserta/dashboard');
					}
				}
			}
		} else {
			redirect($this->google->loginURL());
		}
	}

	/** Menampilkan Register */
	public function register()
	{
		$data['footer'] = $this->m_medsos->get_data();
		$data['header'] = $this->m_navbar->get_navbar();
		$data['kebijakan'] = $this->m_kebijakan->get_data();
		if ($this->session->userdata('email')) {
			redirect('peserta/dashboard');
		}

		/** Periksa apa ada data di tabel peserta */
		$tabel = $this->m_auth->idps()->num_rows();

		/** Ambil id terakhir */
		$getID = $this->m_auth->idps()->row_array();

		if ($tabel > 0) :
			$id_ps = autonumber($getID['ID_PS'], 2, 8);
		else :
			$id_ps = 'PS00000001';
		endif;

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
			'min_length' => 'Format yang anda masukkan salah',
			'max_length' => 'Format yang anda masukkan salah'
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
			$this->load->view("landingpage/template/headerauth", $data);
			$this->load->view("landingpage/auth/register", $data);
			$this->load->view("landingpage/template/footerauth");
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
				'ID_PS' => $id_ps,
				'NM_PS' => $name,
				'HP_PS' => $nohp,
				'EMAIL_PS' => $email,
				'PSW_PS' => $password,
				'FTO_PS' => 'default.jpg',
				'ID_ROLE' => 2,
				'ACTIVE' => 0,
				'DATE_CREATE' => time(),
				'STATUS_BELI' => 0
			];

			$notif = [
				'GLOBAL_ID' => $register['ID_PS'],
				'ID_US' => 'ADM',
				'TITTLE_NOT' => 'Pendaftar baru',
				'MSG_NOT' => 'Ada pendaftar baru, atas nama ' . $register['NM_PS'] . '.',
				'LINK' => 'admin/peserta',
				'IS_READ' => 0,
				'ST_NOT' => 0,
				'DATE_NOT' => date('Y-m-d H:i:s', $register['DATE_CREATE'])
			];

			/** Insert ke database */
			$this->db->insert('token', $token_user);
			$this->m_auth->regpeserta($register);

			/** Insert notifikasi */
			$this->db->insert('notif', $notif);

			$this->_sendMail($token, 'verify');

			$this->session->set_flashdata('message', 'isReg');
			redirect('auth');
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
				<h4><a href='" . base_url() . "verify?email=" . $email . "&token=" . urlencode($token) . "'>Aktivasi!</a></h4>
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
				<h4><a href='" . base_url() . "repass?email=" . $email . "&token=" . urlencode($token) . "'>Ubah Password!!</a></h4>
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
		$name['user'] = $this->db->get_where('peserta', [
			'EMAIL_PS' => $email
		])->row_array();

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

					/** Insert ke tabel notif */
					$notif = [
						'GLOBAL_ID' => $name['user']['ID_PS'],
						'ID_US' => $name['user']['ID_PS'],
						'TITTLE_NOT' => 'Selamat datang!',
						'MSG_NOT' => 'Selamat bergabung di Preneur Academy',
						'LINK' => 'peserta/profil',
						'IS_READ' => 0,
						'ST_NOT' => 1,
						'DATE_NOT' => date('Y-m-d H:i:s', time())
					];
		
					$notif1 = [
						'GLOBAL_ID' => $name['user']['ID_PS'],
						'ID_US' => 'ADM',
						'TITTLE_NOT' => 'Aktivasi akun',
						'MSG_NOT' => 'Pendaftar dengan nama ' . $name['user']['NM_PS'] . ' berhasil mangaktivasi akun.',
						'LINK' => 'admin/peserta',
						'IS_READ' => 0,
						'ST_NOT' => 0,
						'DATE_NOT' => date('Y-m-d H:i:s', time())
					];
		
					/** kirim notif ke peserta */
					$this->db->insert('notif', $notif);
		
					/** kirim notif ke admin */
					$this->db->insert('notif', $notif1);
					
					$this->session->set_flashdata('message', 'Activate');
					redirect('auth');
				} else {
					$this->m_auth->del($email);

					$this->db->delete('token', [
						'EMAIL' => $email
					]);

					$this->session->set_flashdata('message', 'Exp-token');
					redirect('auth');
				}
			} else {
				$this->m_auth->del($email);

				$this->db->delete('token', [
					'EMAIL' => $email
				]);

				$this->session->set_flashdata('message', 'Wrg-token');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', 'Fail-active');
			redirect('auth');
		}
	}

	/**Fungsi untuk meminta link form ubah password yang dikirim lewat email */
	public function lupapsw()
	{
		$data['footer'] = $this->m_medsos->get_data();
		$data['header'] = $this->m_navbar->get_navbar();
		$data['kebijakan'] = $this->m_kebijakan->get_data();
		if ($this->session->userdata('email')) {
			redirect('peserta/dashboard');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Kolom ini harus diisi',
			'valid_email' => 'Email tidak valid'
		]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Preneur Academy | Lupa Password';
			$this->load->view("landingpage/template/headerauth", $data);
			$this->load->view("landingpage/auth/forgot");
			$this->load->view("landingpage/template/footerauth");
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

				$this->session->set_flashdata('message', 'cekemail');
				redirect('forgot');
			} else {
				$this->session->set_flashdata('message', 'emailnotactivate');
				redirect('forgot');
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

					$this->session->set_flashdata('message', 'exptoken');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', 'wrongtoken');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', 'emailwrong');
			redirect('auth');
		}
	}

	/**Fungsi untuk mengubah password */
	public function recoverpsw()
	{
		$data['footer'] = $this->m_medsos->get_data();
		$data['header'] = $this->m_navbar->get_navbar();
		$data['kebijakan'] = $this->m_kebijakan->get_data();
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
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
			$this->load->view("landingpage/template/headerauth", $data);
			$this->load->view("landingpage/auth/recover");
			$this->load->view("landingpage/template/footerauth");
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->m_auth->ubahpsw($email, $password);

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', 'Password');
			redirect('auth');
		}
	}

	/**Fungsi Log out */
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');
		$this->session->set_flashdata('message', 'logout');
		redirect('auth');
	}
}
