<?php

class Fungsi
{

    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('admin_m');
        $id_admin = $this->ci->session->userdata('idadmin');
        $user_data = $this->ci->admin_m->get($id_admin)->row();
        return $user_data;
    }
}
