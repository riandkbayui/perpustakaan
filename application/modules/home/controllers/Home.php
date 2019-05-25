<?php 
/**
* 
*/
class Home extends CI_Controller
{
	public function index() {
		$data['buku'] = $this->db->select('buku.id_buku, buku.isbn, buku.judul_buku, kategori.nama_kategori as kategori, buku.pengarang, buku.penerbit, buku.tahun_terbit, buku.stok, buku.rak_buku')
					 ->from('data_buku as buku')
					 ->join('data_kategori as kategori', 'buku.kategori = kategori.id_kategori')
					 ->get()
					 ->result_array();
		$data['fields'] = $this->db->list_fields('data_buku');
		$this->load->view('v_home', $data);
	}
}