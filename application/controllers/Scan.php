<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Scan extends CI_Controller
{
    public function qr()
    {
        $this->load->view('order/qr_scan');
    }
}
