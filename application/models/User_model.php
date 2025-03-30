<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('role', "customer");
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return array(
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'logged_in' => TRUE
            );
        }
        return false;
    }

	public function get_admin($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('role', 'admin');
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user && password_verify($password, $user->password)) {
            return array(
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'logged_in' => TRUE,
				'admin_id' => $user->id,
				'is_admin' => true
            );
        }
		// echo $user->password;die;
        return false;
    }
	
}
?>
