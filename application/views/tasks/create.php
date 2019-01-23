	<?php
	/**
	 * Created by PhpStorm.
	 * User: Hafiz Ali Hamza
	 * Date: 8/30/2018
	 * Time: 2:54 PM
	 */
	?>


	<h2>Create Task</h2>

	<?php if($this->session->flashdata('errors')): ?>

		<?php echo $this->session->flashdata('errors'); ?>

	<?php endif; ?>
	<?php echo form_open('tasks/create_post/'.$this->uri->segment(3)); ?>

	<div class="form-group">
		<?php

		//$data = array(
			//'name' => 'user_id',
			//'value' => $this->session->userdata('user_id')
		//);

		//debug($data);
		//echo form_hidden('project_id',$this->uri->segment(3));
		?>
	</div>


	<div class="form-group">
		<?php

		$data = array(
			'name' => 'task_name',
			'class' => 'form-control',
			'placeholder' => 'Enter Task Name'
		);
		echo form_label('Task Name','task_name');
		echo form_input($data);
		?>
	</div>



	<div class="form-group">
		<?php

		$data = array(
			'name' => 'task_body',
			'class' => 'form-control',
			'placeholder' => 'Enter Description'
		);

		echo form_label('Description','Description');
		echo form_textarea($data);
		?>
	</div>

	<div class="form-group">

		<?php

		echo form_label('Due Date','due_date');

		$data = array(
			'name' => 'due_date',
			'class' => 'form-control',
			'type' => 'date'
		);


		echo form_input($data);

		?>

	</div>

	<div class="form-group">
		<?php

		$data = array(
			'name' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Create'
		);


		echo form_submit($data);

		?>

	</div>

	<?php echo form_close();?>
