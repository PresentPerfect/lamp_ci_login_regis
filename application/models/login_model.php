<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("America/Los_Angeles");

class login_model extends CI_Model
{
	public function add_user($user_info)
	{
		$query="INSERT INTO login_regis.users (first_name,last_name,email,password,created_at,updated_at) VALUES(?,?,?,?,?,?)";
		$values = array($user_info['first_name'],$user_info['last_name'],$user_info['email'],$user_info['password'],date('Y-m-d H:i:s'),date('Y-m-d H:i:s'));
		return $this->db->query($query,$values);
	}

	public function login($email)
	{
		$query = "SELECT * FROM users WHERE email=?";
		return $this->db->query($query,$email)->row_array();
	}
}

?>