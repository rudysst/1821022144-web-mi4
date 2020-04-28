<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class Admin_m extends CI_Model {
  
    public function login($post)
    {
        // $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null) 
    {
        $this->db->from('tb_admin');
        if($id != null) {
            $this->db->where('id_admin', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['nama'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = md5($post['password']);
        $params['alamat'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $this->db->insert('tb_admin', $params);
    } 

    public function edit($post)
    {
        $params['nama'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])) {
            $params['password'] = md5($post['password']);
        }
        $params['alamat'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $this->db->where('id_admin', $post['id_admin']);
        $this->db->update('tb_admin', $params);
    } 

    public function del($id)
	{
        $this->db->where('id_admin', $id);
        $this->db->delete('tb_admin');
    }
}