<?php 
/**
* 
*/
class M_Auth extends CI_Model
{
	public function checkLogin($array) {
		$check = $this->db->where($array)->get('data_admin')->num_rows();
		return $check();
	}
}