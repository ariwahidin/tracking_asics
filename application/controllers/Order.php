<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model(['order_m']);
	}

	public function index()
	{
		$this->load->view('order/index');
	}

	public function getOrder()
	{
		$order = $this->order_m->getOrder();
		$data = array(
			'order' => $order
		);
		$content = $this->load->view('order/order', $data, true);
		$response = array(
			'content' => $content,
			'rows' => $order->num_rows()
		);
		echo json_encode($response);
	}

	public function scan()
	{
		// redirect("http://" . $_SERVER['HTTP_HOST'] . "/jsQR/docs/index.html");
		$this->load->view('order/qr_scan');
	}

	public function tracking()
	{
		if ($this->input->get('spk')) {
			$data = array();
			$this->load->view('tracking/index', $data);
		} else {
			show_404();
		}
	}

	public function trackingSPK()
	{
	}
}
