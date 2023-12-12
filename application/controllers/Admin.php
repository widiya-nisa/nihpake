<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/templates-admin/footer');
	}
}
