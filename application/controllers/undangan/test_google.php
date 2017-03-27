<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test_google extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		// if (!$this->session->userdata('SESS_AKUN_IS_LOGIN') || ($this->session->userdata('SESS_AKUN_IS_LOGIN') && $this->session->userdata('SESS_AKUN_USER_PRIV') !== 1)) 
		// {
		
		// 	redirect(base_url('login'));
			
		// }
		
		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		
		$this->load->model('m_login');
		$this->load->model('m_member');
		$this->load->model('m_undangan');
		
	}

	public function index()
	{

			$this->load->view('global_akun/header_global_akun');
	        $this->load->view('undangan/google_login.php'));
	        $this->load->view('global_akun/footer_global_akun');
	}

	public function notif()
    {
    	if(!empty($this->session->flashdata('indikator_register')))
    	{
        	$this->load->view('notif_register');
    	}else{
    		redirect(base_url('register'));
    	}

    }


	
}
