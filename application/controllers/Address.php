<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Address extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(['order_m']);
    }

    public function index()
    {
        $this->load->view('order-driver/address');
    }

    public function getBoxOrder()
    {
        if ($this->input->get('spk')) {
            $spk = $this->input->get('spk');
            $order = $this->order_m->get_spk($spk);
            $data = array(
                'order' => $order
            );
            $response = array(
                'box' => $this->load->view('order-driver/box_order', $data, true)
            );

            echo json_encode($response);
        } else {
            show_404();
        }
    }

    public function getHistoryTrack()
    {
        $history = $this->order_m->get_history_spk();
        $response = array(
            'success' => true,
            'data' => $history->result()
        );
        echo json_encode($response);
    }

    public function updateStatusOrder()
    {
        $this->order_m->updateStatusOrder();

        if ($this->db->affected_rows() > 0) {
            echo json_encode(array('success' => true));
            return;
        }

        echo json_encode(array('success' => false));
    }


    public function search()
    {
        $this->load->view('address/search');
    }
}
