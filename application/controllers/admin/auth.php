<?php

class Auth extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
	}

    
    /** Menampilkan Form Login */
	public function index()
	{
		$this->load->view("admin/template/header");
		$this->load->view("admin/auth/login");
		$this->load->view("admin/template/footer");
	}
}