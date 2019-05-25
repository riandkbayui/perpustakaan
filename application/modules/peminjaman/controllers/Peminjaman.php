<?php
/**
* 
*/
class Peminjaman extends MY_Controller
{

	protected $tabel = 'data_peminjaman';
	protected $key = 'no';
	protected $alert = 'Peminjaman Buku';
	
	public function index() {
		$data['data_peminjaman'] = $this->db->select('pmj.no, agt.nama, bku.judul_buku, pmj.tanggal_pinjam, pmj.tanggal_kembali, sts.nama as status')
											->from('data_peminjaman as pmj')
											->join('data_anggota as agt', 'agt.id_anggota = pmj.id_anggota')
											->join('data_buku as bku', 'bku.id_buku = pmj.id_buku')
											->join('sys_status_peminjaman as sts', 'sts.id_status = pmj.status')
											->order_by('tanggal_pinjam', 'desc')
											->get()
											->result_array();
		$this->my_theme->content('v_peminjaman', 'Peminjaman', 'Tabel Peminjaman', $data);
	}

	public function report() {
		$this->my_theme->content('v_report', 'Peminjaman', 'Report');
	}

	public function tambah() {
		$data['fields'] = $this->db->list_fields('data_peminjaman');
		$data['buku'] = $this->db->get('data_buku')->result_array();
		$data['anggota'] = $this->db->get('data_anggota')->result_array();
		$this->my_theme->content('v_tambah', 'Tambah Data', 'form', $data);
	}

	public function update($no) {
		$data['data_peminjaman'] = $this->db->select('pmj.no, pmj.id_anggota, pmj.id_buku, agt.nama, bku.judul_buku, pmj.tanggal_pinjam, pmj.tanggal_kembali, sts.nama as status, sts.id_status')
											->from('data_peminjaman as pmj')
											->join('data_anggota as agt', 'agt.id_anggota = pmj.id_anggota')
											->join('data_buku as bku', 'bku.id_buku = pmj.id_buku')
											->join('sys_status_peminjaman as sts', 'sts.id_status = pmj.status')
											->where('no', $no)
											->get()
											->row();
		$data['fields'] = $this->db->list_fields('data_peminjaman');
		$data['buku'] = $this->db->get('data_buku')->result_array();
		$data['anggota'] = $this->db->get('data_anggota')->result_array();
		$this->my_theme->content('v_update', 'Tambah Data', 'form', $data);
	}

	public function crud_pengembalian($no) {
		$this->db->set('status', '1')->where('no', $no)->update($this->tabel);
		// transaksi
		$data = $this->db->where('no', $no)->get($this->tabel)->row_array();
		$stok = $this->db->where('id_buku', $data['id_buku'])->get('data_buku')->row()->stok;
		$stok++;
		$this->db->set('stok', $stok)->where('id_buku', $data['id_buku'])->update('data_buku');
		$total_pinjam = $this->db->get('sys_total_pinjam')->row()->buku_dipinjam;
		$total_pinjam--;
		$this->db->set('buku_dipinjam', $total_pinjam)->update('sys_total_pinjam');
		// end
		$this->session->set_flashdata('message', '<strong>Berhasil!</strong> '.$this->alert.' telah dikembalikan.');
		redirect(base_url($this->router->fetch_class()));
		die();
	}

	public function crud_tambah() {
		$data = $this->input->post();
		$data['status'] = '2';
		// transaksi
		$stok = $this->db->where('id_buku', $data['id_buku'])->get('data_buku')->row()->stok;
		$stok--;
		$this->db->set('stok', $stok)->where('id_buku', $data['id_buku'])->update('data_buku');
		$total_pinjam = $this->db->get('sys_total_pinjam')->row()->buku_dipinjam;
		$total_pinjam++;
		$this->db->set('buku_dipinjam', $total_pinjam)->update('sys_total_pinjam');
		// end
		$this->db->insert($this->tabel, $data);
		$this->session->set_flashdata('message', '<strong>Berhasil!</strong> '.$this->alert.' telah ditambahkan.');
		redirect(base_url($this->router->fetch_class()));
		die();
	}

	public function crud_update($id) {
		$data = $this->input->post();
		if ($data['status'] > 1) {
			// transaksi
			$stok = $this->db->where('id_buku', $data['id_buku'])->get('data_buku')->row()->stok;
			$stok--;
			$this->db->set('stok', $stok)->where('id_buku', $data['id_buku'])->update('data_buku');
			$total_pinjam = $this->db->get('sys_total_pinjam')->row()->buku_dipinjam;
			$total_pinjam++;
			$this->db->set('buku_dipinjam', $total_pinjam)->update('sys_total_pinjam');
			// end
		} else {
			// transaksi
			$stok = $this->db->where('id_buku', $data['id_buku'])->get('data_buku')->row()->stok;
			$stok++;
			$this->db->set('stok', $stok)->where('id_buku', $data['id_buku'])->update('data_buku');
			$total_pinjam = $this->db->get('sys_total_pinjam')->row()->buku_dipinjam;
			$total_pinjam--;
			$this->db->set('buku_dipinjam', $total_pinjam)->update('sys_total_pinjam');
			// end
		}
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