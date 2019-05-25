<?php
/**
* 
*/
class Admin extends MY_Controller
{

	protected $tabel = 'data_admin';
	protected $key = 'username';
	protected $alert = 'Admin';
	
	public function index() {
		$data['fields'] = $this->db->list_fields('data_admin');
		$data['admin'] = $this->db->select('d.username, d.nik, d.nik, d.nama, d.alamat, d.no_hp, s.nama_level')
								  ->from('data_admin as d')
								  ->join('sys_level as s', 's.id_level = d.level')
								  ->get()
								  ->result_array();
		$this->my_theme->content('v_admin','Judul Halaman','Judul Kartu', $data);
	}

	public function tambah() {
		$data['fields'] = $this->db->list_fields('data_admin');
		$data['level'] = $this->db->get('sys_level')->result_array();
		$this->my_theme->content('v_tambah', 'Tambah Admin', 'Form', $data);
		$this->my_theme->content
	}

	public function update($username) {
		$data['level'] = $this->db->get('sys_level')->result_array();
		$data['fields'] = $this->db->where($this->key, $username)
								  ->get('data_admin')
								  ->row_array();
		$this->my_theme->content('v_update', 'Tambah Admin', 'Form', $data);
	}

	public function check($username) {
		$rows = $this->db
			->where($this->key, $username)
			->get($this->tabel)
			->num_rows();
		echo $rows;
	}

	public function crud_tambah() {
		$data = $this->input->post();
		$this->db->insert($this->tabel, $data);
		$this->session->set_flashdata('message', '<strong>Berhasil!</strong> '.$this->alert.' telah ditambahkan.');
		redirect(base_url($this->router->fetch_class()));
		die();
	}

	public function crud_update($id) {
		$data = $this->input->post();
		$this->db->where($this->key, $id)->update($this->tabel, $data);
		$this->session->set_flashdata('message', '<strong>Berhasil!</strong> '.$this->alert.' telah diupdate.');
		redirect(base_url($this->router->fetch_class()));
		die();
	}

	public function crud_delete($id) {
		$this->db->where($this->key, $id)->delete($this->tabel);
		$this->session->set_flashdata('message', '<strong>Berhasil!</strong> '.$this->alert.' telah dihapus.');
		redirect(base_url($this->router->fetch_class()));
		die();
	}

	private function dumper($data) {
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
}