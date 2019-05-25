<?php 
/**
* 
*/
class Buku extends MY_Controller
{
	protected $tabel = 'data_buku';
	protected $key = 'id_buku';
	protected $alert = 'Buku';

	public function index() {
		$data['daftar_buku'] = $this->db->select('b.id_buku, b.isbn, b.judul_buku, k.nama_kategori, b.pengarang, b.penerbit, b.tahun_terbit, b.stok')
										->from('data_buku as b')
										->join('data_kategori as k', 'k.id_kategori = b.kategori')
										->get()
										->result_array();
		$this->my_theme->content('v_daftar_buku', 'Daftar Buku', 'Semua Buku', $data);
	}

	public function tambah() {
		$data['daftar_buku'] = $this->db->list_fields('data_buku');
		$data['kategori'] = $this->db->get('data_kategori')->result_array();
		$this->my_theme->content('v_tambah_buku', 'Tambah Buku', 'Form', $data);
	}

	public function update($id) {
		$data['daftar_buku'] = $this->db->where($this->key, $id)->get($this->tabel)->row_array();
		$data['kategori'] = $this->db->get('data_kategori')->result_array();
		$this->my_theme->content('v_update_buku', 'Form', 'Tambah Kategori', $data);
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