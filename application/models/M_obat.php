<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_obat extends CI_Model
{
    public function tambah($data)
    {
        $this->db->insert('obat', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function getObat()
    {
        $hasil = $this->db->select('*')
            ->from('Obat')
            ->join('suplier', 'obat.id_suplier=suplier.id_suplier')
            ->get()->result_array();
        return $hasil;
    }

    public function update($data)
    {
        $this->db->update('obat', $data, ['kode_obat' => $data['kode_obat']]);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function hapus($id)
    {
        $this->db->delete('obat', ['kode_obat' => $id]);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function getObatId($id)
    {
        $hasil = $this->db->get_where('obat', ['kode_obat' => $id]);
        return $hasil->row_array();
    }
}
