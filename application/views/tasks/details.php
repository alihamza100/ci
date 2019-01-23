<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/30/2018
 * Time: 12:46 PM
 */
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


</div>

<div class="col-md-3 float-right">
	<h4>Project Actions</h4>
	<ul class="list-group">
		<li class="list-group-item"><?php echo anchor('tasks/create/','Create Task') ?></li>
		<li class="list-group-item"><?php echo anchor('projects/edit/'. $project->id,'Edit Project') ?></li>
		<li class="list-group-item"><?php echo anchor('projects/delete/'. $project->id,'Delete Project') ?></li>
	</ul>
</div>

