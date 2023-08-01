<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regions_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_kabupaten($id)
    {
        $this->db->select('district');
        $this->db->where('province', $id);
        $this->db->group_by('district');
        return $this->db->get('regions')->result();
    }

    public function get_kecamatan($id)
    {
        $this->db->select('subdistrict');
        $this->db->where('district', $id);
        $this->db->group_by('subdistrict');
        return $this->db->get('regions')->result();
    }

    public function get_kelurahan($id)
    {
        $this->db->select('area');
        $this->db->where('subdistrict', $id);
        $this->db->group_by('area');
        return $this->db->get('regions')->result();
    }
}
