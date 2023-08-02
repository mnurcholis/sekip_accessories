<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'regions_model' => 'region',
        ));
        $this->load->library('form_validation');
    }

    public function provinsi()
    {
        $provinsi = $this->input->get('provinsi');

        $response = $this->region->get_kabupaten($provinsi);

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function kabupaten()
    {
        $kabupaten = $this->input->get('kabupaten');

        $response = $this->region->get_kecamatan($kabupaten);

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function kecamatan()
    {
        $kecamatan = $this->input->get('kecamatan');

        $response = $this->region->get_kelurahan($kecamatan);

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function kelurahan()
    {
        $kelurahan = $this->input->get('kelurahan');
        $provinsi = $this->input->get('provinsi');
        $kabupaten = $this->input->get('kabupaten');
        $kecamatan = $this->input->get('kecamatan');

        $response = [
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ];

        $response = $this->db->query("SELECT * FROM regions WHERE province='$provinsi' AND district='$kabupaten' AND subdistrict='$kecamatan' AND area='$kelurahan'")->row();

        $response = json_encode($response->city_ro);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function cek_ongkir()
    {
        $city_origin = $this->input->post('city_origin');
        $city_destination = $this->input->post('city_destination') ?? '278';
        $courier = $this->input->post('courier');
        $weight = $this->input->post('weight');


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $city_origin . "&destination=" . $city_destination . "&weight=200&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 87ad5c88a0a97bb8cab0c2f25ae82ca9"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}
