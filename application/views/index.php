<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<title>Home Page</title>
</head>
<body>
	<div class='container'>

		<?php $this->load->view('/headers/home_header'); ?>
		
		<div class="jumbotron">
			<h1>Welcome to the Test</h1>
		  	<p>We're going to build a cool application using a MVC framework! This application was built with the Village88 folks</p>
		  	<p><a class="btn btn-primary btn-lg" href="/register" role="button">Start</a></p>
		</div>
		<div class="row">
	  		<div class="col-md-4"><strong>Manage Users</strong><br>Using this application, you'll learn how to add, remove, and edit users for the application.</div>
	  		<div class="col-md-4"><strong>Leave Messages</strong><br>User will be able to leave a message to another user using this application.</div>
	  		<div class="col-md-4"><strong>Edit User Information</strong><br>Admins will be able to edit another user's information (email, address, first name, last name, etc).</div>
	  	</div>
	</div>
</body>
</html>