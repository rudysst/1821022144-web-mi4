<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mount extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        check_admin();
        $this->load->model('mount_m');
    }

    public function index()
    {
        $data['row'] = $this->mount_m->get();
        $this->template->load('template', 'mount/mount_data', $data);
    }

    public function add()
    {
        $mount = new stdClass();
        $mount->mount_id = null;
        $mount->kode_alat = null;
        $mount->nama = null;
        $mount->merk = null;
        $mount->jumlah = null;
        $mount->kondisi = null;
        $data = array(
            'page' => 'add',
            'row' => $mount
        );
        $this->template->load('template', 'mount/mount_form', $data);
    }

    public function edit($id)
    {
        $query = $this->mount_m->get($id);
        if ($query->num_rows() > 0) {
            $mount = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $mount
            );
            $this->template->load('template', 'mount/mount_form', $data);
        } else {
            echo "<script>alert('Data tidak Ditemukan');";
            echo "window.location='" . site_url('mount') . "'</script>";
        }
    }

    public function proccess()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->mount_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->mount_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('mount') . "';</script>";
    }

    public function del($id)
    {
        $this->mount_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('mount') . "';</script>";
    }
}
