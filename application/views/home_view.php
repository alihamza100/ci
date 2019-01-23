<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 12:35 PM
 */


?>




<?php if($this->session->flashdata('msg')): ?>
<?php echo $this->session->flashdata('msg'); ?>

<?php elseif($this->session->flashdata('register_success')): ?>
<?php echo $this->session->flashdata('register_success'); ?>

<?php elseif($this->session->flashdata('access_denied')): ?>
<?php echo $this->session->flashdata('access_denied'); ?>

<?php endif;?>

<?php if (isset($projects)): ?>
<div class=" ">
	<!--<div class=".card-default .card-primary">Panel Heading</div>
	<div class=".card-title">Panel Title</div>
	<div class=".card-body">Panel Content </div>-->
	<?php
		$username = $this->session->userdata('username');
		$username = ucfirst($username);

	?>

	<h1>Projects Created By <?php echo $username ?></h1>
</div>

<!--<table class="table table-hover table-responsive table-bordered table-active">
	<thead class=" bg-primary text-light">
	<tr>

		<th scope="col">Name</th>
		<th scope="col">Project Body</th>
		<th scope="col">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
		<tr>

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
</table>-->
<?php else: ?>

<h1 class="jumbotron text-center">
	Welcome to CI APP
</h1>
<?php endif; ?>
