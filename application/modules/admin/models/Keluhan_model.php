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
}
