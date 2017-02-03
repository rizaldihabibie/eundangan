<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reset extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('SESS_AKUN_IS_LOGIN') || ($this->session->userdata('SESS_AKUN_IS_LOGIN') && $this->session->userdata('SESS_AKUN_USER_PRIV') === 1)) 
		{
			redirect(base_url('member'));
		}

		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
				
		$this->load->model('m_login');
		$this->load->model('m_register');
		// $this->load->library('Recaptcha');
	}

	public function index()
	{	

	  //       $recaptcha = $this->input->post('g-recaptcha-response');
	  //       $response = $this->recaptcha->verifyResponse($recaptcha);

			


			// if (!isset($response['success']) || $response['success'] <> true) {
			// 	$data = array(
			// 		'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
		 //            'script_captcha' => $this->recaptcha->getScriptTag() // javascript recaptcha ditaruh di head
		 //            );
				
			// 	$this->session->set_flashdata('errorcaptcha', 'Anda belum centang captcha');
				$this->load->view('v_reset');

			// }else{

			// 	redirect(base_url('member'));
				
			// }
		
	}

	public function form()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		    $this->load->library('email');
		
	// 		// cek apakah email valid, ada usernya
	// 			// cek apakah user tersebut aktif
	// 				// kirim email
			$username = array('username' => $this->input->post('username'));
			$kode = md5(time());

				$data = array(
					'username' => $this->input->post('username'),
					
				);
				$this->session->set_userdata($data);

				$user = $this->m_login->select_user($data);
				// echo json_encode($user); exit();
				if (count($user) > 0) {
					if ($user->is_active == 1) {
						if ($user->hak_akses == 1) {
							// $kode = md5(time());
							$this->m_register->reset_pwd($user->id_user, $kode);

							$subject = 'Reset Password Member Jadimanten';

				            // Get full html:
				            // $body = 'Halo, <br>Anda telah melakukan permohonan lupa password untuk akun anda. Jika anda merasa tidak melakukan permohonan lupa password, abaikan saja Email ini.<br> Silahkan klik link dibawah ini untuk memasukkan password baru anda :<br><br> '. base_url('register/reset_password/' . $kode);
				            $body = $this->load->view('v_emailresetpwd',' ', TRUE);
				   


				            // echo var_dump($body);exit();
				        
				            $result = $this->email
				                ->from('cs@niscalindo.com')
				                // ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
				                ->to($username)
				                ->subject($subject)
				                ->message($body)
				                ->send();
				     //                         var_dump($body);
									// echo '<br />';
									// echo $this->email->print_debugger();exit();
							redirect(base_url('reset_password'));

						} else {
							$this->session->set_flashdata('username',$this->input->post('username'));
							
							// bukan admin, intinya user/email salah
							$this->session->set_flashdata('message', 'Username atau Password anda salah');
							redirect('reset');
						}
					} else {
						$this->session->set_flashdata('message', 'Akun anda belum diaktivasi. Mohon periksa folder kotak masuk atau folder spam di email anda untuk aktivasi.');
						redirect('reset');
					}
					
				} else {
					$this->session->set_flashdata('username',$this->input->post('username'));
						
					// tidak ada data, sama saja user/email salah
					$this->session->set_flashdata('message', 'Email tidak terdaftar');
					redirect('reset');
				}
			
		
	}

}