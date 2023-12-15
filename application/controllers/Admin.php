<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('transactions_model');

    }
	private function checkSecurityToken() {
		$securityToken = $this->session->userdata('security_token');
	
		if (empty($securityToken)) {
			// Token tidak ada, arahkan kembali ke halaman login
			redirect(base_url('auth/login'));
		}
	}

	public function index()
	{
		$this->checkSecurityToken();

        $data['transactions'] = $this->transactions_model->get_transaction_list();
		$data['totalTransactionAmount'] = $this->transactions_model->getTotalTransactionAmount();
		$data['totalTransactionCount'] = $this->transactions_model->getTotalTransactionCount();


		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
        $this->load->view('admin/dashboard', $data);
		$this->load->view('admin/templates-admin/footer');
	}

}
