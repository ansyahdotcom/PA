<?php

class Medsos extends CI_Controller
{

    function __construct(){
		parent::__construct();
		$this->load->model('admin/m_medsos','medsos_model');
        // $this->load->helper('text');
        adm_logged_in();
        cekadm();
    }
}