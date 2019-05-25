<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// print_r($this->session->userdata());
		// die();
		$isLogin = isset($this->session->login) ? FALSE : TRUE;
		if ($isLogin) {
			redirect(base_url('auth/login'));
		}
	}
}