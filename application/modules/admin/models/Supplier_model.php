<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_suppliers()
    {
        $data = $this->db->query("
            SELECT *
            FROM suppliers
            JOIN products
                ON suppliers.products_id = products.id")->result();

        return $data;
    }

    public function supplier_data($id)
    {
        return $this->db->where('id_supplier', $id)->get('suppliers')->row();
    }

    public function add_supplier($products_id, $nama_supplier, $alamat_supplier, $stok_barang)
    {
        $this->db->insert('suppliers', array(
            'products_id' => $products_id,
            'nama_supplier' => $nama_supplier,
            'alamat_supplier' => $alamat_supplier,
            'stok_barang' => $stok_barang,
        ));

        return $this->db->insert_id();
    }

    public function edit_supplier($id, $suppliers)
    {
        return $this->db->where('id_supplier', $id)->update('suppliers', $suppliers);
    }

    public function delete_supplier($id)
    {
        return $this->db->where('id_supplier', $id)->delete('suppliers');
    }
}
