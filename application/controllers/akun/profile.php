<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends CI_Controller {

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
            
            $this->load->model('m_member');
            $this->load->model('m_login');
    }

    public function index()
    {

    }

     public function detail($id_member)
    {
        $data['list'] = $this->m_member->find($id_member);

        $this->load->view('global_akun/header_global_akun');
        $this->load->view('akun/v_profile',$data);
        $this->load->view('global_akun/footer_global_akun');

    }

    

    public function update_profile($id_member)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|xss_clean');
        $this->form_validation->set_rules('telepon', 'Telepon', 'trim|xss_clean');

                
                $data['list'] = $this->m_member->find($id_member);
                
                $this->load->view('global_akun/header_global_akun');
                $this->load->view('akun/v_editprofile',$data);
                $this->load->view('global_akun/footer_global_akun');

    } 

    public function edit_profile($id_member)
    {

   
                
                $nama= $this->input->post('nama');
                $telepon= $this->input->post('telepon');

                $polatelepon ="/^.{6,}$/";

                if(!preg_match($polatelepon, $this->input->post('telepon')))
                {
                    
                    if (!preg_match($polatelepon, $this->input->post('telepon'))) {
                        $this->session->set_flashdata('telepon', 'Nomor telepon minimal terdiri dari 6 karakter');
                    }
                    
                    $this->session->set_flashdata('NAM',$this->input->post('nama'));
                    $this->session->set_flashdata('TELEPO',$this->input->post('telepon'));

                    redirect(base_url('akun/profile/update_profile/' . $id_member));

                }else {
                    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                    $data = array(
                            'nama' => $nama,
                            'telepon' => $telepon,
                            'updated_at' => $date->format('Y-m-d H:i:s')
                    );

                
                    if ($this->m_member->update($id_member, $data)) {

                        $this->session->set_userdata('SESS_AKUN_NAMA_USER', $nama);
                        
                        $this->session->set_flashdata('message', 'Data informasi profil berhasil di update');

                        redirect(base_url('akun/profile/detail/' . $id_member));

                    } else {
                        $this->session->set_flashdata('message', 'Data gagal di update');

                        redirect(base_url('akun/profile/update_profile/' . $id_member));
                    }
                }
            
    } 

    public function update_akun($id_member)
    {

        $this->form_validation->set_rules('password', 'Password ', 'trim|xss_clean');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|xss_clean');
        $this->form_validation->set_rules('password_konfirm', 'Konfirmasi Password', 'trim|xss_clean');

                $username = $this->session->userdata('SESS_AKUN_USER_NAME');

                $data['list'] = $this->m_member->find($id_member);
                // echo var_dump($data); exit(); 
                $this->load->view('global_akun/header_global_akun');
                $this->load->view('akun/v_editakun',$data);
                $this->load->view('global_akun/footer_global_akun');
           
    }

    public function edit_akun($id_member)
    {

      

                $id = $this->session->userdata('SESS_AKUN_ID_USER');
                $pass_now = $this->m_member->get_pass($id);
                $password = $this->input->post('password');
                $hash = $this->get_hash_password($id, $password);

                // echo var_dump($password); exit(); 
                    $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));

                    $data = array(
                        'user.id_user' => $id_member,
                        'password' => $hash
                        );

                        $user = $this->m_login->select_user($data);
                        
                            if($hash == $pass_now)
                            {
                                if ($this->input->post('password_new') == $this->input->post('password_konfirm')) 
                                {
                                    $polapassword ="/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,}$/";
                                    if(!preg_match($polapassword, $this->input->post('password_new'))){
                
                                       
                                            $this->session->set_flashdata('password', 'Password baru minimal 5 digit dan terdiri dari huruf, angka serta beberapa karakter "!@#$%"');
                                        
                                        redirect(base_url('akun/profile/update_akun/' . $id_member));
                                    }else {

                                            $data = array(
                                            'password' => $this->get_hash_password($id,$this->input->post('password_new')),
                                            'updated_at' => $date->format('Y-m-d H:i:s'));
                                            
                                            if ($this->m_login->update($id_member, $data)) 
                                            {   
                                                $this->session->set_flashdata('message', 'Data akun berhasil di ubah');

                                                redirect(base_url('akun/profile/detail/' . $id_member));

                                            } else {

                                                $this->session->set_flashdata('message', 'Data akun gagal di ubah');
                                                }
                                        }
                                }else {

                                    $this->session->set_flashdata('warning', 'password baru dan konfirmasi password tidak sama');
                                    }
                            } else {
                                $this->session->set_flashdata('warning', 'password lama salah');
                                }
                                
                        redirect(base_url('akun/profile/update_akun/' . $id_member));
                
           
    }

    //  public function update_foto($id_user) {

    //     $data['list']= $this->m_login->find_guru($id_user);
         
    //     $this->load->view('guru/profile/upload_modal', $data);
        
    // }


    // public function insert($id_user)
    // {
    //     $this->load->library('upload');

    //     $nmfile = $this->input->post('filefoto'); //nama file saya beri nama langsung dan diikuti fungsi time
    //     $filename = "profilepicture_".$this->session->userdata('SESS_GURU_ID_USER');
    //     $config['upload_path'] = './uploads/profil/'; //path folder
    //     $config['allowed_types'] = 'jpg|png|jpeg|gif'; //type yang dapat diakses bisa anda sesuaikan
    //     $config['max_size'] = '2000'; //maksimum besar file 3M
       
    //     $config['overwrite'] = true;
    //     $config['file_name'] = $filename;
 
    //     $this->upload->initialize($config);
         
    //     if($_FILES['filefoto']['name'])
    //     {
    //         if ($this->upload->do_upload('filefoto'))
    //         {   
    //             $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
    //             $gbr = $this->upload->data();
    //             $data = array(
    //                 'uploaded_at' => $date->format('Y-m-d H:i:s'),
    //                 'updated_at' => $date->format('Y-m-d H:i:s'),
    //                 'picture' => $gbr['file_name']
                    
    //             );

    //             $this->m_member->get_insert($data,$this->session->userdata('SESS_GURU_ID_USER'));
                
    //             $this->session->set_userdata('SESS_GURU_PICTURE_USER',$gbr['file_name']);

    //             $this->session->set_flashdata('message', 'Upload foto berhasil');

    //             redirect('guru/profile/detail/' . $id_user); 
    //         }else{
    //             $this->session->set_flashdata('warning', 'Maaf, foto tidak dapat diunggah, silahkan ulangi kembali');

    //             redirect('guru/profile/detail/' . $id_user);
    //         }
    //     }
    // }

    public function get_id($username)
    {
        $salt = $this->m_login->get_id($username);
        return $salt;
        
        if ($salt) {
            return $salt;
        }else{
            return false;
        }

    }

    public function get_hash_password($salt, $password)
    {
        $hash_password = md5($salt.$password);
        return $hash_password;

    }  

    
}
