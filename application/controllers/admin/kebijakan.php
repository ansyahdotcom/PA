<?php

class Kebijakan extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('admin/m_kebijakan','kebijakan_model');
        // $this->load->helper('text');
        adm_logged_in();
        cekadm();
    }
}