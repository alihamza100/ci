<?php
/**
 * Created by PhpStorm.
 * User: Hafiz Ali Hamza
 * Date: 8/29/2018
 * Time: 4:17 PM
 */
?>
<?php if($this->session->flashdata('login_success')): ?>
<?php echo $this->session->flashdata('login_success'); ?>
<?php endif; ?>
<h1>This is Admin Home</h1>
