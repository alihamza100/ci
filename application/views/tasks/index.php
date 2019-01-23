<?php if($this->session->flashdata('msg')): ?>

	<?php echo $this->session->flashdata('msg'); ?>

<?php endif; ?>


<h1>Tasks </h1>
<table class="table table-hover table-responsive table-active">
	<thead class="bg-primary text-light">
	<tr>
		<th scope="col">No</th>
		<th scope="col">Name</th>
		<th scope="col">Task Body</th>
		<th scope="col">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php //foreach ($tasks as $task): ?>
		<tr>
			<th scope="row"><?= $tasks->id ?></th>
			<td><a href="<?= base_url(); ?>projects/details/<?= $tasks->id ?>"><?= $tasks->task_name
				?></a><br>

				<?php

				echo anchor('tasks/edit/'.$tasks->id,' edit |');
				echo anchor('tasks/delete/'.$tasks->project_id.'/'.$tasks->id,' delete ');
				?>

			</td>
			<td><?= $tasks->task_body ?></td>
			<td>

				<?php
					if ($tasks->status == 0)
					{
						echo anchor('tasks/status/'.$tasks->id . '/' . $tasks->status, 'Mark as complete');
					}
					else
					{
						echo anchor('tasks/status/'.$tasks->id . '/' . $tasks->status, 'Mark as incomplete');
					}
				?>

			</td>
		</tr>

	<?php //endforeach; ?>


	</tbody>
</table>


