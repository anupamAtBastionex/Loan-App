<?php
class Repayment_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Add a repayment entry
    public function add_repayment($data) {
        return $this->db->insert('repayments', $data);
    }

	public function get_repayments_by_loan($loan_id) {
        return $this->db->select('repayments.*, users.name as username')
            ->from('repayments')
            ->where('repayments.loan_id', $loan_id)
            ->join('users', 'users.id = repayments.user_id')
            ->get()
            ->result_array();
    }

    // Get all repayments for an admin view
    public function get_all_repayments() {
		return $this->db->select('repayments.*, users.name as username')
			->from('repayments')
			->join('users', 'users.id = repayments.user_id')
			->order_by('payment_date', 'DESC')
			->get()
			->result_array();
        // return $this->db->order_by('payment_date', 'DESC')->get('repayments')->result_array();
    }
}
?>
