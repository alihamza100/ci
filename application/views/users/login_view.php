<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 12:50 PM
 */
?>
<?php if (!$this->session->userdata('logged_in')): ?>

			<h2>Login Form</h2>

			<?php if($this->session->flashdata('errors')): ?>

			<?php echo $this->session->flashdata('errors'); ?>

			<?php endif; ?>
			<?php echo form_open('Users/Login'); ?>

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
					'name' => 'submit',
					'class' => 'btn btn-primary',
					'value' => 'Login'
				);


				echo form_submit($data);

				?>

			</div>

			<?php echo form_close();?>

<?php else:

	echo '<h2>Logout</h2>';
	echo form_open('users/logout');

	$data = array(
		'name' => 'submit',
		'value' => 'Logout',
		'class' => 'btn btn-primary'
	);

	echo form_submit($data);

	echo form_close();

	$username = $this->session->userdata('username');

	echo 'You are logged in as <b><big>'. $username . '</big></b>';

?>

<?php endif;?>
