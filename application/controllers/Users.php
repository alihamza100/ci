<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 1:06 PM
 */

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model');
	}

	public function register()
	{
		$data = array(
			'view' => 'users/register_view'
		);

		$this->load->view('layouts/main',$data);
	}

	public function register_post()
	{

		$this->form_validation->set_rules('first_name','First Name','required|trim|min_length[3]');
		$this->form_validation->set_rules('last_name','Last Name','required|trim|min_length[3]');
		$this->form_validation->set_rules('username','Username','required|trim|min_length[3]');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]');
		$this->form_validation->set_rules('c_password','Confirm Password','required|trim|min_length[3]|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$data = array(
				'register_error' => validation_errors('<p class="alert-danger">','</p>')
			);

			$this->session->set_flashdata($data);

			redirect('users/register');
		}
		else
		{
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'email' => $this->input->post('email'),
			);
			//debug($data);
			$this->Users_model->register_user($data);
			$this->session->set_flashdata('register_success','<p class="alert-success">User has been Registered Successfully</p>');
			redirect('home');
		}


	}

	public function Login()
	{
		$this->form_validation->set_rules('username','Username','required|trim|min_length[3]');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'errors' => validation_errors('<p class="alert-danger">','</p>')
			);

			$this->session->set_flashdata($data);

			redirect('Home/index');
		}
		else
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$id = $this->Users_model->login_user($username,$password);

			if ($id)
			{
				$user_data = array(
					'user_id' => $id,
					'username' => $username,
					'logged_in' => TRUE
				);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('msg','<p class="alert alert-success">You are logged in successfully</p>');

				return redirect('home');

			}
			else
			{

				$this->session->set_flashdata('msg','<p class="alert-danger">Incorrect Username or password</p>');

				redirect('Home/index');
			}
		}
	}

	public function logout()
	{
		//$this->session->sess_destroy();
		$this->session->unset_userdata('logged_in');
		redirect('home');
	}
}
