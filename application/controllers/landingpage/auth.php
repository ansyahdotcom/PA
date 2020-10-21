<?php

class Auth extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

    
    /** Menampilkan Form Login */
	public function index()
	{
		$this->load->view("landingpage/template/header");
		$this->load->view("landingpage/auth/login");
		$this->load->view("landingpage/template/footer");
	}
}