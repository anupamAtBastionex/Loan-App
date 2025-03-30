<?php
class Loan_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        // $this->load->database();
    }


    public function apply_loan($data) {
        return $this->db->insert('loans', $data);
    }


    public function get_loans_by_user($user_id) {
        return $this->db->get_where('loans', ['user_id' => $user_id])->result_array();
    }

	public function get_loan_by_id($loan_id) {
        return $this->db->get_where('loans', ['id' => $loan_id])->result_array();
    }

	public function get_all_loans() {
        $query = $this->db->get('loans');
        return $query->result_array();
    }

    public function update_status($loan_id, $status) {
        $this->db->where('id', $loan_id);
        $this->db->update('loans', ['status' => $status]);
    }

}
?>
