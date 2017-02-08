<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_mempelai extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('SESS_AKUN_IS_LOGIN') || ($this->session->userdata('SESS_AKUN_IS_LOGIN') && $this->session->userdata('SESS_AKUN_USER_PRIV') !== 1)) 
		{
		
			redirect(base_url('login'));
			
		}
		
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
	        $this->load->view('undangan/v_datamempelai');
	        $this->load->view('global_akun/footer_global_akun');
		
	}


    public function saveDataMempelai(){
			$nama_lengkap_pria= $this->input->post('nama_lengkap_pria');
			$nama_panggilan_pria= $this->input->post('nama_panggilan_pria');
			$nama_ayah_pria= $this->input->post('nama_ayah_pria');
			$nama_ibu_pria = $this->input->post('nama_ibu_pria');
			$nama_lengkap_wanita= $this->input->post('nama_lengkap_wanita');
			$nama_panggilan_wanita= $this->input->post('nama_panggilan_wanita');
			$nama_ayah_wanita= $this->input->post('nama_ayah_wanita');
			$nama_ibu_wanita= $this->input->post('nama_ibu_wanita');

			$data = array(
						'id_user' => $this->session->userdata('SESS_AKUN_ID_USER'),
						'nama_lengkap_pria' => $nama_lengkap_pria,
						'nama_panggilan_pria' => $nama_panggilan_pria,
						'nama_ayah_pria' => $nama_ayah_pria,
						'nama_ibu_pria' => $nama_ibu_pria,
						'nama_lengkap_wanita' => $nama_lengkap_wanita,
						'nama_panggilan_wanita' => $nama_panggilan_wanita,
						'nama_ayah_wanita' => $nama_ayah_wanita,
						'nama_ibu_wanita' => $nama_ibu_wanita
						);

			$success = $this->m_undangan->addMempelai($data);
			if($success){
				$this->session->set_flashdata('message', 'Data mempelai berhasil dtambah');
				redirect(base_url('undangan/data_mempelai'));
			}

    }
	
}
