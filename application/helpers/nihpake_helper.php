<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('cek_login')) {
    function cek_login() {
        $CI = &get_instance();
        $CI->load->library('session');

        if (!$CI->session->userdata('user_id')) {
            // If there is no user_id session data, the user is not logged in
            // Redirect the user to the login page
            redirect('auth/login');
        }
        // If user_id exists, the user is logged in
        // Proceed to the desired page
    }
}