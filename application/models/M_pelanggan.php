<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function register($data)
    {

        $this->db->insert('pelanggan', $data);
    }

    public function get_data_pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->result();
    }

    public function pelanggan()
    {
        $this->db->select('*');
        $this->db->from('pelanggan');
        $this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
        return $this->db->get()->row();
    }

    public function edit($data)
    {

        $this->db->where('id_pelanggan', $data['id_pelanggan']);

        $this->db->update('pelanggan', $data);
    }
}

/* End of file ModelName.php */
