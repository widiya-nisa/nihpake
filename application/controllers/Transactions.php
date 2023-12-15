<?php
class Transactions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transactions_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function success()
	{
		$this->load->view('templates/header');
		$this->load->view('checkouts/success');
		$this->load->view('templates/footer');

	}
    public function listTransactions() {
        // Ambil data transaksi dan produk
        $data['transactions'] = $this->transactions_model->get_transaction_list();
    
        // Tampilkan view daftar transaksi
        $this->load->view('admin/templates-admin/header');
        $this->load->view('admin/templates-admin/sidebar');
        $this->load->view('admin/transaksi/index', $data);
        $this->load->view('admin/templates-admin/footer');
    }
    public function checkout($products_id) {
        $this->load->model('Product_model');
        $data['products'] = $this->Product_model->getProductById($products_id);
        $this->load->view('templates/header');
		$this->load->view('checkouts/index',$data);
		$this->load->view('templates/footer');
    }


    public function createTransaction() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('number', 'Number', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        
        // Hapus aturan validasi 'transaction_total' karena akan dihitung secara dinamis
    
        if ($this->form_validation->run() == FALSE) {
            redirect('home');
        } else {
            $product_id = $this->input->post('product_id');
    
            $transaction_data = array(
                'uuid' => $this->generateUUID(),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'number' => $this->input->post('number'),
                'address' => $this->input->post('address'),
                'transaction_total' => $this->input->post('transaction_total'),
                'transaction_status' => 'pending'
            );
    
            $transaction_id = $this->transactions_model->createTransaction($transaction_data);
    
            $transaction_detail_data = array(
                'transactions_id' => $transaction_id,
                'products_id' => $product_id
            );
            $this->transactions_model->createTransactionDetail($transaction_detail_data);
    
            $this->session->set_flashdata('success', 'Transaction created successfully!');
            redirect('transactions/success');
        }
    }
    public function generateUUID($length = 8) {
        $uniqueID = uniqid('', true); // Menggunakan awalan yang kosong dan format true
    
        // Menggunakan md5 untuk mendapatkan panjang karakter yang diinginkan
        $uuid = substr(md5($uniqueID), 0, $length);
    
        return $uuid;
    }
    public function cancelTransaction($transactionId) {
        // Lakukan update status transaksi menjadi 'canceled' di database
        $this->transactions_model->updateTransactionStatus($transactionId, 'canceled');
    
        // Set notifikasi Flashdata berhasil
        $this->session->set_flashdata('success', 'Status transaksi ' . $transactionId . ' telah dibatalkan.');
    
        // Redirect ke halaman daftar transaksi
        redirect('transactions/listTransactions');
    }
    
    public function markAsPaid($transactionId) {
        // Lakukan update status transaksi menjadi 'paid' di database
        $this->transactions_model->updateTransactionStatus($transactionId, 'paid');
    
        // Update quantity produk
        $this->transactions_model->decreaseProductQuantity($transactionId);
    
        // Set notifikasi Flashdata berhasil
        $this->session->set_flashdata('success', 'Status transaksi ' . $transactionId . ' telah diubah menjadi terbayar.');
    
        // Redirect ke halaman daftar transaksi
        redirect('transactions/listTransactions');
    }
}