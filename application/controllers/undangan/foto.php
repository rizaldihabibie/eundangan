<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class foto extends CI_Controller {
	
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

		$this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');
		$this->form_validation->set_rules('telepon', 'Telepon', 'trim|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean');
		$this->form_validation->set_rules('hak_ases', ' Hak akses', 'trim|xss_clean');
		$this->form_validation->set_rules('jenis_kelamin', ' Hak akses', 'trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE) {

			$this->load->view('global_akun/header_global_akun');
	        $this->load->view('undangan/v_album_foto', array('error' => ' ' ));
	        $this->load->view('global_akun/footer_global_akun');
		
		} else {

			$nama= $this->input->post('nama');
			$jenis_kelamin= $this->input->post('jenis_kelamin');
			$telepon= $this->input->post('telepon');
			$username = $this->input->post('username');
			$password= $this->input->post('password');

			$polausername = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
			$polapassword ="/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,}$/";
			$polatelepon ="/^.{6,}$/";
			
			if($this->member_model->member_konflik($username) > 0 || $this->member_model->telepon_konflik($telepon) > 0  || !preg_match($polapassword, $this->input->post('password')) || !preg_match($polausername, $this->input->post('username')) || !preg_match($polatelepon, $this->input->post('telepon'))){
				
				if (!preg_match($polapassword, $this->input->post('password'))) {
					$this->session->set_flashdata('password', 'Password minimal 5 digit dan terdiri dari huruf, angka serta beberapa karakter "!@#$%"');
				}
				if (!preg_match($polausername, $this->input->post('username'))) {
					$this->session->set_flashdata('username_konfirm', 'Email Tidak Valid');
				}
				
				if ($this->member_model->member_konflik($username) > 0) {
					$this->session->set_flashdata('username', 'Email telah terdaftar sebelumnya');
				}
				if (!preg_match($polatelepon, $this->input->post('telepon'))) {
					$this->session->set_flashdata('telepon', 'Nomor telepon minimal terdiri dari 6 karakter');
				}
				if ($this->member_model->telepon_konflik($telepon) > 0) {
					$this->session->set_flashdata('telepon_konfirm', 'Nomor Telepon tersebut sudah digunakan');
				}
				
				$this->session->set_flashdata('NAM',$this->input->post('nama'));
				$this->session->set_flashdata('KELAMIN',$this->input->post('jenis_kelamin'));
				$this->session->set_flashdata('TELEPO',$this->input->post('telepon'));
				$this->session->set_flashdata('USERNAM',$this->input->post('username'));
				$this->session->set_flashdata('PASSWOR',$this->input->post('password'));

				redirect(base_url('register'));

			}else {
					$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

					$data = array(
						'nama' => $nama,
						'jenis_kelamin' => $jenis_kelamin,
						'telepon' => $telepon,
						'username' => $username,
						'password' => $password,
						'hak_akses' => 1,
						'is_active' => 0,
						'notif' => 1,
						'created_at' => $date->format('Y-m-d H:i:s'),
						'is_delete' => 0
						);
				
					$this->session->set_userdata($data);
			
					if ($this->member_model->add($data)) {
						$this->session->set_flashdata('indikator_register', 'true');
						$this->session->set_flashdata('message', 'Terimakasih, Registrasi Member Berhasil');

						redirect(base_url('register/notif'));
					} else {

						$this->session->set_flashdata('warning', 'Maaf, Anda Belum Bisa Regristrasi Mohon Isi Data Dengan Benar');

						redirect(base_url('register'));
					}
			}
		}
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

     public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 5024;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('global_akun/header_global_akun');
	        			$this->load->view('undangan/v_album_foto', $error);
	        			$this->load->view('global_akun/footer_global_akun');
                        
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $this->session->set_flashdata('success', 'data berhasil di simpan');
                        $this->load->view('global_akun/header_global_akun');
	        			$this->load->view('undangan/v_album_foto');
	        			$this->load->view('global_akun/footer_global_akun');
                }
        }

   //  public function saveAyat(){

			// $nama_ayat = $this->input->post('nama_ayat');
			// $isi_ayat = $this->input->post('isi_ayat');

			// $formatAyat ="/^.{5,}$/";

			// if (!preg_match($formatAyat, $isi_ayat)) {
			// 		$this->session->set_flashdata('isi_ayat', 'Isi ayat tidak sesuai');
			// 		redirect(base_url('undangan/ayat'));

			// }else if(!preg_match($formatAyat, $nama_ayat)){
			// 		$this->session->set_flashdata('nama_ayat', 'Nama ayat tidak sesuai');
			// 		redirect(base_url('undangan/ayat'));
			// }else{
			// 	$data = array(
			// 				'id_user' => $this->session->userdata('SESS_AKUN_ID_USER'),
			// 				'nama_ayat' => $nama_ayat,
			// 				'isi_ayat' => $isi_ayat
			// 				);

			// 	$success = $this->m_undangan->addayat($data);
			// 	if($success){
			// 		$this->session->set_flashdata('success', 'data berhasil di simpan');
			// 		redirect(base_url('undangan/ayat'));
			// 	}
			// }
			

   //  }
	
}
