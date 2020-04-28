<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pinjam_m extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('tb_pinjam');
        if ($id != null) {
            $this->db->where('pinjam_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'kode_pinjam' => $post['nomor'],
            'tgl_pinjam' => $post['tgl_pinjam'],
            'tgl_kembali' => $post['kembali'],
            'koordinator' => $post['koor'],
            'peminjam' => $post['nama_p'],
            'no_hp' => $post['no_hp'],
            'tujuan' => $post['tujuan'],
            'nama_alat' => $post['nama_a'],
            'jumlah' => $post['jumlah'],
            'kondisi' => empty($post['kondisi']) ? null : $post['kondisi'],
        ];
        $this->db->insert('tb_pinjam', $params);
    }

    public function edit($post)
    {
        $params = [
            'kode_pinjam' => $post['nomor'],
            'tgl_pinjam' => $post['tgl_pinjam'],
            'tgl_kembali' => $post['kembali'],
            'koordinator' => $post['koor'],
            'peminjam' => $post['nama_p'],
            'no_hp' => $post['no_hp'],
            'tujuan' => $post['tujuan'],
            'nama_alat' => $post['nama_a'],
            'jumlah' => $post['jumlah'],
            'kondisi' => empty($post['kondisi']) ? null : $post['kondisi'],
        ];
        $this->db->where('pinjam_id', $post['id']);
        $this->db->update('tb_pinjam', $params);
    }

    public function del($id)
    {
        $this->db->where('pinjam_id', $id);
        $this->db->delete('tb_pinjam');
    }
}
