<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'cookie']); // Load URL and Cookie helpers
        $this->load->library(['form_validation', 'session']);
        $this->load->model(['User_model', 'Student_model']);
    }

    public function index() {
        $this->load->view('student/login');
    }

    public function register_siswa() {
        // Change 'students.name' to 'students.username'
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[students.username]');
        $this->form_validation->set_rules('class', 'Class', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $data['errors'] = validation_errors();
            $this->load->view('student/register', $data);
        } else {
            // Use 'username' instead of 'name'
            $username = $this->input->post('username', TRUE);
            $class = $this->input->post('class', TRUE);
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            // Register the student with the correct column name
            $this->Student_model->register(['username' => $username, 'class' => $class, 'password' => $password]);
            $this->session->set_flashdata('success', 'Registration successful! You can now log in.');
            redirect('pages/home');
        }
    }

    public function login_siswa() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('class', 'Class', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['errors'] = validation_errors();
            $this->load->view('student/login', $data);
        } else {
            $username = $this->input->post('username', TRUE);
            $class = $this->input->post('class', TRUE);
            $password = $this->input->post('password');
            $rememberMe = $this->input->post('rememberMe'); // Get the remember me checkbox value

            // Update the login method to use 'username'
            $student = $this->Student_model->login($username, $class, $password);

            if ($student) {
                $this->session->set_userdata('student_id', $student->id);
                $this->session->set_userdata('username', $student->username); // Use 'username'
                $this->session->set_userdata('class', $student->class);

                // Set cookies if remember me is checked
                if ($rememberMe) {
                    set_cookie('username', $username, 86500); // 1 day
                    set_cookie('class', $class, 86500); // 1 day
                } else {
                    delete_cookie('username');
                    delete_cookie('class');
                }

                redirect('pages/home');
            } else {
                $this->session->set_flashdata('error', 'Login Gagal, cek username, class, atau password lalu coba lagi');
                redirect('auth/login_siswa');
            }
        }
    }

    public function logout_siswa() {
        $this->session->sess_destroy();
        redirect('auth/login_siswa');
    }

    public function register() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            if (!$this->User_model->user_exists($username)) {
                $this->User_model->register(['username' => $username, 'password' => $password]);
                redirect('welcome/list_guru');
            } else {
                $this->session->set_flashdata('error', 'Username sudah ada!');;
            }
        }

        $this->load ->view('guru/register');
    }

    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            $user = $this->User_model->login($username, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('username', $user->username); // Store username in session
                redirect('welcome/list_guru');
            } else {
                $this->session->set_flashdata('error', 'Login gagal, cek username atau password lalu coba lagi');;
            }
        }
    
        $this->load->view('guru/login');
    }
     
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}