<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mount_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tb_mount');
        if ($id != null) {
            $this->db->where('mount_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function add($post)
    {
        $params = [
            'kode_alat' => $post['kode'],
            'nama' => $post['nama'],
            'merk' => $post['merk'],
            'jumlah' => $post['jumlah'],
            'kondisi' => empty($post['kond']) ? null : $post['kond'],
        ];
        $this->db->insert('tb_mount', $params);
    }

    public function edit($post)
    {
        $params = [
            'kode_alat' => $post['kode'],
            'nama' => $post['nama'],
            'merk' => $post['merk'],
            'jumlah' => $post['jumlah'],
            'kondisi' => empty($post['kond']) ? null : $post['kond'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('mount_id', $post['id']);
        $this->db->update('tb_mount', $params);
    }

    public function del($id)
    {
        $this->db->where('mount_id', $id);
        $this->db->delete('tb_mount');
    }
}
