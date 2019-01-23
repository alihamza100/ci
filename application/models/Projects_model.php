<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 7:38 PM
 */

class Projects_model extends CI_Model
{
	public function get_projects()
	{
		$q = $this->db->get('projects');
		return $q->result();
	}

	public function get_project($id)
	{
		$q = $this->db->where('id',$id)
			->get('projects');
		return $q->row();
	}

	public function create_project($data)
	{
		return $this->db->insert('projects',$data);

	}

	public function edit_project($data)
	{
		$id = $data['id'];
		return $this->db->where('id',$id)
				->update('projects',$data);

	}

	public function delete_project($id)
	{
		$this->db->where('id' ,$id)
				->delete('projects');
		$this->db->where('project_id',$id)
				->delete('tasks');

		return true;
	}

	public function get_user_projects($user_id)
	{
		$q = $this->db->where('user_id',$user_id)
				->get('projects');

		return $q->result();
	}
}
