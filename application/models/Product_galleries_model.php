<?php
class Product_galleries_model extends CI_Model {

    public function insert_gallery($data) {
        $this->db->insert('product_galleries', $data);
    }

    public function get_gallery_list() {
        // Query untuk mengambil data dari tabel product_galleries dan produk terkait
        $this->db->select('product_galleries.id, products_id, photo, is_default, products.name as product_name');
        $this->db->from('product_galleries');
        $this->db->join('products', 'products.id = product_galleries.products_id');
        $query = $this->db->get();

        // Kembalikan hasil query dalam bentuk array objek
        return $query->result();
    }
}