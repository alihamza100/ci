<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 1:06 PM
 */

class Users_model extends CI_Model
{

	public function register_user($data)
	{
		return $this->db->insert('users',$data);
	}

	public function login_user($username,$password)
	{
		$data = array(
			'username' => $username,
			'password' => $password
		);

		$result = $this->db->where($data)
				->get('users');

		if ($result->num_rows() == 1)
		{
			return $result->row(0)->id;
		}
		else
		{
			return FALSE;
		}
	}
}
