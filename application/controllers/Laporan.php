<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_laporan');
        $this->load->model('m_admin');
    }


    public function index()
    {
        $data = array(
            'title' => 'Laporan Penjualan',
            'tahun' => $this->m_laporan->gettahun(),
            'isi' => 'laporan/v_laporan',

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function filter()
    {
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');


        if ($nilaifilter == 1) {
            $data = array(
                'title' => 'Laporan Penjualan by Tanggal',
                'subtitle' => 'Dari tanggal : ' . $tanggalawal . ' Sampai tanggal : ' . $tanggalakhir . '',
                'datafilter' => $this->m_laporan->filterbytanggal($tanggalawal, $tanggalakhir),
                'isi' => 'laporan/v_hasil_laporan'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } elseif ($nilaifilter == 2) {
            $data = array(
                'title' => 'Laporan Penjualan by Bulan',
                'subtitle' => 'Dari bulan : ' . $bulanawal . ' Sampai bulan : ' . $bulanakhir . ' Tahun : ' . $tahun1 . '',
                'datafilter' => $this->m_laporan->filterbybulan($tahun1, $bulanawal, $bulanakhir),
                'isi' => 'laporan/v_hasil_laporan'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        } elseif ($nilaifilter == 3) {
            $data = array(
                'title' => 'Laporan Penjualan by Tahun',
                'subtitle' => ' Tahun : ' . $tahun2 . '',
                'datafilter' => $this->m_laporan->filterbytahun($tahun2),
                'isi' => 'laporan/v_hasil_laporan'
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }
    }

    // public function lap_harian()
    // {
    //     $tanggal = $this->input->post('tanggal');
    //     $bulan = $this->input->post('bulan');
    //     $tahun = $this->input->post('tahun');

    //     $data = array(
    //         'title' => 'Laporan Penjualan Harian',
    //         'tanggal' => $tanggal,
    //         'bulan' => $bulan,
    //         'tahun' => $tahun,
    //         'lap_harian' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
    //         'isi' => 'v_lap_harian',

    //     );
    //     $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    // }
    // public function lap_bulanan()
    // {
    //     $bulan = $this->input->post('bulan');
    //     $tahun = $this->input->post('tahun');

    //     $data = array(
    //         'title' => 'Laporan Penjualan Bulanan',
    //         'bulan' => $bulan,
    //         'tahun' => $tahun,
    //         'lap_bulanan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
    //         'isi' => 'v_lap_bulanan',

    //     );
    //     $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    // }
    // public function lap_tahunan()
    // {
    //     $tahun = $this->input->post('tahun');

    //     $data = array(
    //         'title' => 'Laporan Penjualan Tahunan',
    //         'tahun' => $tahun,
    //         'lap_tahunan' => $this->m_laporan->lap_tahunan($tahun),
    //         'isi' => 'v_lap_tahunan',

    //     );
    //     $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    // }
}

/* End of file laporan.php */
