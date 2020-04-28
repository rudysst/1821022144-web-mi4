<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        check_admin();
        $this->load->model('admin_m');
        $this->load->library('form_validation');
    }
	
	public function index()
	{
        $data['row'] = $this->admin_m->get();
		$this->template->load('template', 'user/user_data', $data);
    }
    
    public function add()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[tb_admin.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('pascon', 'Konfirmasi Password', 'required|matches[password]',
            array('matches' => '%s tidak sesuai dengan Password'));
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai, silahkan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_form_add');
        } else {
            $post = $this->input->post(null, TRUE);
            $this->admin_m->add($post);
            if($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil Disimpan')</script>";
            }
            echo "<script>window.location='".site_url('user')."'</script>";
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('pascon', 'Konfirmasi Password', 'matches[password]',
                array('matches' => '%s tidak sesuai dengan Password'));
        }
        if($this->input->post('pascon')) {
            $this->form_validation->set_rules('pascon', 'Konfirmasi Password', 'matches[password]',
                array('matches' => '%s tidak sesuai dengan Password'));
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai, silahkan ganti');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($this->form_validation->run() == FALSE) {
            $query = $this->admin_m->get($id);
            if($query->num_rows() > 0) { 
                $data['row'] = $query->row();
            $this->template->load('template', 'user/user_form_edit', $data);
        } else {
            echo "<script>alert('Data tidak Ditemukan');";
            echo "window.location='".site_url('user')."'</script>";
        }
    } else {
        $post = $this->input->post(null, TRUE);
        $this->admin_m->edit($post);
        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            }
            echo "<script>window.location='".site_url('user')."'</script>";
        }
    }
    public function username_check() {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM tb_admin WHERE username = '$post[username]' AND id_admin != '$post[id_admin]'");
        if($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '%s ini sudah dipakai, silahkan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del()
	{
        $id = $this->input->post('id_admin');
        $this->admin_m->del($id);

        if($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Dihapus')</script>";
        }
        echo "<script>window.location='".site_url('user')."'</script>";
    }
        
}