<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_model'); // Assuming you have a user model for authentication
	}

	public function index()
	{
		if ($this->session->userdata('tms_username')) {
            redirect(base_url());
        }
		$this->load->view('auth/sign-in');
	}

	public function authenticate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->user_model->authenticate($username, $password);

		if ($user) {
			$this->session->set_userdata('tms_username', $user->username);
			redirect(base_url()); // Redirect to dashboard or other appropriate page
		} else {
			$this->session->set_flashdata('error', 'Invalid username or password');
			$this->session->set_flashdata('username', $username);
            $this->session->set_flashdata('password', $password);
			redirect(base_url('auth/index'));
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('tms_username');
		$this->session->set_flashdata('success', 'You have been logged out');

		echo "<script>
			if ('serviceWorker' in navigator) {
				navigator.serviceWorker.ready.then(function(registration) {
					registration.active.postMessage({ action: 'clearCache' });
				});
			}
			window.location.href = '" . base_url('auth/index') . "';
		</script>";

		// redirect(base_url('auth/index'));
	}
}
