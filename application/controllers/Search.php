<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if (!$this->session->userdata('tms_username')) {
			redirect(base_url('auth/index'));
		}
		$this->load->database();
		$this->load->model(['order_m', 'customer_m']);
	}

	public function address()
	{
		$this->load->view('address/search');
	}

	public function getJSONCustomer()
	{
		$bu = $this->input->post('bu');
		$customer = $this->customer_m->getCustomer($bu);
		$response = array(
			'success' => true,
			'data' => $customer->result()
		);
		echo json_encode($response);
	}

	function saveLocationCustomer(){
		$spk = $this->input->post('bu');
		$this->customer_m->saveLocationCustomer($spk);
	}
}
