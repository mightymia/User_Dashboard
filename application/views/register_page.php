<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<title>Register</title>
</head>
<body>
	<div class='container'>
		<?php $this->load->view('/headers/home_header'); ?>
	    <form action='/main/create_new' method='post'>
			<div class="form-group">
		    	<label for="user_email">Email address:</label>
		    	<input type="text" class="form-control" name="user_email">
		  	</div>
		  	<div class="form-group">
		    	<label for="first_name">First Name:</label>
		    	<input type="text" class="form-control" name="first_name">
		  	</div>
		  	<div class="form-group">
		    	<label for="last_name">Last Name:</label>
		    	<input type="text" class="form-control" name="last_name">
		  	</div>
		  	<div class="form-group">
		    	<label for="user_password">Password:</label>
		    	<input type="text" class="form-control" name="user_password">
		  	</div>
		  	<div class="form-group">
		    	<label for="confirm_password">Confirm Password:</label>
		    	<input type="text" class="form-control" name="confirm_password">
		  	</div>
		  		<input type='submit' class="btn btn-success" value='Register'>
		</form>
		<a href="/sign_in">Have an account, login here!</a>
		<?php
			if ($this->session->userdata('errors'))
			{ ?>
				<div class='alert alert-danger'role='alert'><?= $this->session->userdata('errors'); ?></div>
				<?php $this->session->unset_userdata('errors');
			} ?>
	</div>
</body>
</html>