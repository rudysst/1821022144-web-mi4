<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pinjam extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		check_admin();
		$this->load->model('pinjam_m');
	}

	public function index()
	{
		$data['row'] = $this->pinjam_m->get();
		$this->template->load('template', 'peminjaman/pinjam_data', $data);
	}

	public function add()
	{
		$pinjam = new stdClass();
		$pinjam->kode_pinjam = null;
		$pinjam->tgl_pinjam = null;
		$pinjam->tgl_kembali = null;
		$pinjam->koordinator = null;
		$pinjam->peminjam = null;
		$pinjam->no_hp = null;
		$pinjam->tujuan = null;
		$pinjam->nama_alat = null;
		$pinjam->jumlah = null;
		$pinjam->kondisi = null;
		$data = array(
			'page' => 'add',
			'row' => $pinjam
		);
		$this->template->load('template', 'peminjaman/pinjam_form', $data);
	}

	public function edit($id)
	{
		$query = $this->pinjam_m->get($id);
		if ($query->num_rows() > 0) {
			$pinjam = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $pinjam
			);
			$this->template->load('template', 'peminjaman/pinjam_form', $data);
		} else {
			echo "<script>alert('Data tidak Ditemukan');";
			echo "window.location='" . site_url('pinjam') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->pinjam_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->pinjam_m->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Disimpan');</script>";
		}
		echo "<script>window.location='" . site_url('pinjam') . "';</script>";
	}

	public function del($id)
	{
		$this->pinjam_m->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('pinjam') . "';</script>";
	}
}
