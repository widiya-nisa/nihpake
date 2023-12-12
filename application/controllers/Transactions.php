<?php
class Transactions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('transactions_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function createTransactionForm() {
        // Tampilkan view formulir transaksi
        $this->load->view('transactions/form_transactions');
    }

    public function createTransaction() {
        // Set aturan validasi
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('number', 'Number', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('transaction_total', 'Transaction Total', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan formulir kembali dengan pesan kesalahan
            $this->load->view('transactions/form_transactions');
        } else {
            // Jika validasi berhasil, tangkap data dari formulir
            $data = array(
                'uuid' => $this->generateUUID(), // Generate UUID secara manual
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'number' => $this->input->post('number'),
                'address' => $this->input->post('address'),
                'transaction_total' => $this->input->post('transaction_total'),
                'transaction_status' => 'pending' // Set status sebagai default "pending"
            );

            // Panggil model untuk menyimpan data ke dalam database
            $this->transactions_model->create_transaction($data);

            // Set notifikasi Flashdata berhasil
            $this->session->set_flashdata('success', 'Transaction created successfully!');

            // Redirect ke halaman daftar transaksi
            redirect('transactions/listTransactions');
        }
    }
    
    private function generateUUID() {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    public function listTransactions() {
        // Ambil data transaksi
        $data['transactions'] = $this->transactions_model->get_transaction_list();

        // Tampilkan view daftar transaksi
        $this->load->view('admin/templates-admin/header');
		$this->load->view('admin/templates-admin/sidebar');
		$this->load->view('admin/transaksi/index', $data);
		$this->load->view('admin/templates-admin/footer');
    }
}