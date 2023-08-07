<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function order_data($where)
    {
        $data = $this->db->query(
            "
            SELECT o.*, c.name, c.code, p.id as payment_id, p.payment_price, p.payment_date, p.picture_name, p.payment_status, p.confirmed_date, p.payment_data,u. NAME AS customer
            FROM orders o
            LEFT JOIN coupons c
                ON c.id = o.coupon_id
            LEFT JOIN payments p
                ON p.order_id = o.id
            LEFT JOIN customers u ON o.user_id = u.user_id
            WHERE " . $where
        );

        return $data->result();
    }
}
