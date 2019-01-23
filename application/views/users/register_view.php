	<?php
	/**
	 * Created by PhpStorm.
	 * User: Hafiz Ali Hamza
	 * Date: 8/29/2018
	 * Time: 4:35 PM
	 */
	?>
	<div class="alert-danger">
		<?php //echo validation_errors();?>
	</div>

	<h2>Register Form</h2>

	<?php if($this->session->flashdata('errors')): ?>

		<?php echo $this->session->flashdata('errors'); ?>

	<?php endif; ?>

	<?php if($this->session->flashdata('register_error')): ?>

		<?php echo $this->session->flashdata('register_error'); ?>

	<?php endif; ?>


	<?php echo form_open('Users/register_post'); ?>

	<div class="form-group">
		<?php

		$data = array(
			'name' => 'first_name',
			'class' => 'form-control',
			'placeholder' => 'Enter Your First Name'
		);
		echo form_label('First Name');
		echo form_input($data);
		?>
	</div>

	<div class="form-group">
		<?php

		$data = array(
			'name' => 'last_name',
			'class' => 'form-control',
			'placeholder' => 'Enter Your Last Name'
		);
		echo form_label('Last Name');
		echo form_input($data);
		?>
	</div>


	<div class="form-group">
		<?php

		$data = array(
			'name' => 'username',
			'class' => 'form-control',
			'placeholder' => 'Enter Username'
		);
		echo form_label('Username','username');
		echo form_input($data);
		?>
	</div>


	<div class="form-group">
		<?php

		$data = array(
			'name' => 'password',
			'class' => 'form-control',
			'placeholder' => 'Enter Password'
		);

		echo form_label('Password','password');
		echo form_password($data);
		?>
	</div>

	<div class="form-group">
		<?php

		$data = array(
			'name' => 'c_password',
			'class' => 'form-control',
			'placeholder' => 'Confirm Password'
		);

		echo form_label('Confirm Password');
		echo form_password($data);
		?>
	</div>

	<div class="form-group">
		<?php

		$data = array(
			'name' => 'email',
			'type' => 'email',
			'class' => 'form-control',
			'placeholder' => 'Enter your Email'
		);

		echo form_label('Email');
		echo form_input($data);
		?>
	</div>

	<div class="form-group">
		<?php

		$data = array(
			'name' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Register'
		);


		echo form_submit($data);

		?>

	</div>

	<?php echo form_close();?>
