<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'laporan_model' => 'laporan',
        ));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $params['title'] = 'Laporan';

        $this->load->view('header', $params);
        $this->load->view('laporans/laporans');
        $this->load->view('footer');
    }

    public function cetak_laporan()
    {
        $date_dari = $this->input->post('date_dari');
        $date_sampai = $this->input->post('date_sampai');
        $status = $this->input->post('status');
        $where = '';
        $where = "DATE(o.order_date) BETWEEN '" . $date_dari . "' AND '" . $date_sampai . "' ";
        if ($status > 1) {
            $where .= " AND o.order_status = " . $status;
        }

        $data['orders'] = $this->laporan->order_data($where);
        $this->load->view('laporans/hasil', $data);
    }
}
