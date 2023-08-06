<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keluhans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('customer');

        $this->load->model(array(
            'payment_model' => 'payment',
            'order_model' => 'order',
            'keluhan_model' => 'keluhan'
        ));

        $this->load->library('form_validation');
    }

    public function index()
    {
        $params['title'] = 'Keluhan Saya';

        $config['base_url'] = site_url('customer/keluhans/index');
        $config['total_rows'] = $this->keluhan->count_all_keluhans();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $keluhans['keluhans'] = $this->keluhan->get_all_keluhans($config['per_page'], $page);
        $keluhans['pagination'] = $this->pagination->create_links();

        $this->load->view('header', $params);
        $this->load->view('keluhans/keluhans', $keluhans);
        $this->load->view('footer');
    }

    public function write()
    {
        $params['title'] = 'Tulis Keluhan';

        $keluhan['orders'] = $this->order->all_orders();

        $this->load->view('header', $params);
        $this->load->view('keluhans/write', $keluhan);
        $this->load->view('footer');
    }

    public function write_me()
    {
        $this->form_validation->set_error_delimiters('<div class="text-danger font-weight-bold">', '</div>');

        $this->form_validation->set_rules('catatan_keluhan', 'Catatan Keluhan', 'required');
        $this->form_validation->set_rules('order_id', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->write();
        } else {
            $catatan_keluhan = $this->input->post('catatan_keluhan');
            $order_id = $this->input->post('order_id');

            $config['upload_path'] = './assets/uploads/keluhans/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5096;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti_bayar')) {
                $data = $this->upload->data();
                $bukti_bayar = $data['file_name'];

                $bukti_bayar_name = $bukti_bayar;
            } else {
                show_error($This->upload->display_errors());
            }

            $this->load->library('upload', $config);

            $data = array(
                'user_id' => get_current_user_id(),
                'catatan_keluhan' => $catatan_keluhan,
                'order_id' => $order_id,
                'bukti_bayar' => $bukti_bayar_name,
                'keluhan_date' => date('Y-m-d H:i:s')
            );

            $id = $this->keluhan->write_keluhan($data);

            $this->session->set_flashdata('review_flash', 'Keluhan berhasil dikirimkan');
            redirect('customer/keluhans/view/' . $id);
        }
    }

    public function view($id = 0)
    {
        if ($this->keluhan->is_keluhan_exist($id)) {
            $data = $this->keluhan->keluhan_data($id);

            $params['title'] = 'Keluhan Order #' . $data->order_number;

            $keluhan['keluhan'] = $data;

            $this->load->view('header', $params);
            $this->load->view('keluhans/view', $keluhan);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function delete($id)
    {
        if ($this->keluhan->is_keluhan_exist($id)) {
            $data = $this->keluhan->keluhan_data($id);
            $file = './assets/uploads/keluhans/' . $data->bukti_bayar;
            unlink($file);

            $this->keluhan->delete($id);

            $this->session->set_flashdata('keluhan_flash', 'Keluhan berhasil dihapus');
            redirect('customer/keluhans');
        } else {
            show_404();
        }
    }
}
