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
        if (isset($_GET['spk'])) {
            $spk = $_GET['spk'];
            $this->load->database();
            $sql = "SELECT DISTINCT a.order_id, a.ship_to, a.destination_city, 
            b.cust_name, b.cust_addr1,
            (SELECT order_status FROM order_d_status 
            WHERE order_id = a.order_id 
            AND ship_to = a.ship_to
            AND order_status = 'truck_arrival'
            ) AS arrival_status,
            (SELECT order_status FROM order_d_status 
            WHERE order_id = a.order_id 
            AND ship_to = a.ship_to
            AND order_status = 'truck_unloading'
            ) AS unloading_status
            FROM order_d a
            INNER JOIN customer b ON a.ship_to = b.cust_id
            WHERE a.order_id = '$spk'
            GROUP BY a.ship_to";

            $query = $this->db->query($sql);

            $data = array(
                'order' => $query
            );

            $response = array(
                'box' => $this->load->view('order-driver/box_order', $data, true)
            );

            echo json_encode($response);
        }
    }

    public function barangSampai()
    {
        $this->order_m->barangSampai();

        if ($this->db->affected_rows() > 0) {
            echo json_encode(array('success' => true));
            return;
        }

        echo json_encode(array('success' => false));
    }

    public function truckUnloading()
    {
        $this->order_m->barangSampai();
        $this->order_m->truckUnloading();

        if ($this->db->affected_rows() > 0) {
            echo json_encode(array('success' => true));
            return;
        }

        echo json_encode(array('success' => false));
    }


    public function search(){
        $this->load->view('address/search');
    }
}
