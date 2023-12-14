<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductGalleries extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('product_galleries_model');
        $this->load->model('product_model');
    }

    public function listGallery()
	{
		cek_login();

        $data['gallery'] = $this->product_galleries_model->get_gallery_list();

		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/product-galleries/index', $data);
		$this->load->view('admin/templates-admin/footer');

	}

	public function createGallery()
	{
		cek_login();
			// Ambil data produk untuk opsi dropdown
			$data['products'] = $this->product_galleries_model->get_products();


		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/product-galleries/create', $data);
		$this->load->view('admin/templates-admin/footer');

	}

	public function store()
	{
		cek_login();
        $config['upload_path']   = './assets/gallery/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 2048;
    
        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->load->library('session');
    
        // Set aturan validasi
        $this->form_validation->set_rules('products_id', 'products_id', 'required');
        $this->form_validation->set_rules('is_default', 'Is_Default');
    
        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('image')) {
            // Jika validasi gagal atau gagal mengunggah gambar, tampilkan pesan kesalahan
            $data['products'] = $this->product_galleries_model->get_products(); // Ambil data produk untuk opsi dropdown
            $this->session->set_flashdata('error', validation_errors() . $this->upload->display_errors());
    
            $this->load->view('admin/product-galleries/create', $data);
        } else {
            // Jika berhasil mengunggah gambar
            $upload_data = $this->upload->data();
    
            // Tangkap data dari formulir
            $products_id = $this->input->post('products_id');
            $image_path = 'assets/gallery/' . $upload_data['file_name'];
            $is_default = $this->input->post('is_default') ? 1 : 0;
    
            // Siapkan data untuk disimpan ke dalam database
            $data = array(
                'products_id' => $products_id,
                'photo'      => $image_path,
                'is_default' => $is_default,
            );
    
            // Panggil model untuk menyimpan data ke dalam database
            $this->product_galleries_model->insert_gallery($data);
    
            // Set notifikasi Flashdata berhasil
            $this->session->set_flashdata('success', 'foto berhasil ditambahkan!');
            // Redirect kembali ke formulir setelah unggahan
            redirect('productGalleries/listGallery');
        }

		$this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/product-galleries/create');
		$this->load->view('admin/templates-admin/footer');

	}

    public function edit($id) {
        // Panggil method pada model untuk mendapatkan data galeri berdasarkan ID
        $data['gallery'] = $this->product_galleries_model->getGalleryById($id);
    
        // Panggil method pada model untuk mendapatkan data produk (untuk dropdown)
        $data['products'] = $this->product_galleries_model->get_products();
    
        // Tampilkan view untuk edit galeri
        $this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/product-galleries/edit', $data);
		$this->load->view('admin/templates-admin/footer');
    }
    
    public function update($id) {
        $this->form_validation->set_rules('is_default', 'Is_Default', 'numeric');
    
        
        if ($this->form_validation->run() == FALSE) {

            // Panggil method pada model untuk mendapatkan data galeri berdasarkan ID
        $data['gallery'] = $this->product_galleries_model->getGalleryById($id);
    
        // Panggil method pada model untuk mendapatkan data produk (untuk dropdown)
        $data['products'] = $this->product_galleries_model->get_products();
            // Validasi gagal, tampilkan pesan kesalahan
            $this->load->view('admin/templates-admin/header');
            $this->load->view('admin/templates-admin/sidebar');
            $this->load->view('admin/product-galleries/edit', $data);
            $this->load->view('admin/templates-admin/footer');
        } else {
            // Validasi sukses, proses update
            $config['upload_path'] = './assets/gallery/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;  // 2MB
            $config['encrypt_name'] = TRUE;
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('image')) {
                // Upload gambar sukses, ambil path gambar
                $imagePath = 'assets/gallery/' . $this->upload->data('file_name');
    
                // Panggil model untuk update dengan path gambar baru
                $this->product_galleries_model->updateGalleryWithImage($id, $imagePath);
    
                // Set notifikasi berhasil
                $this->session->set_flashdata('success', 'Gambar berhasil diupdate.');
    
                // Redirect atau load view sesuai kebutuhan
                redirect('productGalleries/listGallery');
            } else {
                // Upload gambar gagal, tampilkan pesan kesalahan
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->load->view('admin/templates-admin/header');
                $this->load->view('admin/templates-admin/sidebar');
                $this->load->view('admin/product-galleries/edit', $data);
                $this->load->view('admin/templates-admin/footer');
            }
        }
    }

    public function delete_gallery($gallery_id) {
        // Panggil method pada model untuk menghapus gallery
        $this->product_galleries_model->delete_gallery($gallery_id);
    
        // Set notifikasi berhasil
        $this->session->set_flashdata('success', 'foto berhasil dihapus.');
    
        // Redirect kembali ke halaman daftar produk atau halaman lain yang diinginkan
        redirect('productGalleries/listGallery');
    }
}

