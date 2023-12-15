<?php
class Transactions_model extends CI_Model {


    public function get_transaction_list() {
        // Ambil data dari tabel transactions_detail
        $this->db->select('transactions.*, products.name as product_name, products.price as product_price');
        $this->db->from('transaction_detail');
        $this->db->join('transactions', 'transactions.id = transaction_detail.transactions_id');
        $this->db->join('products', 'products.id = transaction_detail.products_id');
        $this->db->order_by('transactions.created_at', 'desc');
    
        $query = $this->db->get();
        return $query->result();
    }

    public function createTransaction($data) {
        $this->db->insert('transactions', $data);
        return $this->db->insert_id();
    }

    public function createTransactionDetail($data) {
        $this->db->insert('transaction_detail', $data);
    }

    public function getProductPrice($product_id) {
        // Gantilah dengan cara yang sesuai untuk mendapatkan harga produk dari database
        $query = $this->db->get_where('products', array('id' => $product_id));
    
        // Periksa apakah produk dengan ID tersebut ditemukan
        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->price;
        } else {
            // Produk dengan ID tersebut tidak ditemukan, Anda dapat menangani kesalahan di sini
            return null; // Atau berikan nilai default atau tindakan lain sesuai kebutuhan
        }


        
    }
    public function updateTransactionStatus($transactionId, $status) {
        $data = array('transaction_status' => $status);
        $this->db->where('id', $transactionId);
        $this->db->update('transactions', $data);
    }
    
    public function decreaseProductQuantity($transactionId) {
        // Dapatkan ID produk dari transaksi
        $productId = $this->getProductIdByTransaction($transactionId);
    
        // Kurangi quantity produk di tabel products
        $this->db->set('quantity', 'quantity-1', FALSE);
        $this->db->where('id', $productId);
        $this->db->update('products');
    }
    
    public function getProductIdByTransaction($transactionId) {
        $this->db->select('products_id');
        $this->db->from('transaction_detail');
        $this->db->where('transactions_id', $transactionId);
        $query = $this->db->get();
        $result = $query->row();
        return $result->products_id;
    }

    public function getTotalTransactionAmount() {
        $this->db->select_sum('transaction_total', 'totalAmount');
        $query = $this->db->get('transactions');
        return $query->row()->totalAmount;
    }

    public function getTotalTransactionCount() {
        return $this->db->count_all('transactions');
    }
}