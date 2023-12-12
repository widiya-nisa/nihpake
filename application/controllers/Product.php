<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
		$this->load->library('form_validation');
    }


	public function index()
	{
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->getProducts();

		$this->load->view('templates/header');
		$this->load->view('products/index', $data);
		$this->load->view('templates/footer');

	}

    public function detail($products_id)
	{
         // Dapatkan detail produk dari model
        $this->load->model('Product_model');
         $data['products'] = $this->Product_model->getProductById($products_id);
		$this->load->view('templates/header');
		$this->load->view('products/detail',$data);
		$this->load->view('templates/footer');

	}


    public function listProduct()
	{
		cek_login();

		$data['products'] = $this->product_model->get_products();


		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/product-admin/index', $data);
		$this->load->view('admin/templates-admin/footer');

	}

	public function createProduct()
	{
		cek_login();


		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/product-admin/create');
		$this->load->view('admin/templates-admin/footer');

	}

	public function add_product() {
        // Set aturan validasi
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');

        if ($this->form_validation->run() == FALSE) {
            // Tampilkan kembali formulir jika validasi gagal
            $this->load->view('admin/product-admin/create');
        } else {
            // Tangkap data dari form
            $data = array(
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'quantity' => $this->input->post('quantity'),
            );

            // Panggil model untuk menyimpan data
            $this->product_model->insert_product($data);

            // Redirect atau tampilkan pesan sukses
            redirect('product/listProduct'); // Ganti 'product/list' dengan halaman yang sesuai
        }
    }
}
