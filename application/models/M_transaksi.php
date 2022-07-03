<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function simpan_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }
    public function simpan_rinci_transaksi($data_rinci)
    {
        $this->db->insert('rinci_transaksi', $data_rinci);
    }

    public function failed($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);

        $this->db->delete('transaksi', $data);
    }

    public function belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function diproses()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function dikirim()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    //cek barang sebelum menerima
    public function cek_barang()
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function selesai()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    //cek barang selesai
    public function cek_barang_selesai()
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function detail_pesanan($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    public function upload_bukti($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);

        $this->db->update('transaksi', $data);
    }
}
