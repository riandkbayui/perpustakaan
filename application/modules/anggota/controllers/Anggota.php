<?php 
/**
* 
*/
class Anggota extends MY_Controller {

	protected $tabel = 'data_anggota';
	protected $key = 'id_anggota';
	protected $alert = 'Anggota';

	public function index() {
		$data['fields'] = $this->db->list_fields($this->tabel);
		$data['anggota'] = $this->db->get($this->tabel)->result_array();
		$this->my_theme->content('v_anggota', 'Anggota', 'Tabel Anggota', $data);
	}

	public function tambah() {
		$data['fields'] = $this->db->list_fields($this->tabel);
		$this->my_theme->content('v_tambah', 'Tambah Anggota', 'Form', $data);
	}

	public function update($id_anggota) {
		$data['fields'] = $this->db->where($this->key, $id_anggota)->get($this->tabel)->row_array();
		$this->my_theme->content('v_update', 'Tambah Anggota', 'Form', $data);
	}

	public function check($id_anggota) {
		$rows = $this->db
			->where($this->key, $id_anggota)
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