<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function total_barang()
    {
        return $this->db->get('barang')->num_rows();
    }

    public function total_kategori()
    {
        return $this->db->get('kategori')->num_rows();
    }

    public function total_pesanan_masuk()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=0');
        return $this->db->get()->num_rows();
    }
    public function total_pesanan_bayar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_bayar=1');
        return $this->db->get()->num_rows();
    }
    public function peringatan_stok()
    {
        $i = array('5', '4', '3', '2', '1', '0');
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where_in('stok', $i);
        return $this->db->get()->result();
    }
    public function peringatan_stoks()
    {
        $i = array('5', '4', '3', '2', '1', '0');
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where_in('stok', $i);
        return $this->db->get()->num_rows();
    }

    public function total_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        return $this->db->get()->num_rows();
    }

    public function data_setting()
    {

        $this->db->select('*');

        $this->db->from('setting');

        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function edit($data)
    {
        $this->db->where('id', $data['id']);

        $this->db->update('setting', $data);
    }
    //mendapatkan data pelanggan
    public function pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->order_by('id_pelanggan', 'desc');
        return $this->db->get()->result();
    }
    //menghapus data pelanggan
    public function delete($data)
    {

        $this->db->where('id_pelanggan', $data['id_pelanggan']);

        $this->db->delete('pelanggan', $data);
    }
}
