<?php
class Users_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($email, $password)
	{
		$query = $this->db->get_where('users', array('email' => $email, 'password' => $password));
		return $query->row_array();
	}

	function save_user($data){
		$this->db->insert('users',$data);
	}

	function save_cod($data){
		// $this->db->where('id', 1);
		// $this->db->update('users', $data);
		// echo"<script>alert('Success');</script>";
		// redirect('/');	
	}
	
}
