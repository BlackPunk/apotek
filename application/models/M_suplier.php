<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suplier extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('suplier', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function getSuplier()
    {
        $hasil = $this->db->select('*')
            ->from('suplier')
            ->get()->result_array();
        return $hasil;
    }

    public function update($data)
    {
        $this->db->update('suplier', $data, ['id_suplier' => $data['id_suplier']]);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function hapus($id)
    {
        $this->db->delete('suplier', ['id_suplier' => $id]);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function getSuplierId($id)
    {
        $hasil = $this->db->get_where('suplier', ['id_suplier' => $id]);
        return $hasil->row_array();
    }
}
