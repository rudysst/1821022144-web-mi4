<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// check_already_login();
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$login = $this->db->get_where('login', ['email' => $email])->row_array();

		if ($login) {
			if ($login['is_active'] == 1) {
				if (password_verify($password, $login['password'])) {
					$data = [
						'email' => $login['email'],
						'role_id' => $login['role_id']
					];
					$this->session->set_userdata($data);
					redirect('dashboard');
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password salah! </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email belum di aktifkan! </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
			Email tidak terdaftar! </div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|trim|valid_email|is_unique[login.email]',
			[
				'is_unique' => 'Email sudah di gunakan!'
			]
		);
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[3]|matches[password2]',
			[
				'matches' => 'Password tidak sama!',
				'min_length' => 'password terlalu pendek'
			]
		);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('register');
		} else {
			$data = [
				'name' => $this->input->post('name', true),
				'email' => $this->input->post('email', true),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('login', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat! akun berhasil dibuat. Silahkan login </div>');
			redirect('auth');
		}
	}

	// public function process()
	// {
	// 	$post = $this->input->post(null, TRUE);
	// 	if (isset($post['login'])) {
	// 		$query = $this->admin_m->login($post);
	// 		if ($query->num_rows() > 0) {
	// 			$row = $query->row();
	// 			$params = array(
	// 				'idadmin' => $row->id_admin,
	// 				'level' => $row->level
	// 			);
	// 			$this->session->set_userdata($params);
	// 			echo "<script>
	// 				alert('login berhasil');
	// 				window.location='" . site_url('dashboard') . "';
	// 			</script>";
	// 		} else {
	// 			echo "<script>
	// 				alert('login gagal');
	// 				window.location='" . site_url('auth/login') . "';
	// 			</script>";
	// 		}
	// 	}
	// }

	public function logout()
	{
		$params = array('email', 'role_id');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Berhasil logout! </div>');
		redirect('auth');
	}
}
