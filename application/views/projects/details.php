<?php
	if ($this->session->flashdata('msg'))
	{
		echo $this->session->flashdata('msg');
	}
?>

<div class="col-md-9 float-left">
	<h1>Details</h1>
	<h3>Project Name :

		<?php
		echo $project->project_name;
		echo br(2);
		?>
	</h3>

	<h3>Date Created :</h3>
	<?php echo $project->date_created; ?>

	<h3>Project Description :</h3>
	<?php

	echo $project->project_body;
	echo br(2);
	?>

	<h1>Completed Tasks</h1>

	<ul>

		<?php $count = 0; ?>

			<?php foreach($complete_tasks as $task): ?>
				<li><?php echo anchor('tasks/display_tasks/'.$task->id, $task->task_name )?></li>
				<?php $count = $count + 1; ?>
			<?php endforeach; ?>

			<?php if ($count < 1): ?>

			<h4>No Completed Task Yet</h4>

			<?php endif;?>
	</ul>

	<h1>Incomplete Tasks</h1>

	<ul>

		<?php $count = 0; ?>

		<?php foreach($incomplete_tasks as $task): ?>
			<li><?php echo anchor('tasks/display_tasks/'.$task->id, $task->task_name )?></li>
			<?php $count = $count + 1; ?>
		<?php endforeach; ?>

		<?php if ($count < 1): ?>

			<h4>No Pending Task Yet</h4>

		<?php endif;?>
	</ul>

</div>

<div class="col-md-3 float-right">
	<h4>Project Actions</h4>
	<ul class="list-group">
		<li class="list-group-item"><?php echo anchor('tasks/create/'.$project->id,'Create Task') ?></li>
		<li class="list-group-item"><?php echo anchor('projects/edit/'. $project->id,'Edit Project') ?></li>
		<li class="list-group-item"><?php echo anchor('projects/delete/'. $project->id,'Delete Project') ?></li>
	</ul>
</div>

