<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fotobarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_fotobarang');
        $this->load->model('m_barang');
        $this->load->model('m_admin');
    }

    public function index()
    {
        $data = array(
            'title' => 'Foto Barang',
            'fotobarang' => $this->m_fotobarang->get_all_data(),
            'isi' => 'fotobarang/v_index',

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function add($id_barang)
    {
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan Gambar',
            'required',
            array('required' => '%s Harus Diisi !!')
        );


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/fotobarang/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|ico';
            $config['max_size']     = '3000';
            $this->upload->initialize($config);
            $field_name = "foto";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Barang',
                    'error_upload' => $this->upload->display_errors(),
                    'barang' => $this->m_barang->get_data($id_barang),
                    'fotobarang' => $this->m_fotobarang->get_foto($id_barang),
                    'isi' => 'fotobarang/v_add',

                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/fotobarang/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data = array(
                    'id_barang' => $id_barang,
                    'keterangan' => $this->input->post('keterangan'),
                    'foto' => $upload_data['uploads']['file_name'],
                );
                $this->m_fotobarang->add($data);
                $this->session->set_flashdata('pesan', 'Foto Berhasil Ditambahkan !!!');
                redirect('barang/edit/' . $id_barang);
            }
        }

        $data = array(
            'title' => 'Foto Barang',
            'barang' => $this->m_barang->get_data($id_barang),
            'fotobarang' => $this->m_fotobarang->get_foto($id_barang),
            'isi' => 'fotobarang/v_add',

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    public function delete($id_barang, $id_foto)
    {
        //hapus gambar
        $foto =  $this->m_fotobarang->get_data($id_foto);
        if ($foto->foto != '') {
            unlink('./assets/fotobarang/' . $foto->foto);
        }

        //end hapus gambar
        $data = array('id_foto' => $id_foto);
        $this->m_fotobarang->delete($data);
        $this->session->set_flashdata('pesan', 'Foto Berhasil Dihapus!!!');
        redirect('barang/edit/' . $id_barang, $data);
    }
}


/* End of file Controllername.php */
