<?php
class Repayment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Repayment_model');
        $this->load->model('Loan_model');
        // $this->load->library('session');
        // $this->load->helper('url');

        // Redirect if not logged in
        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }

	public function index($loan_id) {
        // Ensure loan exists
    	$this->load->view("repayment_form", ["loan_id"=>$loan_id]);
        
	}
    public function make_payment($loan_id) {
		// echo "yes";die;
        // Ensure loan exists
        $loan = $this->Loan_model->get_loan_by_id($loan_id);
        if (!$loan) {
            show_404();
        }

        // Process repayment
        $data = [
            'loan_id' => $loan_id,
            'user_id' => $this->session->userdata('id'),
            'amount' => $this->input->post('amount'),
            'status' => 'Completed'
        ];

        $this->Repayment_model->add_repayment($data);
        $this->session->set_flashdata('success', 'Repayment successful!');
        redirect('dashboard');
    }

    public function repayment_history($loan_id) {
        $data['repayments'] = $this->Repayment_model->get_repayments_by_loan($loan_id);
        $this->load->view('repayments/history', $data);
    }
}
?>
