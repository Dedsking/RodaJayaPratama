<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{

    public function gettahun()
    {
        $query = $this->db->query("SELECT YEAR(tgl_order) AS tahun FROM transaksi GROUP BY YEAR(tgl_order) ORDER BY YEAR(tgl_order) ASC");
        return $query->result();
    }
    public function filterbytanggal($tanggalawal, $tanggalakhir)
    {

        $query = $this->db->query("SELECT *,COUNT(rinci_transaksi.id_barang) as jml_item, SUM(rinci_transaksi.qty) as jml_qty, SUM(rinci_transaksi.qty * barang.harga_jual) as jml_harga from transaksi INNER JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order Inner Join barang on rinci_transaksi.id_barang=barang.id_barang where tgl_order BETWEEN '$tanggalawal' and '$tanggalakhir' and status_bayar=2 GROUP by transaksi.no_order ORDER BY tgl_order ASC ");
        return $query->result();
    }
    public function filterbybulan($tahun1, $bulanawal, $bulanakhir)
    {
        $query = $this->db->query("SELECT *,COUNT(rinci_transaksi.id_barang) as jml_item, SUM(rinci_transaksi.qty) as jml_qty, SUM(rinci_transaksi.qty * barang.harga_jual) as jml_harga from transaksi  INNER JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order Inner Join barang on rinci_transaksi.id_barang=barang.id_barang  where YEAR(tgl_order) = '$tahun1' and MONTH(tgl_order) BETWEEN '$bulanawal' and '$bulanakhir' and status_bayar=2 GROUP by transaksi.no_order ORDER BY tgl_order ASC");
        return $query->result();
    }
    public function filterbytahun($tahun2)
    {
        $query = $this->db->query("SELECT *,COUNT(rinci_transaksi.id_barang) as jml_item, SUM(rinci_transaksi.qty) as jml_qty, SUM(rinci_transaksi.qty * barang.harga_jual) as jml_harga from transaksi  INNER JOIN rinci_transaksi ON transaksi.no_order=rinci_transaksi.no_order Inner Join barang on rinci_transaksi.id_barang=barang.id_barang where YEAR(tgl_order) = '$tahun2' and status_bayar=2 GROUP by transaksi.no_order ORDER BY tgl_order ASC");
        return $query->result();
    }

    public function cek($id_transaksi)
    {
        $this->db->select('*');
        $this->db->from('rinci_transaksi');
        $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
        $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->where('status_bayar=2');
        return $this->db->get()->result();
    }

    // public function lap_harian($tanggal, $bulan, $tahun)
    // {
    //     $this->db->select('*');
    //     $this->db->from('rinci_transaksi');
    //     $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
    //     $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
    //     $this->db->where('DAY(transaksi.tgl_order)', $tanggal);
    //     $this->db->where('MONTH(transaksi.tgl_order)', $bulan);
    //     $this->db->where('YEAR(transaksi.tgl_order)', $tahun);
    //     $this->db->where('status_bayar=2');
    //     return $this->db->get()->result();
    // }
    // public function lap_bulanan($bulan, $tahun)
    // {
    //     $this->db->select('*');
    //     $this->db->from('rinci_transaksi');
    //     $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
    //     $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
    //     $this->db->where('MONTH(tgl_order)', $bulan);
    //     $this->db->where('YEAR(tgl_order)', $tahun);
    //     $this->db->where('status_bayar=2');

    //     return $this->db->get()->result();
    // }
    // public function lap_tahunan($tahun)
    // {
    //     $this->db->select('*');
    //     $this->db->from('rinci_transaksi');
    //     $this->db->join('transaksi', 'transaksi.no_order = rinci_transaksi.no_order', 'left');
    //     $this->db->join('barang', 'barang.id_barang = rinci_transaksi.id_barang', 'left');
    //     $this->db->where('YEAR(tgl_order)', $tahun);
    //     $this->db->where('status_bayar=2');

    //     return $this->db->get()->result();
    // }
}

/* End of file M_laporan.php */
