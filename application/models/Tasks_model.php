<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 7:38 PM
 */

class Tasks_model extends CI_Model
{
	public function get_tasks()
	{
		$this->db->select('
			tasks.id as task_id,
			 tasks.task_name,
			 tasks.project_id,
			 tasks.date_created,
			 tasks.status,
			 projects.id,
			 projects.project_name

		');
		$this->db->from('tasks');
		$this->db->join('projects','projects.id = tasks.project_id');
		$q = $this->db->get();

		return $q->result();
	}

	public function getById($id)
	{
		$q = $this->db->where('id',$id)
			->get('tasks');
		return $q->row(0);
	}

	public function create_task($data)
	{
		return $this->db->insert('tasks',$data);

	}

	public function edit_task($data)
	{
		$id = $data['id'];
		return $this->db->where('id',$id)
				->update('tasks',$data);

	}

	public function delete($task_id)
	{
		 $this->db->where('id' ,$task_id)
				->delete('tasks');

	}



	public function tasksByProject($project_id, $active = true)
	{
		$this->db->where('project_id', $project_id);

			if ($active)
			{
				$this->db->where('status', 1);
			}
			else
			{
				$this->db->where('status', 0);
			}

		$q = $this->db->get('tasks');

		return $q->result();
	}

	public function update_status($task_id,$status)
	{
		$this->db->where('id',$task_id);
		if ($status == 0)
		{
			$this->db->set('status',1);
		}
		else
		{
			$this->db->set('status', 0);
		}

		return $this->db->update('tasks');

	}
	/*public function mark_complete($task_id)
	{
		return $this->db->set('status',1)
				->where('id',$task_id)
				->update('tasks');

	}*/

	/*public function mark_incomplete($task_id)
	{
		return $this->db->set('status',0)
			->where('id',$task_id)
			->update('tasks');
	}*/
}
