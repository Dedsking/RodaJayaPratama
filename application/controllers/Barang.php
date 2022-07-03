<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('m_barang');
        $this->load->model('m_kategori');
        $this->load->model('m_suplier');
        $this->load->model('m_admin');
        $this->load->model('m_fotobarang');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Barang',
            'barang' => $this->m_barang->get_all_data(),
            'isi' => 'barang/v_barang',

        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Nama Kategori',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'id_suplier',
            'Nama Suplier',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'p_keuntungan',
            'Keuntungan',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'stok',
            'Stok',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus Diisi !!')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|ico|jfif';
            $config['max_size']     = '3000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Barang',
                    'isi' => 'barang/v_add',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'suplier' => $this->m_suplier->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                //harga jual
                $harga = $this->input->post('harga');
                $keuntungan = $this->input->post('p_keuntungan');
                $untung = $harga * $keuntungan / 100;
                $harga_jual = $harga + $untung;

                $data = array(
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'id_suplier' => $this->input->post('id_suplier'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $harga,
                    'p_keuntungan' => $keuntungan,
                    'harga_jual' => $harga_jual,
                    'stok' => $this->input->post('stok'),
                    'berat' => $this->input->post('berat'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
                redirect('barang');
            }
        }
        $data = array(
            'title' => 'Add Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'suplier' => $this->m_suplier->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'barang/v_add'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }


    //Update one item  
    public function edit($id_barang = NULL)
    {
        $this->form_validation->set_rules(
            'nama_barang',
            'Nama Barang',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'id_kategori',
            'Nama Kategori',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'id_suplier',
            'Nama Suplier',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'p_keuntungan',
            'Keuntungan',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'stok',
            'Stok',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'berat',
            'Berat',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array('required' => '%s Harus Diisi !!')
        );

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/gambar/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png|ico|jfif';
            $config['max_size']     = '3000';
            $this->upload->initialize($config);
            $field_name = "gambar";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Barang',
                    'isi' => 'barang/v_edit',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'suplier' => $this->m_suplier->get_all_data(),
                    'barang' => $this->m_barang->get_data($id_barang),
                    'error_upload' => $this->upload->display_errors(),
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            } else {
                //hapus gambar
                $barang =  $this->m_barang->get_data($id_barang);
                if ($barang->gambar != '') {
                    unlink('./assets/gambar/' . $barang->gambar);
                }

                //end hapus gambar

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/gambar/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                //harga jual
                $harga = $this->input->post('harga');
                $keuntungan = $this->input->post('p_keuntungan');
                $untung = $harga * $keuntungan / 100;
                $harga_jual = $harga + $untung;

                $data = array(
                    'id_barang' => $id_barang,
                    'nama_barang' => $this->input->post('nama_barang'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'id_suplier' => $this->input->post('id_suplier'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga' => $harga,
                    'p_keuntungan' => $keuntungan,
                    'harga_jual' => $harga_jual,
                    'stok' => $this->input->post('stok'),
                    'berat' => $this->input->post('berat'),
                    'gambar' => $upload_data['uploads']['file_name'],
                );
                $this->m_barang->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
                redirect('barang');
            }
            //tanpa editgambar
            $data = array(
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'id_kategori' => $this->input->post('id_kategori'),
                'id_suplier' => $this->input->post('id_suplier'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'berat' => $this->input->post('berat'),
            );
            $this->m_barang->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
            redirect('barang');
        }

        $data = array(
            'title' => 'Edit Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'fotobarang' => $this->m_fotobarang->get_foto($id_barang),
            'suplier' => $this->m_suplier->get_all_data(),
            'barang' => $this->m_barang->get_data($id_barang),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'barang/v_edit'
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete($id_barang = NULL)
    {
        //hapus gambar
        $barang =  $this->m_barang->get_data($id_barang);
        if ($barang->gambar != '') {
            unlink('./assets/gambar/' . $barang->gambar);
        }

        //end hapus gambar
        $data = array('id_barang' => $id_barang);
        $this->m_barang->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!!!');
        redirect('barang');
    }
    //tambah stok
    public function tambah_stok()
    {
        if (isset($_POST['simpan'])) {
            $stok_awal = $this->input->post('stok_awal');
            $stok_in = $this->input->post('stok_in');
            $stok_akhir = $stok_awal + $stok_in;

            $data = array(
                'id_barang' => $this->input->post('id_barang'),
                'stok' => $stok_akhir,
            );

            $this->m_barang->tambah_stok($data);
            $this->session->set_flashdata('pesan', 'Stok berhasil ditambahkan !!!');
            redirect('barang');
        } else {
            $data = array(
                'title' => 'Tambah Stok Barang',
                'isi' => 'barang/v_tambah_stok',
                'barang' => $this->m_barang->get_all_data(),
                'error_upload' => $this->upload->display_errors(),
            );
            $this->load->view('layout/v_wrapper_backend', $data, FALSE);
        }
    }
}

    
/* End of file Controllername.php */
