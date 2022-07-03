<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    public function get_all_data()
    {

        $this->db->select('*');

        $this->db->from('barang');

        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier', 'left');

        $this->db->order_by('barang.id_barang', 'desc');
        return $this->db->get()->result();
    }
    public function get_all_data_kategori()
    {

        $this->db->select('*');

        $this->db->from('kategori');

        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function detail_barang($id_barang)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier', 'left');
        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->row();
    }

    public function kategori($id_kategori)
    {
        $this->db->select('*');

        $this->db->from('kategori');

        $this->db->where('id_kategori', $id_kategori);


        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->row();
    }

    public function get_all_data_barang($id_kategori)
    {

        $this->db->select('*');

        $this->db->from('barang');

        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier', 'left');

        $this->db->where('barang.id_kategori', $id_kategori);
        return $this->db->get()->result();
    }

    public function foto_barang($id_barang)
    {

        $this->db->select('*');

        $this->db->from('foto');

        $this->db->where('id_barang', $id_barang);
        return $this->db->get()->result();
    }
    //fungsi cari
    public function cari_barang($keyword)
    {
        $this->db->select('*');

        $this->db->from('barang');

        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier', 'left');
        $this->db->like('nama_barang', $keyword);
        return $this->db->get()->result();
    }
}
