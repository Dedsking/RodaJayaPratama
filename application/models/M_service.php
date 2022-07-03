<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Service extends CI_Model
{
    //data pelanggan di tambah service
    public function data_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    //input daftar service pelanggan
    public function simpan_daftar($data)
    {
        $this->db->insert('transaksi', $data);
    }
    //data servis di pelanggan
    public function daftar_service_saya()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=4');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    //proses pelanggan
    public function proses_service_saya()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=5');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function selesai_service_saya()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        $this->db->where('status_order=6');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    //service admin
    public function daftar_service()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=4');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    //proses admin
    public function proses_service()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=5');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    //sesesai admin
    public function selesai_service()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('status_order=6');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function proses()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('rinci_transaksi', 'rinci_transaksi.no_order = transaksi.no_order', 'left');
        $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
        $this->db->where('status_order=5');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function pendaftar($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    //dari service add mengupdate transaksi
    public function update_transaksi($data)
    {
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->update('transaksi', $data);
    }
    //dari service add menyinpam data rinci
    public function simpan_rinci($data_rinci)
    {
        $this->db->insert('rinci_transaksi', $data_rinci);
    }
    //update rinci transaksi
    public function update_rinci($data_rinci)
    {
        $this->db->where('id_rinci', $data_rinci['id_rinci']);
        $this->db->update('rinci_transaksi', $data_rinci);
    }

    public function hapus_rinci($data)
    {
        $this->db->where('id_rinci', $data['id_rinci']);
        $this->db->delete('rinci_transaksi', $data);
    }

    //data barang
    public function get_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        $this->db->join('suplier', 'suplier.id_suplier = barang.id_suplier', 'left');
        return $this->db->get()->result();
    }
    //simpan transaksi di pelaggan
    public function simpan_transaksi($data)
    {
        $this->db->insert('transaksi', $data);
    }
    public function cetak_nota($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->where('status_order=5');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
}
