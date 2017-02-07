<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class acara extends CI_Controller {
	
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
	        $this->load->view('undangan/v_acara');
	        $this->load->view('global_akun/footer_global_akun');
		
	}


    public function saveAcara(){
			$tanggal_akad = $this->input->post('tanggal_akad');
			$tanggal_resepsi = $this->input->post('tanggal_resepsi');
			$tempat_akad = $this->input->post('tempat_akad');
			$tempat_resepsi = $this->input->post('tempat_resepsi');
			$jam_akad = $this->input->post('jam_akad');
			$jam_resepsi = $this->input->post('jam_resepsi');

			$tempat ="/^.{6,}$/";

			if (!preg_match($tempat, $tempat_akad)) {
					$this->session->set_flashdata('tempat_akad', 'Tempat Akad Belum Diisi');
					redirect(base_url('undangan/acara'));

			}else if(!preg_match($tempat, $tempat_resepsi)){
					$this->session->set_flashdata('tempat_resepsi', 'Tempat Resepsi Belum Diisi');
					redirect(base_url('undangan/acara'));
			}else{
				$data = array(
							'id_user' => $this->session->userdata('SESS_AKUN_ID_USER'),
							'tempat_akad' => $tempat_akad,
							'tempat_resepsi' => $tempat_resepsi,
							'tanggal_akad' => $tanggal_akad,
							'tanggal_resepsi' => $tanggal_resepsi,
							'jam_akad' => $jam_akad,
							'jam_resepsi' => $jam_resepsi
							);

				$success = $this->m_undangan->addacara($data);
				if($success){
					 $this->session->set_flashdata('message', 'Data acara berhasil dtambah');
					redirect(base_url('undangan/acara'));
				}
			}
			

    }
	
}
