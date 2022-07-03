
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->m_auth->login_user($username, $password);
        if ($cek) {
            $username = $cek->username;
            $nama_user = $cek->nama_user;
            //buat session
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama_user', $nama_user);

            redirect('admin');
        } else {
            $this->ci->session->set_flashdata('error', 'username atau password salah ');
            redirect('auth');
        }
    }

    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('username') == "") {
            $this->ci->session->set_flashdata('error', 'anda belum login ');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->set_flashdata('pesan', ' anda berhasil logout');
        redirect('auth');
    }
}

/* End of file LibraryName.php */