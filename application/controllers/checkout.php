<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('checkouts/index');
		$this->load->view('templates/footer');

	}

    public function success()
	{
		$this->load->view('templates/header');
		$this->load->view('checkouts/success');
		$this->load->view('templates/footer');

	}
}
