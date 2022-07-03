<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_service');
        $this->load->model('m_admin');

        // $this->load->model('m_transaksi');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Service',
            'daftar_service' => $this->m_service->daftar_service(),
            'proses_service' => $this->m_service->proses_service(),
            'selesai_service' => $this->m_service->selesai_service(),
            'isi' => 'service/v_service'

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }


    public function add($id_transaksi)
    {
        $this->form_validation->set_rules(
            'id_barang[]',
            'Barang',
            'required',
            array('required' => 'Silahkan pilih %s, terlebih dahulu !!')
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Proses',
                'pendaftar' => $this->m_service->pendaftar($id_transaksi),
                'barang' => $this->m_service->get_barang(),
                'isi' => 'service/add'

            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } else {

            // update ke table transaksi
            $data = array(
                'id_transaksi' => $id_transaksi,
                'status_order' => '5',
            );

            $this->m_service->update_transaksi($data);

            //simpan ke tabel rinci transaksi
            $id_barang = count($this->input->post('id_barang'));
            for ($i = 0; $i < $id_barang; $i++) {
                $data_rinci[$i] = array(
                    'no_order' => $this->input->post('no_order'),
                    'id_barang' => $this->input->post('id_barang[' . $i . ']'),
                    'qty' => '1',
                );
                $this->db->insert('rinci_transaksi', $data_rinci[$i]);
            }
            //============================================
            $this->session->set_flashdata('pesan', 'Barang berhasil di proses !!!');
            redirect('service/bayar/' . $id_transaksi, 'refresh');
        }
    }
    public function bayar($id_transaksi)
    {
        $data = array(
            'title' => 'Pembayaran',
            'proses' => $this->m_service->proses(),
            'isi' => 'service/v_bayar'

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function ubah($id_transaksi)
    {
        if (isset($_POST['update'])) {
            $id_rinci = count($this->input->post('id_rinci'));
            for ($i = 0; $i < $id_rinci; $i++) {
                $data_rinci[$i] = array(
                    'id_rinci' => $this->input->post('id_rinci[' . $i . ']'),
                    'qty' => $this->input->post('qty[' . $i . ']'),
                );
                // $this->db->update('rinci_transaksi', $data_rinci[$i]);
                $this->m_service->update_rinci($data_rinci[$i]);
            }

            $this->session->set_flashdata('pesan', 'Jumlah berhasil di update !!!');
            redirect('service/bayar/' . $id_transaksi);
        } else if (isset($_POST['simpan'])) {
            //simpan data dengan mengubah status order jadi 6
            $data = array(
                'id_transaksi' => $id_transaksi,
                'grand_total' => $this->input->post('grand_total'),
                'total_bayar' => $this->input->post('total_bayar'),
                'status_order' => '6',
                'status_bayar' => '2',
            );
            // var_dump($data);
            $this->m_service->update_transaksi($data);
            $this->session->set_flashdata('pesan', 'Data berhasil di simpan !!!');
            redirect('service', 'refresh');
        }
    }

    public function hapus($id_transaksi, $id_rinci)
    {
        $data = array('id_rinci' => $id_rinci);
        $this->m_service->hapus_rinci($data);

        redirect('service/bayar/' . $id_transaksi, 'refresh');
    }

    //daftar service
    public function daftar()
    {
        $this->form_validation->set_rules(
            'nama_penerima',
            'Nama',
            'required',
            array('required' => '%s, harus diisi !!')
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array('required' => '%s, harus diisi !!')
        );
        $this->form_validation->set_rules(
            'tgl_order',
            'Tanggal Booking',
            'required',
            array('required' => '%s, harus diisi !!')
        );
        $this->form_validation->set_rules(
            'hp_penerima',
            'No Tlp',
            'required',
            array('required' => '%s, harus diisi !!')
        );

        if ($this->form_validation->run() == FALSE) {
            //proteksi halaman
            $this->pelanggan_login->proteksi_halaman();
            $data = array(
                'title' => 'Daftar Service',
                'data_pelanggan' => $this->m_service->data_pelanggan(),
                'isi' => 'service/v_daftar_service',

            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {

            // update ke table transaksi
            $data = array(
                'id_pelanggan' => $this->session->userdata('id_pelanggan'),
                'no_order' => $this->input->post('no_order'),
                'nama_penerima' => $this->input->post('nama_penerima'),
                'alamat' => $this->input->post('alamat'),
                'tgl_order' => $this->input->post('tgl_order'),
                'hp_penerima' => $this->input->post('hp_penerima'),
                'tgl_daftar' => date('Y-m-d'),
                'status_order' => '4',
            );
            // var_dump($data);
            $this->m_service->simpan_daftar($data);

            //simpan ke tabel transaksi
            //============================================
            $this->session->set_flashdata('pesan', 'Barang berhasil di proses !!!');
            redirect('service/service_saya', 'refresh');
        }
    }

    public function service_saya()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Service Saya',
            'daftar_service_saya' => $this->m_service->daftar_service_saya(),
            'proses_service_saya' => $this->m_service->proses_service_saya(),
            'selesai_service_saya' => $this->m_service->selesai_service_saya(),
            'isi' => 'service/v_service_saya',

        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }


    //cetak nota
    public function cetak_nota($id_transaksi)
    {
        $data = array(
            'title' => 'Nota Pembayaran',
            'cetak_nota' => $this->m_service->cetak_nota($id_transaksi),

        );
        $this->load->view('service/v_cetak_nota', $data, FALSE);
    }
}
