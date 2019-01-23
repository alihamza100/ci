	<?php
	/**
	 * Created by PhpStorm.
	 * User: Hafiz Ali Hamza
	 * Date: 8/30/2018
	 * Time: 2:54 PM
	 */
	?>


	<h2>Edit Task</h2>

	<?php if($this->session->flashdata('errors')): ?>

		<?php echo $this->session->flashdata('errors'); ?>

	<?php endif; ?>
	<?php echo form_open('tasks/edit_post'); ?>

	<div class="form-group">
		<?php

		//$data = array(
		//'name' => 'user_id',
		//'value' => $this->session->userdata('user_id')
		//);

		//debug($data);
		echo form_hidden('id',$task->id);
		echo form_hidden('project_id',$task->project_id);
		?>
	</div>


	<div class="form-group">
		<?php

		$data = array(
			'name' => 'task_name',
			'class' => 'form-control',
			'placeholder' => 'Enter Task Name',
			'value' => $task->task_name
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
			'placeholder' => 'Enter Description',
			'value' => $task->task_body
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
			'type' => 'date',
			'value' => $task->due_date
		);


		echo form_input($data);

		?>

	</div>

	<div class="form-group">
		<?php

		$data = array(
			'name' => 'submit',
			'class' => 'btn btn-primary',
			'value' => 'Update'
		);


		echo form_submit($data);

		?>

	</div>

	<?php echo form_close();?>
