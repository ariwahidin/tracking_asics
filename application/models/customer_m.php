<?php
class Customer_m extends CI_Model
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

    public function getCustomer($spk)
    {
        $db = $this->get_database_connection($spk);
        $sql = "SELECT distinct cust_id, cust_name FROM customer WHERE cust_id != ''";
        $query = $db->query($sql);
        return $query;
    }

    public function saveLocationCustomer($spk){
        $db = $this->get_database_connection($spk);
        $post = $this->input->post();
        $data = array(
            'cust_addr4' => $post['lat'],
            'cust_addr5' => $post['lon'],
            'cust_addr6' => $post['actual_location'],
        );

        var_dump($post);
    }
}
