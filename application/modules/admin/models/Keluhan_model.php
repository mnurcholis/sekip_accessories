<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_keluhans()
    {
        $data = $this->db->query("
            SELECT 
            keluhans.id, keluhans.user_id, keluhans.order_id, keluhans.bukti_bayar, keluhans.catatan_keluhan, keluhans.keluhan_date, keluhans.`status`, orders.order_number, orders.order_status, orders.total_items, orders.total_price, users.username, customers.`name`
            FROM keluhans
            JOIN orders ON orders.id = keluhans.order_id
            JOIN users ON users.id = keluhans.user_id
            JOIN customers ON customers.user_id = users.id")->result();
        return $data;
    }

    public function is_keluhan_exist($id)
    {
        return ($this->db->where('id', $id)->get('keluhans')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function keluhan_data($id)
    {
        $data = $this->db->query("
            SELECT 
            keluhans.id, keluhans.balasan_keluhan, keluhans.user_id, keluhans.order_id, keluhans.bukti_bayar, keluhans.catatan_keluhan, keluhans.keluhan_date, keluhans.`status`, orders.order_number, orders.order_status, orders.total_items, orders.total_price, users.username, customers.`name`
            FROM keluhans
            JOIN orders ON orders.id = keluhans.order_id
            JOIN users ON users.id = keluhans.user_id
            JOIN customers ON customers.user_id = users.id
            WHERE keluhans.id = '$id'
        ")->row();

        return $data;
    }

    public function edit_keluhan($id, $keluhan)
    {
        return $this->db->where('id', $id)->update('keluhans', $keluhan);
    }
}
