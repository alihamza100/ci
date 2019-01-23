<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 12:34 PM
 */

class Home extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('logged_in'))
		{
			$this->load->model('Projects_model');
			$user_id = $this->session->userdata('user_id');
			$user_name = ucfirst($this->session->userdata('username'));
			$data = array(
				'view' => 'projects/index',
				'projects' => $this->Projects_model->get_user_projects($user_id),
				'text' => 'Projects Created by '.$user_name
			);


		}
		else
		{
			$data = array(
				'view' => 'home_view'
			);
		}

		$this->load->view('layouts/main',$data);

	}
}
