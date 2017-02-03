<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class templateone extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        // if ($this->session->userdata('SESS_GURU_IS_LOGIN') === TRUE) {
        //     $path = ($this->session->userdata('SESS_GURU_IS_LOGIN') === TRUE) ? 'guru/home' : 'staf_admin/home';
        //     redirect($path);
        // }
      
            $this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
            $this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
            $this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
            $this->output->set_header('Pragma: no-cache');
                    
    }

    public function index()
    {
        $this->load->view('v_templateone');

    }
}
