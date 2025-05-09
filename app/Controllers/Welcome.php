<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('TimeLimit_model');
        $this->load->model('Student_model');
        $this->load->model('User_model');
        $this->load->model('Siswa_model');
        $this->load->model('Kpk_model');
        $this->load->model('Siswa_fpb_model');
        $this->load->model('Fpb_model');
        $this->load->model('Siswa_faktor_prima_model');
        $this->load->model('Faktor_prima_model');
        $this->load->model('Siswa_evaluasi_model');
        $this->load->model('Evaluasi_model');
        // Pastikan pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    private function loadHeader()
    {
        // Ambil data dari session
        $data['username'] = $this->session->userdata('username');
        // Load view header dengan data
        $this->load->view('guru/header', $data);
        $this->load->view('guru/sidebar');
    }

    public function list_guru(): void
    {
        $this->loadHeader();

        // Ambil input pencarian
        $data['users'] = [];
        $data['keyword'] = '';
        $data['per_page'] = 4; // Jumlah item per halaman
        $data['current_page'] = $this->input->get('page') ? (int) $this->input->get('page') : 1; // Halaman saat ini
        $offset = ($data['current_page'] - 1) * $data['per_page']; // Hitung offset

        if ($this->input->post('search')) {
            $keyword = $this->input->post('keyword');
            $data['users'] = $this->User_model->search_users($keyword, $data['per_page'], $offset);
            $data['keyword'] = $keyword;
        } else {
            $data['users'] = $this->User_model->get_users($data['per_page'], $offset); // Ambil data pengguna
        }

        // Hitung total pengguna untuk paginasi
        $data['total_users'] = $this->User_model->count_users();
        $data['total_pages'] = ceil($data['total_users'] / $data['per_page']); // Hitung total halaman

        // Load the view
        $this->load->view('guru/guru', $data);
        $this->load->view('guru/footer');
    }

    public function edit_guru($id)
    {
        $data['user'] = $this->User_model->get_user_by_id($id);
        $this->load->view('guru/buat-edit/edit_guru_view', $data);
    }

    // Fungsi untuk mengupdate data guru
    public function update_guru()
    {
        $id = $this->input->post('id');
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT) // Hash password
        );
        $this->User_model->update_user($id, $data);
        redirect('welcome/list_guru');
    }

    // Fungsi untuk menghapus data guru
    public function delete_guru($id)
    {
        $this->User_model->delete_user($id);
        redirect('welcome/list_guru');
    }
    public function list_siswa(): void
    {
        $this->loadHeader();
        $search = $this->input->post('search'); // Ambil input pencarian
        $config['base_url'] = site_url('welcome/list_siswa');
        $config['total_rows'] = $this->Student_model->count_students($search); // Hitung total siswa berdasarkan pencarian
        $config['per_page'] = 4; // Menampilkan 4 item per halaman
        $config['uri_segment'] = 3; // Segment URI untuk pagination

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; // Ambil halaman saat ini
        $data['students'] = $this->Student_model->get_students($search, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links(); // Buat link pagination
        $data['search'] = $search; // Simpan query pencarian untuk ditampilkan di view
        // Load the view
        $this->load->view('guru/siswa', $data);
        $this->load->view('guru/footer');
    }

    // Fungsi untuk mengedit data siswa
    public function edit_siswa($id)
    {
        $data['student'] = $this->Student_model->get_student_by_id($id);
        $this->load->view('guru/buat-edit/edit_siswa_view', $data);
    }

    // Fungsi untuk mengupdate data siswa
    public function update_siswa()
    {
        $id = $this->input->post('id');
        $data = array(
            'username' => $this->input->post('username'),
            'class' => $this->input->post('class'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT) // Hash password
        );
        $this->Student_model->update_student($id, $data);
        redirect('welcome/buat-edit/list_siswa');
    }

    // Fungsi untuk menghapus data siswa
    public function delete_siswa($id)
    {
        $this->Student_model->delete_student($id);
        redirect('welcome/list_siswa');
    }
    public function waktu()
    {
        $this->loadHeader();
        $data['time_limits'] = $this->TimeLimit_model->get_all();
        $this->load->view('guru/waktu', $data);
        $this->load->view('guru/footer');
    }
    public function create_waktu()
    {
        if ($this->input->post()) {
            // Ambil data dari form
            $limit_hours = $this->input->post('limit_hours');
            $limit_minutes = $this->input->post('limit_minutes');

            // Konversi jam dan menit menjadi total menit
            $total_minutes = ($limit_hours * 60) + $limit_minutes;

            // Siapkan data untuk disimpan
            $data = [
                'time_limit' => $total_minutes // Pastikan kolom di database adalah time_limit
            ];

            // Simpan data ke database
            $this->TimeLimit_model->insert_time_limit($data);
            redirect('welcome/waktu');
        }
        $this->load->view('guru/buat-edit/create_time_limit');
    }

    public function edit_waktu($id)
    {
        $this->load->model('TimeLimit_model');

        // Ambil data batas waktu berdasarkan ID
        $data['time_limit'] = $this->TimeLimit_model->get_time_limit($id);

        if ($this->input->post()) {
            // Ambil data dari form
            $limit_hours = $this->input->post('limit_hours');
            $limit_minutes = $this->input->post('limit_minutes');

            // Konversi jam dan menit menjadi total menit
            $total_minutes = ($limit_hours * 60) + $limit_minutes;

            // Siapkan data untuk diperbarui
            $update_data = [
                'time_limit' => $total_minutes // Pastikan kolom di database adalah time_limit
            ];

            // Update data di database
            $this->TimeLimit_model->update_time_limit($id, $update_data);
            redirect('welcome/waktu');
        }

        $this->load->view('guru/buat-edit/edit_time_limit', $data);
    }

    public function delete_waktu($id)
    {
        $this->load->model('TimeLimit_model');
        $this->TimeLimit_model->delete_time_limit($id);
        redirect('welcome/waktu');
    }
    public function soal_kpk(): void
    {
        $this->loadHeader();

        // Load the search query if it exists
        $search_query = $this->input->get('search'); // Assuming you're using GET method for the search

        // Pagination configuration
        $config['base_url'] = site_url('welcome/soal_kpk'); // Base URL for pagination links
        $config['total_rows'] = $this->Kpk_model->count_kpk($search_query); // Total number of records based on search
        $config['per_page'] = 5; // Number of records per page
        $config['uri_segment'] = 3; // Segment of the URL that contains the page number

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch KPK records for the current page based on search query
        $data['kpk'] = $this->Kpk_model->get_kpk($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;

        // Load the view
        $this->load->view('guru/soal_kpk', $data);
        $this->load->view('guru/footer');
    }
    public function create_kpk()
    {
        $this->load->view('guru/buat-edit/create_kpk');
    }

    public function store_kpk()
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Kpk_model->insert($data);
        redirect('welcome/soal_kpk');
    }

    public function edit_kpk($id)
    {
        $data['kpk'] = $this->Kpk_model->get($id);
        $this->load->view('guru/buat-edit/edit_kpk', $data);
    }

    public function update_kpk($id)
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Kpk_model->update($id, $data);
        redirect('welcome/soal_kpk');
    }

    public function delete_kpk($id)
    {
        $this->Kpk_model->delete($id);
        redirect('welcome/soal_kpk');
    }

    public function soal_fpb(): void
    {
        $this->loadHeader();

        // Load the search query if it exists
        $search_query = $this->input->get('search'); // Assuming you're using GET method for the search

        // Pagination configuration
        $config['base_url'] = site_url('welcome/soal_fpb'); // Base URL for pagination links
        $config['total_rows'] = $this->Fpb_model->count_fpb($search_query); // Total number of records based on search
        $config['per_page'] = 5; // Number of records per page
        $config['uri_segment'] = 3; // Segment of the URL that contains the page number

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch FPB records for the current page based on search query
        $data['fpb'] = $this->Fpb_model->get_fpb($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;

        // Load the view
        $this->load->view('guru/soal_fpb', $data);
        $this->load->view('guru/footer');
    }

    public function create_fpb()
    {
        $this->load->view('guru/buat-edit/create_fpb');
    }

    public function store_fpb()
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Fpb_model->insert($data);
        redirect('welcome/soal_fpb');
    }

    public function edit_fpb($id)
    {
        $data['fpb'] = $this->Fpb_model->get($id);
        $this->load->view('guru/buat-edit/edit_fpb', $data);
    }

    public function update_fpb($id)
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Fpb_model->update($id, $data);
        redirect('welcome/soal_fpb');
    }

    public function delete_fpb($id)
    {
        $this->Fpb_model->delete($id);
        redirect('welcome/soal_fpb');
    }
    public function soal_faktor_prima(): void
    {
        $this->loadHeader();

        // Load the search query if it exists
        $search_query = $this->input->get('search');

        // Pagination configuration
        $config['base_url'] = site_url('welcome/soal_faktor_prima');
        $config['total_rows'] = $this->Faktor_prima_model->count_faktor_prima($search_query);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch Faktor Prima records for the current page based on search query
        $data['faktor_prima'] = $this->Faktor_prima_model->get_faktor_prima($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;

        // Load the view
        $this->load->view('guru/soal_faktor_prima', $data);
        $this->load->view('guru/footer');
    }

    public function create_faktor_prima()
    {
        $this->load->view('guru/buat-edit/create_faktor_prima');
    }

    public function store_faktor_prima()
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Faktor_prima_model->insert($data);
        redirect('welcome/soal_faktor_prima');
    }

    public function edit_faktor_prima($id)
    {
        $data['faktor_prima'] = $this->Faktor_prima_model->get($id);
        $this->load->view('guru/buat-edit/edit_faktor_prima', $data);
    }

    public function update_faktor_prima($id)
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Faktor_prima_model->update($id, $data);
        redirect('welcome/soal_faktor_prima');
    }

    public function delete_faktor_prima($id)
    {
        $this->Faktor_prima_model->delete($id);
        redirect('welcome/faktor_prima');
    }
    public function soal_evaluasi(): void
    {
        $this->loadHeader();
        $search_query = $this->input->get('search');

        // Pagination configuration
        $config['base_url'] = site_url('welcome/soal_evaluasi');
        $config['total_rows'] = $this->Evaluasi_model->count_evaluasi($search_query);
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch Faktor Prima records for the current page based on search query
        $data['evaluasi'] = $this->Evaluasi_model->get_evaluasi($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;
        // Load the view
        $this->load->view('guru/soal_evaluasi', $data);
        $this->load->view('guru/footer');
    }
    public function create_evaluasi()
    {
        $this->load->view('guru/buat-edit/create_evaluation');
    }

    public function store_evaluasi()
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Evaluasi_model->insert($data);
        redirect('welcome/soal_evaluasi');
    }

    public function edit_evaluasi($id)
    {
        $data['evaluasi'] = $this->Evaluasi_model->get($id);
        $this->load->view('guru/buat-edit/edit_evaluation', $data);
    }

    public function update_evaluasi($id)
    {
        $data = [
            'question' => $this->input->post('question'),
            'option_a' => $this->input->post('option_a'),
            'option_b' => $this->input->post('option_b'),
            'option_c' => $this->input->post('option_c'),
            'option_d' => $this->input->post('option_d'),
            'answer' => $this->input->post('answer')
        ];
        $this->Evaluasi_model->update($id, $data);
        redirect('welcome/soal_faktor_prima');
    }

    public function delete_evaluasi($id)
    {
        $this->Evaluasi_model->delete($id);
        redirect('welcome/soal_evaluasi');
    }
    public function nilai_kpk(): void
    {
        $this->loadHeader();
        $search_query = $this->input->get('search');

        // Pagination configuration
        $config['base_url'] = site_url('welcome/nilai_kpk');
        $config['total_rows'] = $this->Siswa_model->count_siswa($search_query);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch Faktor Prima records for the current page based on search query
        $data['siswa'] = $this->Siswa_model->get_siswa($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;

        // Load the view
        $this->load->view('guru/nilai_kpk', $data);
        $this->load->view('guru/footer');
    }
    public function nilai_fpb(): void
    {
        $this->loadHeader();
        $search_query = $this->input->get('search');

        // Pagination configuration
        $config['base_url'] = site_url('welcome/nilai_fpb');
        $config['total_rows'] = $this->Siswa_fpb_model->count_siswa_fpb($search_query);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch Faktor Prima records for the current page based on search query
        $data['siswa_fpb'] = $this->Siswa_fpb_model->get_siswa_fpb($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;

        // Load the view
        $this->load->view('guru/nilai_fpb', $data);
        $this->load->view('guru/footer');
    }
    public function nilai_faktor_prima(): void
    {
        $this->loadHeader();
        $search_query = $this->input->get('search');

        // Pagination configuration
        $config['base_url'] = site_url('welcome/nilai_faktor_prima');
        $config['total_rows'] = $this->Siswa_faktor_prima_model->count_siswa_faktor_prima($search_query);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch Faktor Prima records for the current page based on search query
        $data['siswa_faktor_prima'] = $this->Siswa_faktor_prima_model->get_siswa_faktor_prima($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;

        // Load the view
        $this->load->view('guru/nilai_faktor_prima', $data);
        $this->load->view('guru/footer');
    }
    public function nilai_evaluasi(): void
    {
        $this->loadHeader();
        $search_query = $this->input->get('search');

        // Pagination configuration
        $config['base_url'] = site_url('welcome/nilai_evaluasi');
        $config['total_rows'] = $this->Siswa_evaluasi_model->count_siswa_evaluasi($search_query);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;

        // Optional: Customize pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get the current page number
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Fetch Faktor Prima records for the current page based on search query
        $data['siswa_evaluasi'] = $this->Siswa_evaluasi_model->get_siswa_evaluasi($config['per_page'], $page, $search_query);

        // Create pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Pass the search query to the view
        $data['search_query'] = $search_query;

        // Load the view
        $this->load->view('guru/nilai_evaluasi', $data);
        $this->load->view('guru/footer');
    }
}