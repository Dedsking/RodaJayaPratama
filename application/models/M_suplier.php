<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_suplier extends CI_Model
{

    public function get_all_data()
    {

        $this->db->select('*');

        $this->db->from('suplier');

        $this->db->order_by('id_suplier', 'desc');
        return $this->db->get()->result();
    }

    public function add($data)
    {

        $this->db->insert('suplier', $data);
    }

    public function edit($data)
    {

        $this->db->where('id_suplier', $data['id_suplier']);

        $this->db->update('suplier', $data);
    }

    public function delete($data)
    {

        $this->db->where('id_suplier', $data['id_suplier']);

        $this->db->delete('suplier', $data);
    }
}
