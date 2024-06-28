<?php
class Order_m extends CI_Model
{
    public function barangSampai()
    {
        // Mengatur zona waktu ke Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // Mendapatkan data POST
        $post = $this->input->post();
        $date = date('Y-m-d H:i:s');

        $where = array(
            'order_id' => $post['spk'],
            'ship_to' => $post['ship_to'],
            'order_status' => 'truck_arrival',
        );

        // Memeriksa apakah sudah ada entri dengan kondisi tersebut
        $check = $this->db->get_where('order_d_status', $where);
        if ($check->num_rows() < 1) {
            // Menyiapkan data untuk dimasukkan
            $data = array(
                'order_id' => $post['spk'],
                'ship_to' => $post['ship_to'],
                'order_status' => 'truck_arrival',
                'lat' => $post['user_lat'],
                'lon' => $post['user_lon'],
                'address' => $post['user_address'],
                'created_date' => $date,
                'created_by' => $post['user_name']
            );

            // Menyisipkan data baru ke dalam tabel
            $this->db->insert('order_d_status', $data);

            // Memeriksa apakah penyisipan berhasil
            if ($this->db->affected_rows() > 0) {
                // Menyiapkan data untuk pembaruan
                $update_data = array(
                    'rec_date' => $date
                );

                $where_update = array(
                    'order_id' => $post['spk'],
                    'ship_to' => $post['ship_to'],
                );

                // Menentukan kondisi pembaruan
                $this->db->where($where_update);

                // Memperbarui tabel order_d
                $this->db->update('order_d', $update_data);
            }
        }
    }

    public function truckUnloading()
    {
        // Mengatur zona waktu ke Jakarta
        date_default_timezone_set('Asia/Jakarta');

        // Mendapatkan data POST
        $post = $this->input->post();
        $date = date('Y-m-d H:i:s');

        $where = array(
            'order_id' => $post['spk'],
            'ship_to' => $post['ship_to'],
            'order_status' => 'truck_unloading',
        );

        // Memeriksa apakah sudah ada entri dengan kondisi tersebut
        $check = $this->db->get_where('order_d_status', $where);



        if ($check->num_rows() < 1) {
            // Menyiapkan data untuk dimasukkan
            $data = array(
                'order_id' => $post['spk'],
                'ship_to' => $post['ship_to'],
                'order_status' => 'truck_unloading',
                'lat' => $post['user_lat'],
                'lon' => $post['user_lon'],
                'address' => $post['user_address'],
                'created_date' => $date,
                'created_by' => $post['user_name']
            );

            // Menyisipkan data baru ke dalam tabel
            $this->db->insert('order_d_status', $data);

            // Memeriksa apakah penyisipan berhasil
            if ($this->db->affected_rows() > 0) {
                // Menyiapkan data untuk pembaruan
                $update_data = array(
                    'date_unloading' => $date
                );

                $where_update = array(
                    'order_id' => $post['spk'],
                    'ship_to' => $post['ship_to'],
                );


                // Menentukan kondisi pembaruan
                $this->db->where($where_update);

                // Memperbarui tabel order_d
                $this->db->update('order_d', $update_data);
            }
        }
    }

    public function getOrder()
    {
        $search = $this->input->post('search');

        // var_dump($search);

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
}
