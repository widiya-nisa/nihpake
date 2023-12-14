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

    public function edit($product_id) {
        // Ambil data produk dari model berdasarkan ID
        $data['product'] = $this->product_model->getProductById($product_id);

        cek_login();
		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/product-admin/edit', $data);
		$this->load->view('admin/templates-admin/footer');
    }

    public function update($product_id) {
        // Atur aturan validasi
        $this->form_validation->set_rules('name', 'Nama Produk', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
        $this->form_validation->set_rules('quantity', 'Jumlah', 'required|numeric');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan
    
        // Jalankan validasi
        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, kembali ke halaman edit dengan pesan error
            $this->session->set_flashdata('error', validation_errors());
            redirect('product/edit/' . $product_id);
        } else {
            // Jika validasi sukses, update data produk
            $data = array(
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'description' => $this->input->post('description'),
                'type' => $this->input->post('type'),
                'quantity' => $this->input->post('quantity')
                // Tambahkan kolom lain sesuai kebutuhan
            );
    
            // Panggil method pada model untuk melakukan update
            $this->product_model->update_product($product_id, $data);
    
            // Set notifikasi berhasil
            $this->session->set_flashdata('success', 'Produk berhasil diperbarui.');
    
            // Redirect kembali ke halaman daftar produk atau halaman lain yang diinginkan
            redirect('product/listProduct');
        }
    }

    public function delete($product_id) {
        // Panggil method pada model untuk menghapus produk
        $this->product_model->delete_product($product_id);

        // Redirect kembali ke halaman daftar produk atau halaman lain yang diinginkan
        redirect('product/listProduct');
    }
}
