<?php
class Transactions_model extends CI_Model {

    public function create_transaction($data) {
        // Simpan data transaksi ke dalam tabel transactions
        $this->db->insert('transactions', $data);
    }

    public function get_transaction_list() {
        // Query untuk mengambil data dari tabel transactions
        $query = $this->db->get('transactions');

        // Kembalikan hasil query dalam bentuk array objek
        return $query->result();
    }
    
}