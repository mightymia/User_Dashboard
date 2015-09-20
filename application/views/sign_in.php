<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<title>Sign In</title>
</head>
<body>
	<div class='container'>

		<?php $this->load->view('/headers/home_header'); ?>
		
	    <form action='/main/login' method='post'>
			<div class="form-group">
		    	<label for="user_email">Email address:</label>
		    	<input type="text" class="form-control" name="email">
		  	</div>
		  <div class="form-group">
		    <label for="user_password">Password:</label>
		    <input type="text" class="form-control" name="password">
		  </div>
		  <input type='submit'class="btn btn-success" value='Sign In'>
		</form>
		<a href="/register">Don't have an account, register here!</a>

		<?php
			if ($this->session->flashdata('login error'))
			{ ?>
				<div class='alert alert-danger'role='alert'><?= $this->session->flashdata('login error'); ?></div>
			<?php } ?>
</body>
</html>