<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<title>Add New User</title>
</head>
<body>
<div class='container'>
	
	<?php $this->load->view('/headers/user_header'); ?>

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
		    <label for="userlevel">Userlevel:</label>
		    <input type="text" class="form-control" name="userlevel">
		</div>
		<div class="form-group">
		    <label for="user_password">Password:</label>
		    <input type="password" class="form-control" name="user_password">
		</div>
		<div class="form-group">
		    <label for="confirm_password">Confirm Password:</label>
		    <input type="password" class="form-control" name="confirm_password">
		</div>
		<div class="form-group">
		    <label for="description">Description:</label>
		    <input type="textarea" class="form-control" name="description">
		</div>
		  <input type="submit" class="btn btn-success" value="Create">
		  <a href="/main/user_dashboard" class="btn btn-primary">Return to Dashboard</a>
		</form>
	</div>
</body>
</html>