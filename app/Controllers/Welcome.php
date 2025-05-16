<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\KpkModel;
use App\Models\FpbModel;
use App\Models\FaktorPrimaModel;
use App\Models\EvaluasiModel;
use CodeIgniter\Controller;

class Welcome extends Controller
{
    protected $userModel;
    protected $studentModel;
    protected $kpkModel;
    protected $fpbModel;
    protected $faktorPrimaModel;
    protected $evaluasiModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->studentModel = new StudentModel();
        $this->kpkModel = new KpkModel();
        $this->fpbModel = new FpbModel();
        $this->faktorPrimaModel = new FaktorPrimaModel();
        $this->evaluasiModel = new EvaluasiModel();
    }

    // Fungsi untuk memuat header
    private function loadHeader()
    {
        $session = session();
        $data['username'] = $session->get('username');
        echo view('guru/header', $data);
        echo view('guru/sidebar');
    }

    // Fungsi untuk menampilkan daftar guru
    public function listGuru()
    {
        $this->loadHeader();

        $keyword = $this->request->getPost('search') ?? '';
        $perPage = 4;
        $page = $this->request->getVar('page') ? (int) $this->request->getVar('page') : 1;
        $offset = ($page - 1) * $perPage;

        if ($keyword) {
            $users = $this->userModel->searchUsers($keyword, $perPage, $offset);
        } else {
            $users = $this->userModel->getUsers($perPage, $offset);
        }

        $totalUsers = $this->userModel->countUsers();
        $totalPages = ceil($totalUsers / $perPage);

        $data = [
            'users' => $users,
            'keyword' => $keyword,
            'totalUsers' => $totalUsers,
            'totalPages' => $totalPages,
        ];

        echo view('guru/guru', $data);
        echo view('guru/footer');
    }

    // Fungsi untuk mengedit data guru
    public function editGuru($id)
    {
        $user = $this->userModel->getUserById($id);
        $data['user'] = $user;
        return view('guru/buat-edit/edit_guru_view', $data);
    }

    // Fungsi untuk mengupdate data guru
    public function updateGuru()
    {
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $this->userModel->updateUser($id, $data);
        return redirect()->to('welcome/listGuru');
    }

    // Fungsi untuk menghapus data guru
    public function deleteGuru($id)
    {
        $this->userModel->deleteUser($id);
        return redirect()->to('welcome/listGuru');
    }

    // Fungsi untuk menampilkan daftar siswa
    public function listSiswa()
    {
        $this->loadHeader();
        $search = $this->request->getPost('search') ?? '';
        $config = [
            'base_url' => site_url('welcome/list_siswa'),
            'total_rows' => $this->studentModel->countStudents($search),
            'per_page' => 4,
            'uri_segment' => 3,
        ];

        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 0;
        $students = $this->studentModel->getStudents($search, $config['per_page'], $page);
        $pagination = service('pager')->makeLinks($page, $config['per_page'], $config['total_rows']);

        $data = [
            'students' => $students,
            'pagination' => $pagination,
            'search' => $search,
        ];

        echo view('guru/siswa', $data);
        echo view('guru/footer');
    }

    // Fungsi untuk mengedit data siswa
    public function editSiswa($id)
    {
        $student = $this->studentModel->getStudentById($id);
        $data['student'] = $student;
        return view('guru/buat-edit/edit_siswa_view', $data);
    }

    // Fungsi untuk mengupdate data siswa
    public function updateSiswa()
    {
        $id = $this->request->getPost('id');
        $data = [
            'username' => $this->request->getPost('username'),
            'class' => $this->request->getPost('class'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $this->studentModel->updateStudent($id, $data);
        return redirect()->to('welcome/listSiswa');
    }

    // Fungsi untuk menghapus data siswa
    public function deleteSiswa($id)
    {
        $this->studentModel->deleteStudent($id);
        return redirect()->to('welcome/listSiswa');
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