<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#projectTable').DataTable();
	});
</script>
<?php if($this->session->flashdata('msg')): ?>

	<?php echo $this->session->flashdata('msg'); ?>

<?php endif; ?>


<h1><?=  $text ;?> </h1>
<?php echo anchor('projects/create','Create Project',
	array('class' =>'btn btn-primary float-right')) ?>
	<br><br>
<table class="table table-hover table-responsive table-bordered table-active" id="projectTable">
	<thead class="bg-primary text-light">
	<tr>
		<th scope="col">No</th>
		<th scope="col">Name</th>
		<th scope="col">Project Body</th>
		<th scope="col">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
		<tr>
			<th scope="row"><?= $project->id ?></th>
			<td><a href="<?= base_url(); ?>projects/details/<?= $project->id ?>"><?= $project->project_name
				?></a></td>
			<td><?= $project->project_body ?></td>
			<td>
				<?php
					echo anchor('projects/details/'.$project->id,'info  |');
					echo anchor('projects/edit/'.$project->id,' edit ');
					echo anchor('projects/delete/'.$project->id,' | delete ');
				?>

			</td>
		</tr>

	<?php endforeach; ?>


	</tbody>
</table>


