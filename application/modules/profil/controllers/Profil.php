<?php 
/**
* 
*/
class Profil extends MY_Controller
{
	public function index(){
		$data['profil'] = $this->db->where('username', $this->session->username)
									->get('data_admin')
									->row_array();
		unset($data['profil']['password']);
		unset($data['profil']['username']);
		unset($data['profil']['level']);
		$this->my_theme->content('v_profil', 'Profil', 'Form', $data);
	}

	public function update() {
		$username = $this->session->username;
		$post = $this->input->post();
		$update = $this->db->where('username', $username)->update('data_admin', $post);
		if ($update) {
			$this->session->set_flashdata('message', 'update data berhasil');
			$this->session->set_userdata($post);
		} else {
			$this->session->set_flashdata('message', 'update data gagal');
		}
		redirect(base_url('dashboard'));
		die();
	}
}