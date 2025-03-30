<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Loan_model');
        $this->load->model('Repayment_model');
        // $this->load->library('session');
        // $this->load->helper('url');

        // Redirect if not admin
        if (!$this->session->userdata('is_admin')) {
            redirect('auth/admin');
        }
    }

    public function index() {
        $data['loans'] = $this->Loan_model->get_all_loans();
		// echo "yes";die;
        $this->load->view('admin/dashboard', $data);
    }

    public function approve($loan_id) {
		// echo "yes";die;
        $this->Loan_model->update_status($loan_id, 'Approved');
        $this->session->set_flashdata('success', 'Loan Approved Successfully!');
        redirect('admin');
    }

    public function reject($loan_id) {
        $this->Loan_model->update_status($loan_id, 'Rejected');
        $this->session->set_flashdata('error', 'Loan Rejected!');
        redirect('admin');
    }

	public function repayments() {
		// echo "yes";die;
		$data['repayments'] = $this->Repayment_model->get_all_repayments();
		$this->load->view('admin/repayments', $data);
	}
	
}
?>
