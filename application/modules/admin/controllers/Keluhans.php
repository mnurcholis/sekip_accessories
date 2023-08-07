<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'keluhan_model' => 'keluhan',
        ));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $params['title'] = 'Kelola Keluhans Produk';

        $data['keluhans'] = $this->keluhan->get_all_keluhans();

        $this->load->view('header', $params);
        $this->load->view('keluhans/keluhans', $data);
        $this->load->view('footer');
    }

    public function lihat($id = 0)
    {
        if ($this->keluhan->is_keluhan_exist($id)) {
            $data = $this->keluhan->keluhan_data($id);

            $params['title'] = 'Lihat ' . $data->name;

            $keluhan['flash'] = $this->session->flashdata('lihat_keluhan_flash');
            $keluhan['keluhan'] = $data;

            $this->load->view('header', $params);
            $this->load->view('keluhans/lihat_keluhan', $keluhan);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function verify()
    {
        $id = $this->input->post('id');
        $keluhan['balasan_keluhan'] = $this->input->post('balasan_keluhan');

        $this->keluhan->edit_keluhan($id, $keluhan);
        $this->session->set_flashdata('lihat_keluhan_flash', 'Keluhan berhasil direpons!');

        redirect('admin/keluhans/lihat/' . $id);
    }

    public function keluhan_api()
    {
        $action = $this->input->get('action');

        switch ($action) {
            case 'list':
                $keluhan['data'] = $this->keluhan->get_all_keluhans();
                $response = $keluhan;
                break;
            case 'delete_supplier':
                $id = $this->input->post('id');

                //ambil data supplier sebelum diubah
                $sup = $this->supplier->supplier_data($id);

                $products = $this->product->product_data($sup->products_id);

                $edit_products['stock'] = ($products->stock - $sup->stok_barang);
                $this->product->edit_product($sup->products_id, $edit_products);

                $this->supplier->delete_supplier($id);
                $response = array('code' => 204, 'message' => 'Supplier berhasil dihapus!');
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}
