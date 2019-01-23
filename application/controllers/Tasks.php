<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 7:37 PM
 */

class Tasks extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Tasks_model');
		if(!$this->session->userdata('logged_in'))
		{
			$this->session->set_flashdata('access_denied','<p class="alert-danger"> Access is Denied. Please Login First</p>');
			return redirect('home');
		}
	}

	public function index()
	{
		if ($this->Tasks_model->get_tasks())
		{
			$data = array(
				'view' => 'tasks/All_tasks',
				'tasks' => $this->Tasks_model->get_tasks()
			);
			$this->load->view('layouts/main',$data);
			//debug($data);
		}
	}

	public function display_tasks($id)
	{
		if ($this->Tasks_model->getById($id))
		{
			$data = array(
				'view' => 'tasks/index',
				'tasks' => $this->Tasks_model->getById($id)
			);
			$this->load->view('layouts/main',$data);
			//debug($data);
		}
	}

	public function create()
	{
			$data = array(
				'view' => 'tasks/create'

			);
			$this->load->view('layouts/main',$data);

	}

	public function create_post($project_id)
	{

		$this->form_validation->set_rules('task_name','Project Name','required|trim');
		$this->form_validation->set_rules('task_body','Description','required|trim');
		$this->form_validation->set_rules('due_date','Description','required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors('<p class="alert-danger">','</p>')
			);

			$this->session->set_flashdata($data);

			redirect('tasks/create');
		}
		else
		{
			$data = array(
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'project_id' => $project_id,
				'due_date' => $this->input->post('due_date')
			);

			//debug($data);
			$this->Tasks_model->create_task($data);
			$this->session->set_flashdata('msg','<p class="alert-success">Task has been created Successfully</p>');
			redirect('projects/details/'.$project_id);
		}


	}

	public function edit($id)
	{
		$data = array(
			'view' => 'tasks/edit',
			'task' => $this->Tasks_model->getById($id)
		);
		$this->load->view('layouts/main',$data);

	}

	public function edit_post()
	{

		$this->form_validation->set_rules('task_name','Project Name','required|trim');
		$this->form_validation->set_rules('task_body','Description','required|trim');
		$this->form_validation->set_rules('due_date','Description','required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors('<p class="alert-danger">','</p>')
			);

			$this->session->set_flashdata($data);

			redirect('tasks/edit');
		}
		else
		{
			$data = array(
				'id' => $this->input->post('id'),
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'project_id' => $this->input->post('project_id'),
				'due_date' => $this->input->post('due_date')
			);

			//debug($data);
			$this->Tasks_model->edit_task($data);
			$this->session->set_flashdata('msg','<p class="alert-success">Task has been updated Successfully</p>');
			redirect('tasks/display_tasks/'.$data['id']);
		}


	}

	public function delete($project_id,$task_id)
	{
		//debug($task_id);
		$this->Tasks_model->delete($task_id);
		$this->session->set_flashdata('msg','<p class="alert-success">Task has been deleted Successfully</p>');
		redirect('projects/details/'.$project_id);

	}
	public function status($task_id,$status)
	{
		$this->Tasks_model->update_status($task_id,$status);
		$this->session->set_flashdata('msg','<p class="alert-success">Task Status has been updated Successfully</p>');
		redirect('tasks/display_tasks/'.$task_id);
	}
	public function complete($id)
	{
		$this->Tasks_model->mark_complete($id);
		$this->session->set_flashdata('msg','<p class="alert-success">Task Status has been updated Successfully</p>');
		redirect('tasks/display_tasks/'.$id);
	}

	public function incomplete($id)
	{
		$this->Tasks_model->mark_incomplete($id);
		$this->session->set_flashdata('msg','<p class="alert-success">Task Status has been updated Successfully</p>');
		redirect('tasks/display_tasks/'.$id);
	}
}
