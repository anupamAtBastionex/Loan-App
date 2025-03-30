<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('Loan_model');
        // Check if user is logged in 
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }

	public function index() {
        $user_id = $this->session->userdata('id');
        $data['loans'] = $this->Loan_model->get_loans_by_user($user_id);
        $this->load->view('dashboard', $data);
    }

}
?>
