<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('transactions_model');

    }
	public function index()
	{
		
		$this->load->model('Product_model');
        $data['products'] = $this->Product_model->getProducts();
		
		$this->load->view('templates/header');
		$this->load->view('home/index', $data);
		$this->load->view('templates/footer');

	}

}
