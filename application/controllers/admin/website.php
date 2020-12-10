<?php

class Website extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('admin/m_restore');
        adm_logged_in();
        cekadm();
    }

    function index(){
        $data['admin'] = $this->db->get_where('admin', [
            'EMAIL_ADM' =>
            $this->session->userdata('email')
        ])->row_array();
        $data['tittle'] = "Data Website";
		// $data['data'] = $this->navbar_model->get_navbar();
        $this->load->view("admin/template_adm/v_header", $data);
        $this->load->view("admin/template_adm/v_navbar", $data);
        $this->load->view("admin/template_adm/v_sidebar", $data);
        $this->load->view("admin/setting/v_website", $data);
        $this->load->view("admin/template_adm/v_footer");  
    }

    public function backup_db(){

            $this->load->dbutil();
    
            $prefs = array(     
                'format'      => 'sql',             
                'filename'    => "preneueracademy_".date("Ymd-His").'.sql',
                'add_drop'    => TRUE,
                'add_insert'  => TRUE,
                'newline'     => "\n",
                'foreign_key_checks'    => FALSE,
                );
    
            $backup =& $this->dbutil->backup($prefs); 
    
            $db_name = "preneuracademy".date("Ymd-His") .'.sql';
            $save = FCPATH.'assets/db/'.$db_name;
            $this->load->helper('file');
            write_file($save, $backup); 
    
            $this->load->helper('download');
            force_download($db_name, $backup);
    }

    public function restore_db(){
        // $this->m_restore->droptable();

        $input  = $_FILES['file'];
        $nama   = $_FILES['file']['name'];

        if (isset($input)) {
            $lokasi = $input['tmp_name'];
            $direktori =  "assets/db/restore/$nama";
            move_uploaded_file($lokasi, "$direktori");
        }

        $isi    = file_get_contents($direktori);
        $string = rtrim($isi, "\n;");
        $array  = explode(";", $string);

        foreach ($array as $ar) {
            $this->db->query($ar);
        }

        unlink($direktori);

        $this->session->set_flashdata('message', 'restore');
		redirect('admin/website');
    }
}