<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Suplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_suplier');
        $this->load->model('m_admin');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'suplier',
            'suplier' => $this->m_suplier->get_all_data(),
            'isi' => 'v_suplier'

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $data = array(
            'nama_suplier' => $this->input->post('nama_suplier'),
            'alamat_suplier' => $this->input->post('alamat_suplier')
        );
        $this->m_suplier->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!!!');
        redirect('suplier');
    }

    //Update one item
    public function update($id_suplier = NULL)
    {
        $data = array(
            'id_suplier' => $id_suplier,
            'nama_suplier' => $this->input->post('nama_suplier'),
            'alamat_suplier' => $this->input->post('alamat_suplier')
        );
        $this->m_suplier->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!!!');
        redirect('suplier');
    }

    //Delete one item
    public function delete($id_suplier = NULL)
    {
        $data = array('id_suplier' => $id_suplier);
        $this->m_suplier->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
        redirect('suplier');
    }
}

/* End of file Kategori.php */
