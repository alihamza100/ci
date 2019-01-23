<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 7:37 PM
 */

class Projects extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('logged_in'))
		{
			$this->session->set_flashdata('access_denied','<p class="alert-danger"> Access is Denied. Please Login First</p>');
			return redirect('home');
		}

		$this->load->model('Projects_model');
		$this->load->model('Tasks_model');
	}

	public function index()
	{
		$this->load->model('Projects_model');
		if ($this->Projects_model->get_projects())
		{
			$data = array(
				'view' => 'projects/index',
				'projects' => $this->Projects_model->get_projects(),
				'text' => 'All Projects'
			);
			$this->load->view('layouts/main',$data);
			//debug($data);
		}
	}

	public function details($id)
	{

		if ($this->Projects_model->get_project($id))
		{
			$data = array(
				'view' => 'projects/details',
				'project' => $this->Projects_model->get_project($id),
				'complete_tasks' => $this->Tasks_model->tasksByProject($id, true),
				'incomplete_tasks' => $this->Tasks_model->tasksByProject($id, false),
			);
			$this->load->view('layouts/main',$data);
			//debug($data);
		}
	}

	public function create()
	{
			$data = array(
				'view' => 'projects/create',

			);
			$this->load->view('layouts/main',$data);

	}

	public function create_post()
	{

		$this->form_validation->set_rules('project_name','Project Name','required|trim');
		$this->form_validation->set_rules('project_body','Description','required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors('<p class="alert-danger">','</p>')
			);

			$this->session->set_flashdata($data);

			redirect('projects/create');
		}
		else
		{
			$data = array(
				'project_name' => $this->input->post('project_name'),
				'project_body' => $this->input->post('project_body'),
				'user_id' => $this->input->post('user_id')
			);

			//debug($data);
			$this->Projects_model->create_project($data);
			$this->session->set_flashdata('msg','<p class="alert-success">Project has been created Successfully</p>');
			redirect('projects');
		}


	}

	public function edit($id)
	{
		$data = array(
			'view' => 'projects/edit',
			'project' => $this->Projects_model->get_project($id)
		);
		$this->load->view('layouts/main',$data);

	}

	public function edit_post()
	{

		$this->form_validation->set_rules('project_name','Project Name','required|trim');
		$this->form_validation->set_rules('project_body','Description','required|trim');

		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors('<p class="alert-danger">','</p>')
			);

			$this->session->set_flashdata($data);

			redirect('projects/edit');
		}
		else
		{
			$data = array(
				'project_name' => $this->input->post('project_name'),
				'project_body' => $this->input->post('project_body'),
				'id' => $this->input->post('id'),
				'user_id' => $this->session->userdata('user_id')
			);

			//debug($data);
			$this->Projects_model->edit_project($data);
			$this->session->set_flashdata('msg','<p class="alert-success">Project has been updated Successfully</p>');
			redirect('projects');
		}


	}

	public function delete($id)
	{

		$this->Projects_model->delete_project($id);
		$this->session->set_flashdata('msg','<p class="alert-success">Project has been deleted Successfully</p>');
		redirect('projects');

	}
}
