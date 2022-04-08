<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Userlogin_model extends CI_Model
{


    public function listing()
    {
        $query = $this->db->query("SELECT a.*, i.nama_group, j.nama_akses
            FROM tbl_login as a 
            LEFT JOIN tbl_group as i on a.id_group = i.id_group
            LEFT JOIN tbl_userakses as j on a.id_akses = j.id_akses
            ");

        return $query->result();
    }


    public function detail($id_login)
    {
        $query = $this->db->query("SELECT a.* FROM tbl_login as a 
        where id_login=$id_login");
        return $query->row();
    }
    public function tambah($data)
    {
        $this->db->insert('tbl_login', $data);
        return $this->db->insert_id();
    }
    public function edit($data, $id_login)
    {
        $this->db->where('id_login', $id_login);
        $this->db->update('tbl_login', $data);
    }
    public function hapus($data)
    {
        $this->db->where('id_login', $data['id_login']);
        $this->db->delete('tbl_login', $data);
    }
    public function cek_group($id_group)
    {
        $this->db->select('tbl_login.id_group');
        $this->db->from('tbl_login');
        $this->db->join('tbl_group', 'tbl_login.id_group = tbl_group.id_group', 'LEFT');
        $this->db->where('tbl_login.id_group', $id_group);
        $query = $this->db->get();
        return $query->row();
    }
}
