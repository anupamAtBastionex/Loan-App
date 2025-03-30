<?php
class Loan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Loan_model');
        // $this->load->library('session');
        // $this->load->helper('url');

        if (!$this->session->userdata('id')) {
            redirect('auth');
        }
    }

    public function apply() {
        // Validate input
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'Loan Amount', 'required|numeric');
        $this->form_validation->set_rules('tenure', 'Tenure', 'required|numeric');
        $this->form_validation->set_rules('purpose', 'Purpose', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('loan/apply_form');
        }

        $data = array(
            'user_id' => $this->session->userdata('id'),
            'amount' => $this->input->post('amount'),
            'tenure' => $this->input->post('tenure'),
            'purpose' => $this->input->post('purpose'),
            'status' => 'Pending',
            'created_at' => date('Y-m-d H:i:s')
        );

        if ($this->Loan_model->apply_loan($data)) {
            $this->session->set_flashdata('success', 'Loan application submitted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to submit loan application. Try again.');
        }

        redirect('loan/apply_form');
    }

    public function apply_form() {
        $this->load->view('apply_loan');
    }
}
?>
