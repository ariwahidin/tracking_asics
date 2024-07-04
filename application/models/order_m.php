<?php
class Order_m extends CI_Model
{


    private function get_database_connection($spk_number)
    {
        $prefix = substr($spk_number, 0, 5); // Mengambil 5 karakter pertama dari $spk_number
        if ($prefix === 'SPKAS') {
            return $this->load->database('asics', TRUE);
        } elseif ($prefix === 'SPKNV') {
            return $this->load->database('navya', TRUE);
        } else {
            // Default atau error handling
            return $this->load->database('default', TRUE);
        }
    }

    public function get_spk($spk)
    {
        $db = $this->get_database_connection($spk);
        $sql = "SELECT DISTINCT a.order_id, a.delivery_no, a.ship_to, a.destination_city, 
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
        $query = $db->query($sql);
        return $query;
    }

    public function get_history_spk()
    {
        $spk = $this->input->post('order_id');
        $ship_to = $this->input->post('ship_to');
        $db = $this->get_database_connection($spk);
        $sql = "SELECT * FROM order_d_status WHERE order_id = '$spk' AND ship_to = '$ship_to'";
        $query = $db->query($sql);
        return $query;
    }


    public function updateStatusOrder()
    {
        // Mengatur zona waktu ke Jakarta
        date_default_timezone_set('Asia/Jakarta');
        $post = $this->input->post();
        $date = date('Y-m-d H:i:s');
        $db = $this->get_database_connection($post['spk']);


        $where = array(
            'order_id' => $post['spk'],
            'ship_to' => $post['ship_to'],
            'order_status' => 'goods arrived',
        );

        $check = $db->get_where('order_d_status', $where);
        if ($check->num_rows() < 1) {
            $data = array(
                'order_id' => $post['spk'],
                'ship_to' => $post['ship_to'],
                'delivery_no' => $post['delivery_no'],
                'lokasi_terkini' => $post['lokasi_terkini'],
                'order_status' => $post['status'],
                'lat' => $post['user_lat'],
                'lon' => $post['user_lon'],
                'address' => $post['user_address'],
                'created_date' => $date,
                'created_by' => $post['user_name']
            );
            $db->insert('order_d_status', $data);
        }
    }

    public function getOrder()
    {
        $search = $this->input->post('search');
        $sql = "SELECT a.order_id, a.ship_to, a.delivery_no, a.destination_city, 
        b.cust_name, b.cust_addr1, c.order_date
        FROM order_d a
        INNER JOIN customer b ON a.ship_to = b.cust_id
        INNER JOIN order_h c ON a.order_id = c.order_id";

        if ($search != '') {
            $sql .= " WHERE a.delivery_no LIKE '%$search%' 
                OR b.cust_name LIKE '%$search%'
                OR a.order_id LIKE '%$search%'";
        }

        $sql .= " GROUP BY a.ship_to 
        ORDER BY c.order_date DESC";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getTrackingOrderHeader($spk)
    {
        $sql = "SELECT DISTINCT a.order_id,b.cust_name, b.cust_addr1, a.ship_to
        FROM order_d_status a
        INNER JOIN customer b ON a.ship_to = b.cust_id
        WHERE a.order_id = '$spk'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function getTrackingOrderDetail($spk)
    {
        $sql = "SELECT a.order_id, a.lokasi_terkini, b.cust_name, b.cust_addr1, a.order_status,
        a.ship_to, a.lat, a.lon, a.address, a.created_date, a.created_by 
        FROM order_d_status a
        INNER JOIN customer b ON a.ship_to = b.cust_id
        WHERE a.order_id = '$spk'";
        $query = $this->db->query($sql);
        return $query;
    }
}
