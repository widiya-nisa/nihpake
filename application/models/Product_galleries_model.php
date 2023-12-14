<?php
class Product_galleries_model extends CI_Model {

    public function insert_gallery($data) {
        $this->db->insert('product_galleries', $data);
    }
    public function get_products() {
        $query = $this->db->get('products');
        return $query->result();
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
    public function delete_gallery($gallery_id) {
        // Hapus gallery berdasarkan ID
        $this->db->where('id', $gallery_id);
        $this->db->delete('product_galleries');
    }

    public function getGalleryById($id) {
        // Ambil data galeri berdasarkan ID
        $this->db->where('id', $id);
        $query = $this->db->get('product_galleries');
        return $query->row();
    }
    
    public function updateGalleryWithImage($id, $imagePath) {
        $data = array(
            'is_default' => $this->input->post('is_default'),
            'photo' => $imagePath  // Menyimpan path lengkap gambar
        );

        $this->db->where('id', $id);
        $this->db->update('product_galleries', $data);
    }
}