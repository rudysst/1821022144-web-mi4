<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rock extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// check_not_login();
		check_admin();
		$this->load->model('rock_m');
	}

	public function index()
	{
		$data['row'] = $this->rock_m->get();
		$this->template->load('template', 'rock/rock_data', $data);
	}

	public function add()
	{
		$rock = new stdClass();
		$rock->rock_id = null;
		$rock->kode_alat = null;
		$rock->nama = null;
		$rock->merk = null;
		$rock->jumlah = null;
		$rock->kondisi = null;
		$data = array(
			'page' => 'add',
			'row' => $rock
		);
		$this->template->load('template', 'rock/rock_form', $data);
	}

	public function edit($id)
	{
		$query = $this->rock_m->get($id);
		if ($query->num_rows() > 0) {
			$rock = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $rock
			);
			$this->template->load('template', 'rock/rock_form', $data);
		} else {
			echo "<script>alert('Data tidak Ditemukan');";
			echo "window.location='" . site_url('rock') . "'</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->rock_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->rock_m->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Disimpan');</script>";
		}
		echo "<script>window.location='" . site_url('rock') . "';</script>";
	}

	public function del($id)
	{
		$this->rock_m->del($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script>alert('Data Berhasil Dihapus');</script>";
		}
		echo "<script>window.location='" . site_url('rock') . "';</script>";
	}
}
