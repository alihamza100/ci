	<?php
	/**
	 * Created by PhpStorm.
	 * User: Hafiz Ali Hamza
	 * Date: 8/30/2018
	 * Time: 2:54 PM
	 */
	?>


	<h2>Edit Project</h2>

	<?php if($this->session->flashdata('errors')): ?>

		<?php echo $this->session->flashdata('errors'); ?>

	<?php endif; ?>
	<?php echo form_open('projects/edit_post'); ?>

	<div class="form-group">
		<?php

		echo form_hidden('id',$project->id);
		?>
	</div>


	<div class="form-group">
		<?php

		$data = array(
			'name' => 'project_name',
			'class' => 'form-control',
			'value' => $project->project_name
		);
		echo form_label('project Name','project_name');
		echo form_input($data);
		?>
	</div>



	<div class="form-group">
		<?php

		$data = array(
			'name' => 'project_body',
			'class' => 'form-control',
			'value' => $project->project_body
		);

		echo form_label('Description','Description');
		echo form_textarea($data);
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
