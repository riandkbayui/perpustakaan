<?php
/**
* 
*/
class Kategori extends MY_Controller
{

	protected $tabel = 'data_kategori';
	protected $key = 'id_kategori';
	protected $alert = 'Kategori';

	public function index() {
		$data['field_kategori'] = $this->db->list_fields($this->tabel);
		$data['daftar_kategori'] = $this->db->get($this->tabel)->result_array();
		$this->my_theme->content('v_kategori', 'Daftar Kategori', 'Semua Kategori', $data);
	}

	public function tambah() {
		$data['daftar_kategori'] = $this->db->list_fields($this->tabel);
		$this->my_theme->content('v_tambah', 'Form', 'Tambah Kategori', $data);
	}

	public function update($id) {
		$data['daftar_kategori'] = $this->db->where($this->key, $id)->get($this->tabel)->row_array();
		$this->my_theme->content('v_update', 'Form', 'Tambah Kategori', $data);
	}

	public function check($id) {
		$rows = $this->db
			->where($this->key, $id)
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