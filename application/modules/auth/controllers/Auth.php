<?php 
/**
* 
*/
class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Auth');
	}

	public function login() {
		$this->load->view('v_login');
	}

	public function lupa_password() {
		$this->load->view('v_lupa');
	}

	public function checkLogin() {
		$isLogin = $this->db->where($this->input->post())->get('data_admin')->num_rows();
		if ($isLogin) {
			$data = $this->db->where($this->input->post())->get('data_admin')->row_array();
			$data['login'] = TRUE;
			// print_r($data);
			// die();
			$this->session->set_userdata($data);
			redirect(base_url('dashboard'));
		} else {
			$this->session->set_flashdata('loginFail', 1);
			redirect(base_url('auth/login'));
			die();
		}
	}

	public function gantiPassword() {
		$password = $this->input->post('password');
		$new_password = $this->input->post('new_password');
		$username = $this->session->username;
		$data = array('username' => $username, 'password' => $password);
		$check = $this->db->where($data)->get('data_admin')->num_rows();
		if ($check) {
			$this->db->set('password', $new_password)->where($data)->update('data_admin');
			print_r('1');
		} else {
			print_r('0');
		}
	}

	public function logout($update = NULL) {
		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
		    if ($key!='__ci_last_regenerate' && $key != '__ci_vars')
		       $this->session->unset_userdata($key);
		}
		if(!empty($update)) $this->session->set_flashdata('isSuccess', true);
		redirect(base_url('auth/login'));
	}
}