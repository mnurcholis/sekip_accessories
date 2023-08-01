<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suppliers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'supplier_model' => 'supplier',
            'product_model' => 'product',
        ));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $params['title'] = 'Kelola Suppliers Produk';

        $data['products'] = $this->product->get_all_products_supplier();

        $this->load->view('header', $params);
        $this->load->view('suppliers/suppliers', $data);
        $this->load->view('footer');
    }

    public function supplier_api()
    {
        $action = $this->input->get('action');

        switch ($action) {
            case 'list':
                $categories['data'] = $this->supplier->get_all_suppliers();
                $response = $categories;
                break;
            case 'view_data':
                $id = $this->input->get('id');

                $data['data'] = $this->supplier->supplier_data($id);
                $response = $data;
                break;
            case 'add_supplier':
                $products_id = $this->input->post('products_id');
                $nama_supplier = $this->input->post('nama_supplier');
                $alamat_supplier = $this->input->post('alamat_supplier');
                $stok_barang = $this->input->post('stok_barang');

                $this->supplier->add_supplier($products_id,$nama_supplier,$alamat_supplier,$stok_barang);

                $products = $this->product->product_data($products_id);

                $edit_products['stock'] = ($products->stock + $this->input->post('stok_barang') );
                $this->product->edit_product($products_id, $edit_products);

                $suppliers['data'] = $this->supplier->get_all_suppliers();
                $response = $suppliers;
                break;
            case 'delete_supplier':
                $id = $this->input->post('id');

                //ambil data supplier sebelum diubah
                $sup = $this->supplier->supplier_data($id);

                $products = $this->product->product_data($sup->products_id);

                $edit_products['stock'] = ($products->stock - $sup->stok_barang );
                $this->product->edit_product($sup->products_id, $edit_products);

                $this->supplier->delete_supplier($id);
                $response = array('code' => 204, 'message' => 'Supplier berhasil dihapus!');
                break;
            case 'edit_supplier':
                $id = $this->input->post('id');
                //ambil data supplier sebelum diubah
                $sup = $this->supplier->supplier_data($id);

                $products = $this->product->product_data($sup->products_id);

                $edit_products['stock'] = ($products->stock - $sup->stok_barang ) + $this->input->post('stok_barang');
                $this->product->edit_product($sup->products_id, $edit_products);

                $supplier['nama_supplier'] = $this->input->post('nama_supplier');
                $supplier['alamat_supplier'] = $this->input->post('alamat_supplier');
                $supplier['products_id'] = $this->input->post('products_id');
                $supplier['stok_barang'] = $this->input->post('stok_barang');

                $this->supplier->edit_supplier($id, $supplier);
                $response = array('code' => 201, 'message' => 'Supplier berhasil diperbarui','data' => $products);
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}
