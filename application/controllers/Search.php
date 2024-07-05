<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
	public function address()
	{
		$this->load->view('address/search');
	}
}
