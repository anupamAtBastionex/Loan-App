<?php
class Auth extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->model('User_model');  
        $this->load->library('form_validation'); // Load form validation library
    }

	public function index() {
		// echo $this->session->userdata('id');die;
        if ($this->session->userdata('id')) {
            redirect('dashboard');
        }
        $this->load->view('login');
    }

    public function signup() {
        $this->load->view('register'); 
    }

    public function register() {
        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/signup');
        }

        // Hash password
        $hashed_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => $hashed_password
        );

        if ($this->User_model->register($data)) {
            $this->session->set_flashdata('success', 'Registration successful. Please login.');
            redirect('auth');
        } else {
            $this->session->set_flashdata('error', 'Registration failed. Try again!');
            redirect('auth/signup');
        }
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth');
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->login($email, $password);
        if ($user) {
            $this->session->set_userdata($user);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }


	/*--------------------- Admin Login ----------------------------------------*/
	public function admin_login() {
		$this->load->view('admin/login');
	}
	
	public function admin_authenticate() 
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/admin');
        }
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->User_model->get_admin($email, $password);

        if ($user) {
            $this->session->set_userdata($user);
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password.');
            redirect('auth/admin');
        }
	}
	
	









}
?>
