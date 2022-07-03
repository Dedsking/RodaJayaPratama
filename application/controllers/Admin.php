<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_admin');
        $this->load->model('m_pesanan_masuk');
    }


    public function index()
    {
        $data = array(
            'title' => 'Dashboard',
            'total_barang' => $this->m_admin->total_barang(),
            'total_kategori' => $this->m_admin->total_kategori(),
            'total_pesanan_masuk' => $this->m_admin->total_pesanan_masuk(),
            'total_pesanan_bayar' => $this->m_admin->total_pesanan_bayar(),
            'peringatan_stok' => $this->m_admin->peringatan_stok(),
            'peringatan_stoks' => $this->m_admin->peringatan_stoks(),
            'total_pelanggan' => $this->m_admin->total_pelanggan(),
            'isi' => 'v_admin',

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function data_masuk()
    {
        $total_pesanan_masuk = $this->m_admin->total_pesanan_masuk();

        echo $total_pesanan_masuk;
    }
    public function data_bayar()
    {
        $total_pesanan_bayar = $this->m_admin->total_pesanan_bayar();

        echo $total_pesanan_bayar;
    }

    public function setting()
    {
        $this->form_validation->set_rules(
            'nama_toko',
            'Nama Toko',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'kota',
            'Kota',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'alamat_toko',
            'Alamat Toko',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'no_tlp',
            'No Telepon',
            'required',
            array('required' => '%s Harus Diisi !!')
        );


        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Settting',
                'setting' => $this->m_admin->data_setting(),
                'isi' => 'v_setting',

            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_tlp' => $this->input->post('no_tlp'),
            );
            $this->m_admin->edit($data);
            $this->session->set_flashdata('pesan', 'Settingan berhasil diubah !!!');
            redirect('admin/setting');
        }
    }

    public function pesanan_masuk()
    {
        $data = array(
            'title' => 'Pesanan Masuk',
            'pesanan' => $this->m_pesanan_masuk->pesanan(),
            'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
            'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
            'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
            'cek_barang_selesai' => $this->m_pesanan_masuk->cek_barang_selesai(),
            'isi' => 'v_pesanan_masuk',

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function proses($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil diproses / dikemas !!!');

        redirect('admin/pesanan_masuk', 'refresh');
    }
    public function kirim($id_transaksi)
    {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2',
            'status_bayar' => '2',
        );
        $this->m_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan', 'Pesanan berhasil dikirim !!!');

        redirect('admin/pesanan_masuk', 'refresh');
    }

    //menampilkan data pelanggan
    public function pelanggan()
    {
        $data = array(
            'title' => 'Pelanggan',
            'pelanggan' => $this->m_admin->pelanggan(),
            'isi' => 'v_pelanggan',

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    //menghapus pelanggan
    public function delete($id_pelanggan = NULL)
    {
        $data = array('id_pelanggan' => $id_pelanggan);
        $this->m_admin->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
        redirect('admin/pelanggan');
    }

    //cetak alamat pelanggan untuk pengiriman
    public function cetak_alamat($id_transaksi)
    {
        $data = array(
            'title' => 'Cetak Alamat Pengiriman',
            'cetak_alamat' => $this->m_pesanan_masuk->cetak_alamat($id_transaksi),
            'isi' => 'v_cetak_alamat',

        );
        $this->load->view('v_cetak_alamat', $data, FALSE);
    }
}

/* End of file Controllername.php */
