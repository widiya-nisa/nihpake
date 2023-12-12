<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register_user($data) {
        return $this->db->insert('user', $data);
    }

    public function login_user($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
    
        if ($query->num_rows() > 0) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return $user;
            } else {
                // Password tidak sesuai
                return 'password_mismatch';
            }
        } else {
            // Email tidak ditemukan
            return 'email_not_found';
        }
    }
}