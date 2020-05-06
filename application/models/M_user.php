<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function getuser($user, $pass)
    {
        $hasil = $this->db->get_where('user', ['username' => $user, 'password' => $pass]);
        return $hasil->result_array();
    }

    public function getusers()
    {
        $hasil = $this->db->select('*')
            ->from('user')
            ->get()->result_array();
        return $hasil;
    }

    public function tambah($data)
    {
        $this->db->insert('user', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
