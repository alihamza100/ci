<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 12:23 PM
 */
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<?php echo link_tag('assets/css/bootstrap.min.css','stylesheet','text/css'); ?>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.js"></script>


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Website Name</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url(); ?>home/index">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>users/register">Register</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>projects/index">Projects</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url(); ?>tasks/index">Tasks</a>
			</li>
			<!--<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>-->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<?php if ($this->session->userdata('logged_in')): ?>
			<li class="nav-item">
				<a class="nav-link " href="<?= base_url(); ?>users/logout">Logout</a>
			</li>
			<?php endif; ?>
		</ul>

	</div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<?php $this->load->view('users/login_view'); ?>
		</div>

		<div class="col-md-9">
			<?php $this->load->view($view); ?>
		</div>
	</div>
</div>

</body>
</html>
