<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index() {
        // Arahkan pengguna ke halaman login
        $this->load->view('admin/autentifikasi/login');

    }

    public function register() {
        // Proses form register
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('nama', 'nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                // Validasi gagal, kembali ke halaman register
                $this->load->view('admin/autentifikasi/register');
            } else {
                // Konfigurasi upload gambar
                $config['upload_path'] = './assets/profile/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048; // 2MB
                $config['max_width'] = 1024;
                $config['max_height'] = 768;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    // Upload gambar gagal
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/autentifikasi/register', $error);
                } else {
                    // Upload gambar berhasil, simpan data ke database
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                        'image' => $this->upload->data('file_name')
                    );

                    $registration_status = $this->user_model->register_user($data);

                    if ($registration_status) {
                        // Set flashdata untuk notifikasi
                        $this->session->set_flashdata('success', 'Akun berhasil dibuat! Silakan login.');
                        
                        // Arahkan pengguna ke halaman login setelah berhasil mendaftar
                        redirect(base_url('auth/index'));

                    } else {
                        // Registrasi gagal, tampilkan notifikasi
                        $this->session->set_flashdata('error', 'Registrasi gagal. Silakan coba lagi.');
                        redirect(base_url('auth/register'));
                    }
                    
                }
            }
        } else {
            // Tampilkan halaman register
            $this->load->view('admin/autentifikasi/register');

        }
    }

    private function generateSecurityToken() {
        $token = bin2hex(random_bytes(16)); // Generate a random token
        $this->session->set_userdata('security_token', $token);
        return $token;
    }

    public function login() {
        // Proses form login
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $login_result = $this->user_model->login_user($email, $password);

        if ($login_result === 'password_mismatch') {
            // Set flashdata untuk pesan kesalahan password
            $this->session->set_flashdata('error', 'Login gagal. Password tidak sesuai.');
        } elseif ($login_result === 'email_not_found') {
            // Set flashdata untuk pesan kesalahan email
            $this->session->set_flashdata('error', 'Login gagal. Email tidak ditemukan.');
        } else {
            // Login berhasil, simpan data pengguna ke sesi
            $this->session->set_userdata('user_id', $login_result->id);
            $this->session->set_userdata('user_nama', $login_result->nama);

            // Set flashdata untuk notifikasi berhasil
            $this->session->set_flashdata('success', 'Login berhasil! Selamat datang, ' . $login_result->nama . '.');
            $this->generateSecurityToken();

            // Arahkan pengguna ke halaman admin setelah login berhasil
            redirect(base_url('admin'));
        }

        // Arahkan pengguna kembali ke halaman login
        redirect(base_url('auth/login'));
    } else {
        // Tampilkan halaman login
        $this->load->view('admin/autentifikasi/login');
    }

    }

    public function logout() {
        // Hapus sesi yang terkait dengan pengguna
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_nama');
        $this->session->unset_userdata('security_token');
    
        // Set flashdata untuk notifikasi logout
        $this->session->set_flashdata('success', 'Anda telah berhasil logout.');
        
        
        // Arahkan pengguna ke halaman login atau halaman lain yang sesuai
        redirect(base_url('auth/login'));
    }
}
