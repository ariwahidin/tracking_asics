<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		if (!$this->session->userdata('tms_username')) {
			redirect(base_url('auth/index'));
		}
		// $this->load->database();
		// $this->load->model(['order_m']);
	}

	public function index()
	{
		$this->load->view('order/index');
	}
}
