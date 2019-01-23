	<?php if($this->session->flashdata('msg')): ?>

		<?php echo $this->session->flashdata('msg'); ?>

	<?php endif; ?>

	<?php //debug($tasks);

	?>
	<h1>All Tasks </h1>

	<table class="table table-hover table-responsive ">
		<thead class="bg-primary text-light">
		<tr>
			<th scope="col">Task Id</th>
			<th scope="col">Task Name</th>
			<th>Date Created</th>
			<th scope="col">Project Id</th>
			<th scope="col">Project Name</th>
			<th scope="col">Task Status</th>

		</tr>
		</thead>
		<tbody>
		<?php foreach ($tasks as $task): ?>
		<tr>

			<th scope="row"><?= $task->task_id ?></th>
			<td><?php echo $task->task_name ;?></td>
			<td><?php echo $task->date_created ;?></td>
			<td><?php echo $task->project_id ;?></td>
			<td><?php echo $task->project_name ;?></td>
			<td>
				<?php
					if ($task->status == 1)
					{
						echo '<p class="text-success">Completed</p>';
					}
					else
					{
						echo '<p class="text-danger">Incomplete</p>';
					}

				?>

			</td>


		</tr>

		<?php endforeach; ?>


		</tbody>
	</table>


