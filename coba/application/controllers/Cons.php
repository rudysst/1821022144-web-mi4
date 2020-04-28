<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cons extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        check_admin();
        $this->load->model('cons_m');
    }

    public function index()
    {
        $data['row'] = $this->cons_m->get();
        $this->template->load('template', 'cons/cons_data', $data);
    }

    public function add()
    {
        $cons = new stdClass();
        $cons->cons_id = null;
        $cons->kode_alat = null;
        $cons->nama = null;
        $cons->merk = null;
        $cons->jumlah = null;
        $cons->kondisi = null;
        $data = array(
            'page' => 'add',
            'row' => $cons
        );
        $this->template->load('template', 'cons/cons_form', $data);
    }

    public function edit($id)
    {
        $query = $this->cons_m->get($id);
        if ($query->num_rows() > 0) {
            $cons = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $cons
            );
            $this->template->load('template', 'cons/cons_form', $data);
        } else {
            echo "<script>alert('Data tidak Ditemukan');";
            echo "window.location='" . site_url('cons') . "'</script>";
        }
    }

    public function proccess()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->cons_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->cons_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('cons') . "';</script>";
    }

    public function del($id)
    {
        $this->cons_m->del($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil Dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('cons') . "';</script>";
    }
}
