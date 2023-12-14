<?php
class Product_model extends CI_Model {

    public function insert_product($data) {
        $this->db->insert('products', $data);
    }
    
   

    public function getProducts() {
        // Mengambil data produk dari database
        $query = $this->db->get('products');
        $products = $query->result();

        // Menambahkan gambar-gambar dari productGalleries ke setiap produk
        foreach ($products as &$product) {
            $product->galleries = $this->getProductGalleries($product->id);
        }

        return $products;
    }

    public function getProductGalleries($products_id) {
        // Mengambil data gambar dari productGalleries berdasarkan product_id
        $this->db->where('products_id', $products_id);
        $query = $this->db->get('product_galleries');
        return $query->result();
    }

    public function getProductById($product_id) {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('id', $product_id);
        $query = $this->db->get();
        $product = $query->row();
    
        // Mengambil galeri untuk produk tertentu
        $product->galleries = $this->getProductGalleries($product_id);
    
        return $product;
    }


    public function delete_product($product_id) {
        // Hapus produk dari database berdasarkan product_id
        $this->db->where('id', $product_id);
        $this->db->delete('products');
    }
}