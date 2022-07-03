<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_fotobarang extends CI_Model
{

    public function get_all_data()
    {

        $this->db->select('barang.*,COUNT(foto.id_barang) as total_gambar');

        $this->db->from('barang');

        $this->db->join('foto', 'foto.id_barang = barang.id_barang', 'left');

        $this->db->group_by('barang.id_barang');

        $this->db->order_by('barang.id_barang', 'desc');
        return $this->db->get()->result();
    }

    public function get_foto($id_barang)
    {

        $this->db->select('*');

        $this->db->from('foto');

        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->result();
    }

    public function get_data($id_foto)
    {

        $this->db->select('*');

        $this->db->from('foto');

        $this->db->where('id_foto', $id_foto);
        return $this->db->get()->row();
    }


    public function add($data)
    {

        $this->db->insert('foto', $data);
    }

    public function delete($data)
    {

        $this->db->where('id_foto', $data['id_foto']);

        $this->db->delete('foto', $data);
    }
}
