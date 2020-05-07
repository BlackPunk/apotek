<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function getTransaksi()
    {
        $hasil = $this->db->select('*')
            ->from('transaksi')
            ->get()->result_array();
        return $hasil;
    }
    public function tambah($data)
    {
        $this->db->insert('transaksi', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }
}
