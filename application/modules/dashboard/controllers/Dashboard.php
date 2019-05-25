<?php 
/**
* 
*/
class Dashboard extends MY_Controller
{	
	public function index() {
		$data['anggota'] = $this->db->get('data_anggota')->num_rows();
		$data['dipinjam'] = $this->db->get('sys_total_pinjam')->row()->buku_dipinjam;
		$data['buku'] = $this->db->select_sum('stok')->get('data_buku')->row()->stok + $data['dipinjam'];
		$data['kategori'] = $this->db->get('data_kategori')->num_rows();
		$this->my_theme->dashboard('v_dashboard', 'Dashboard', 'Dashboard', $data);
	}
}