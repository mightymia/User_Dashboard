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
			<h2>Welcome to User Dashboard</h2>
		  	<p>Create your own profile, view other profiles and comment</p>
		  	<p><a class="btn btn-primary btn-lg" href="/register" role="button">Click to get started</a></p>
		</div>
	</div>
</body>
</html>