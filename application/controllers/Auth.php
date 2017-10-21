<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

public function __construct(){
	 parent::__construct();
        $this->load->helper(array('form','url', 'security'));
       $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->database();
        $this->load->model('user_model');

       }

	public function index()
	{

		if($this->session->userdata('logged_in')=="")
		{
			$this->load->view('login_view');
		}
		else{
			redirect('dashboard');
		}
		
			
	}


	public function cek_login() {
		$data = array('username' => $this->input->post('username'),
					  'password' => md5($this->input->post('password')),
						
						

			);
		

		$hasil = $this->user_model->cek_auth($this->security->xss_clean($data));
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Loggin';
				$sess_data['id'] = $sess->id_user;
				//$sess_data['nama'] = 'ilham'; fix that
				$sess_data['username'] = $sess->username;


				
				
				
				$this->session->set_userdata($sess_data);
			}
			
			
				redirect('dashboard', 'refresh');
			
				
		 	
				
			
		
				
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}



	public function logout() {
		$this->session->unset_userdata('username');
		//$this->session->unset_userdata('tipe_member');
		//session_destroy();
		$this->session->sess_destroy();
		redirect('auth');
	}

}

?>