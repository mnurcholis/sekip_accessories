<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan_model extends CI_Model
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function count_all_keluhans()
    {
        return $this->db->where('user_id', $this->user_id)->get('keluhans')->num_rows();
    }

    public function get_all_keluhans($limit, $start)
    {
        $keluhans = $this->db->query("
            SELECT r.*, o.order_number
            FROM keluhans r
            JOIN orders o
                ON o.id = r.order_id
            WHERE r.user_id = '$this->user_id'
            LIMIT $start, $limit
        ");

        return $keluhans->result();
    }

    public function write_keluhan($data)
    {
        $this->db->insert('keluhans', $data);

        return $this->db->insert_id();
    }

    public function is_keluhan_exist($id)
    {
        return ($this->db->where(array('id' => $id, 'user_id' => $this->user_id))->get('keluhans')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function keluhan_data($id)
    {
        $review = $this->db->query("
            SELECT r.*, o.order_number
            FROM keluhans r
            JOIN orders o
                ON o.id = r.order_id
            WHERE r.id = '$id'

        ");

        return $review->row();
    }

    public function delete($id)
    {
        return $this->db->where(array('id' => $id, 'user_id' => $this->user_id))->delete('keluhans');
    }
}
