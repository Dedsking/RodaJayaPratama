<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }

    public function register()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama Pelanggan',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|is_unique[pelanggan.email]',
            array(
                'required' => '%s Harus Diisi !!',
                'is_unique' => '%s Email ini sudah terdaftar !!'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Harus Diisi !!')
        );
        $this->form_validation->set_rules(
            'ulangi_password',
            'Ulangi Password',
            'required|matches[password]',
            array(
                'required' => '%s Harus Diisi !!',
                'matches' => '%s , password tidak sama !!'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi' => 'v_register',

            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Selamat register berhasil, Silahkan login kembali !!!');
            redirect('pelanggan/register');
        }
    }
    public function login()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required',
            array(
                'required' => '%s Harus Diisi !!!'
            )
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s Harus Diisi !!!'
            )
        );

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->pelanggan_login->login($email, $password);
        }

        $data = array(
            'title' => 'Login Pelanggan',
            'isi' => 'v_login_pelanggan',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function logout()
    {
        $this->cart->destroy();
        $this->pelanggan_login->logout();
    }
    public function akun()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            'get_data_pelanggan' => $this->m_pelanggan->get_data_pelanggan(),
            'isi' => 'v_akun_saya',

        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    }
    public function update($id_pelanggan = NULL)
    {
        $config['upload_path'] = './assets/foto/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|ico|jfif';
        $config['max_size']     = '3000';
        $this->upload->initialize($config);
        $field_name = "foto";
        if (!$this->upload->do_upload($field_name)) {
            $data = array(
                'title' => 'Akun Saya',
                'get_data_pelanggan' => $this->m_pelanggan->get_data_pelanggan(),
                'isi' => 'v_akun_saya',

            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            //hapus foto
            $akun_saya =  $this->m_pelanggan->pelanggan($id_pelanggan);
            if ($akun_saya->foto != '') {
                unlink('./assets/foto/' . $akun_saya->foto);
            }

            //end hapus foto

            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './assets/foto/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);

            $data = array(
                'id_pelanggan' => $id_pelanggan,
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
                'no_tlp' => $this->input->post('no_tlp'),
                'foto' => $upload_data['uploads']['file_name'],
            );
            $this->m_pelanggan->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diganti !!!');
            redirect('pelanggan/akun');
        }

        $data = array(
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
            'no_tlp' => $this->input->post('no_tlp'),
        );
        $this->m_pelanggan->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Diedit!!!');
        redirect('pelanggan/akun');
    }
}
